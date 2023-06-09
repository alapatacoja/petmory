<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'ASC')->get();
        if(Auth::check()){
            $posts = Post::paginate(20);
        } else {
            $posts = Post::where('type', 'question')->paginate(20);
        }
       /*  return view('home', compact('messages', 'posts')); */
       return response()->json($messages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->get('text') == null)
            return redirect()->route('home');
        else{
            $message = new Message();
            $message->user_id = Auth::user()->id;
            $message->text = $request->get('text');
            $message->save();
            return redirect()->route('home');
            /* return response()->json($message); */
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
