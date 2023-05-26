<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check())
            return view('posts.create');
        else 
            return redirect()->route('home');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->get('title');
        
        $post->slug = Str::slug($post->title);
        $aux = Post::where('slug', '=', $post->slug)->get();
        if(count($aux)>0)
            $post->slug =  $post->slug.'-'.count($aux);
        $post->text = $request->get('text');
        $post->type = $request->get('type');
        if(Auth::user()->type == 'group' && ($request->get('type')=='daily' || $request->get('type')=='question'))
            $post->type == 'post';
        $post->user_id = Auth::user()->id;
        $files = $request->file('photo');

        if($request->hasFile('photo'))
        {
            $num = 0;
            foreach ($files as $file) {
                $file->storeAs('/public/postfiles/' . Auth::user()->id . '/' . $post->slug . '/' . $num . '.png');
                $num++;
            }
        }
        $post->save();
        return redirect()->route('showpost', ['user'=>Auth::user(), 'post'=>$post]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Post $post)
    {
        if(Auth::check()){
            if(File::isDirectory(storage_path('app/public/postfiles/'. $user->id.'/'.$post->slug))){
                $files = File::allfiles(storage_path('app/public/postfiles/'. $user->id.'/'.$post->slug));
            } else {
                $files = null;
            }
            $comments = Comment::where('post_id', '=', $post->id)->orderBy('created_at', 'desc')->get();
            return view('posts.show', compact('post', 'comments', 'files'));
        }
        else 
            return redirect()->route('home');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(Auth::check() && Auth::user()==$post->user)
            return view('posts.create', compact('post'));
        else 
            return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {

        if($request->get('title')!=null){
            $post->title = $request->get('title');
        }
            
        if($request->get('text')!=null)
            $post->text = $request->get('text');

        if($request->get('type')!=null){
            $post->type = $request->get('type');
            if(Auth::user()->type == 'group' && ($request->get('type')=='daily' || $request->get('type')=='question'))
                $post->type == 'post';
        }

        $files = $request->file('photo');

        if($request->hasFile('photo'))
        {
            $num = count(File::allfiles(storage_path('app/public/postfiles/'. Auth::user()->id . '/' . $post->slug)));
            foreach ($files as $file) {
                $file->storeAs('/public/postfiles/' . Auth::user()->id . '/' . $post->slug . '/' . $num . '.png');
                $num++;
            }
        }
        $post->save();
        return redirect()->route('showpost', ['user'=>Auth::user(), 'post'=>$post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        File::deleteDirectory(storage_path('app/public/postfiles/'. $post->user->username.'/'.$post->slug.'/'));
        $post->delete();
        return redirect()->route('home');
    }
}
