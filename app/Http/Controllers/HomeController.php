<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
        public function index()
    {
        $messages = Message::orderBy('created_at', 'ASC')->get();
        if(Auth::check()){
            $posts = Post::paginate(20);
        } else {
            $posts = Post::where('type', 'question')->paginate(20);
        }
        return view('home', compact('messages', 'posts'));
    }
}
