<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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
        return view('users.show', compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        if($request->file('pfp') != null && File::exists(public_path('/storage/pfp/' . $user->username . '.png'))){
            Storage::delete('public/pfp', $user->username.'.png');
        }

        if($request->get('name') != null)
        $user->name = $request->get('name');

        if($request->get('username') != null)
        $user->username = $request->get('username');

        if($request->get('email') != null)
        $user->email = $request->get('email');

        if($request->file('pfp') != null){
            $request->file('pfp')->storeAs('public/pfp', $user->username.'.png');
        }

        if($request->get('password') != null)
            $user->password = Hash::make($request->get('password'));

            $user->bio = $request->get('bio');
            
            $user->save();
            return redirect()->route('users.show', Auth::user()->username);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Storage::delete('public/pfp', $user->username.'.png');
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
        if(Auth::user()->recomendations->contains($user->id))
            Auth::user()->recomendations()->detach($user->id);
        else
            Auth::user()->recomendations()->attach($user->id);
        return redirect()->route('user.show', $user);
    }
}
