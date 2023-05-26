<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if(Auth::check()){
            if($user->type == 'group'){
                if(File::isDirectory(storage_path('app/public/groupfiles/'. $user->id))){
                    $files = File::allfiles(storage_path('app/public/groupfiles/'. $user->id));
                } else {
                    $files = null;
                }
                return view('users.show', compact('user', 'files'));
            }
                
            return view('users.show', compact('user'));
        } else {
            return redirect()->route('home');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(Auth::check() && Auth::user()==$user)
            return view('users.edit');
        else return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, User $user)
    {

        if($request->file('pfp') != null && File::exists(public_path('/storage/pfp/' . $user->id . '.png'))){
            Storage::delete('public/pfp', $user->id.'.png');
        }

        $user->name = $request->get('name');

        if($request->get('username') != null){
            $numusers = User::where('username', '=', $request->get('username'))->get();
            if($user->username != $request->get('username') && count($numusers)==0)
                $user->username = $request->get('username');
        }
        
        if($request->get('email') != null){
            $numemail = User::where('email', '=', $request->get('email'))->get();
            if($user->email != $request->get('email') && count($numemail)==0)
                $user->email = $request->get('email');
        }

        if($request->file('pfp') != null){
            $request->file('pfp')->storeAs('public/pfp', $user->id.'.png');
        }

        if($request->get('password') != null)
            $user->password = Hash::make($request->get('password'));

            $user->bio = $request->get('bio');
            $user->save();
            return redirect()->route('users.show', $user->username);
            
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        File::deleteDirectory(storage_path('app/public/groupsfiles/'. $user->id));
        Storage::delete('public/pfp/'. $user->username.'.png');
        $delmessages = Message::where('user_id', $user->id)->get();
        foreach($delmessages as $delmess){
            $delmess->delete();
        }

        $user->delete();

        return redirect()->route('home');
    }

    public function follow(User $user){
        if(Auth::user()->followings->contains($user->id))
            Auth::user()->followings()->detach($user->id);
        else
            Auth::user()->followings()->attach($user->id);
        return redirect()->route('user.show', $user);
    }

    public function recommend(User $user){
        if(count(Auth::user()->recomendations)<3){
            if(Auth::user()->recomendations->contains($user->id)){
                Auth::user()->recomendations()->detach($user->id);
            }
                
            else{
                Auth::user()->recomendations()->attach($user->id);
            }
               
        }

        if(Auth::user()->recomendations->contains($user->id)){
            Auth::user()->recomendations()->detach($user->id);
        }
        
        return redirect()->route('user.show', $user);
    }

    public function addlinks(Request $request){
        if(Auth::user()->type == 'group'){
            if($request->get('link')!=null){
                $user = Auth::user();
                $user->url = $request->get('link');
                $user->save();
            }
                $files = $request->file('photo');

                if($request->hasFile('photo'))
                {
                    if(File::isDirectory(storage_path('app/public/groupfiles/'. Auth::user()->id))){
                        $num = count( File::allfiles(storage_path('app/public/groupfiles/'. Auth::user()->id)));
                    } else {
                        $num = 0;
                    }
                    
                    foreach ($files as $file) {
                        $file->storeAs('public/groupfiles/' . Auth::user()->id . '/' . $num . '.png');
                        $num++;
    
                    }
                }
                
            
            return redirect()->route('users.edit', Auth::user());
        } else return redirect()->route('home');
    }
}
