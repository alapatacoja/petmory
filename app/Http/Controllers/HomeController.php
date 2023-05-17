<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::orderBy('created_at', 'ASC')->get();
        if($request->ajax()){
            return response()->json(array('messages'=>$messages));
        }
        if(Auth::check()){
            $posts = Post::where('type', 'question')->orwherein('user_id', Auth::user()->followings->pluck('id'))->orwhere('user_id', '=', Auth::user()->id)->paginate(20);
        } else {
            $posts = Post::where('type', 'question')->paginate(20);
        }
        return view('home', compact('messages', 'posts'));
    }

    public function search(Request $request){
        $posts = Post::where('title', 'like', '%'.$request->get('search').'%')->orderBy('created_at', 'desc')->get();
        $users = User::where('username', 'like', '%'.$request->get('search').'%')->orwhere('name', 'like', '%'.$request->get('search').'%')->get();
        /* print_r($users); */

        return view('search', compact('posts', 'users'));
    }

    public function changelang($lang){
        if(array_key_exists($lang, Config::get('languages'))){
            Session::put('applocale', $lang);

        }
        return redirect()->back();
    }
}
