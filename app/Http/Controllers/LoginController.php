<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Devuelve la vista con el formulario de registro.
     * 
     *  @return \Illuminate\Http\Response
     */
    public function registerForm()
    {
/*         if(Auth::check())
            return redirect()->route('home');
        else */
            return view('auth.register');
    }
/**
     * Guarda y registra al usuario en la base de datos.
     * 
     * @param RegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->type = $request->get('type');
        $user->bio = null;

        if($request->file('pfp') != null)
            $request->file('pfp')->storeAs('public/pfp', $user->username.'.png');

        $user->save();

        Auth::login(($user));

        return redirect()->route('pets.create');
    }
 
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

        /**
     * Devuelve la vista con el formulario de registro o un mensaje de bienvenida.
     * 
     * @return \Illuminate\Http\Response
     */
    public function loginForm()
    {
        if (Auth::viaRemember()) {
            return 'welcome back !';
        } else
            if (Auth::check())
            return redirect()->route('users.show', Auth::user()->username);
        else
            return view('auth.login');
    }

    /**
     * Loguea al usuario y lo redirige a la página de su cuenta.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credenciales = $request->only('username', 'password');
        $recordar = request()->remember ? true : false;
        if (Auth::guard('web')->attempt($credenciales, $recordar)) {
            $request->session()->regenerate();
            return redirect()->route('users.show', Auth::user()->username);
        } else {
            $error = 'Error';
            return view('auth.login', compact('error'));
        }
    }

    
}
