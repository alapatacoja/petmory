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
        return view('posts.create');
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
        if(Auth::user()->type == 'group' && $request->get('type')=='daily')
            $post->type == 'post';
        $post->user_id = Auth::user()->id;
        $files = $request->file('photo');

        if($request->hasFile('photo'))
        {
            $num = 0;
            foreach ($files as $file) {
                $file->storeAs('/public/postfiles/' . Auth::user()->username . '/' . $post->slug . '/' . $num . '.png');
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
        $comments = Comment::where('post_id', '=', $post->id)->get();
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        //
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
