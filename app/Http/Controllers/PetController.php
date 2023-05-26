<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Requests\EditPetRequest;
use App\Http\Requests\PetRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PetController extends Controller
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
        if(Auth::check() && Auth::user()->type != 'group')
            return view('pets.create');
        else 
            return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PetRequest $request)
    {
        $pet = new Pet();
        $pet->name = $request->get('name');
        $pet->type = $request->get('type');
        $pet->birthdate = $request->get('birthdate');
        $pet->user_id = Auth::user()->id;
        $pet->visibility = true;

        if($request->hasFile('petpic'))
            $request->file('petpic')->storeAs('/public/petpics/' . Auth::user()->id . '/' . $pet->name . '.png');         

        $pet->save();
        if(isset($_POST['add'])){
            $message = 'ok';
            return view('pets.create', compact('message'));
        }
        else return redirect()->route('users.show', Auth::user());
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        if(Auth::check() && Auth::user()->type != 'group')
            return view('pets.create', compact('pet'));
        else 
            return redirect()->route('home');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPetRequest $request, Pet $pet)
    {
        
        if($request->get('name') != null){
            Storage::move('public/petpics/' . Auth::user()->id . '/' . $pet->name . '.png', 'public/petpics/' . Auth::user()->id . '/' . $request->get('name') . '.png'); 
        }
        $pet->name = $request->get('name');
        $pet->birthdate = $request->get('birthdate');
        $pet->deathdate = $request->get('deathdate');
        $pet->type = $request->get('type');
        if($request->file('petpic') != null){
            $request->file('petpic')->storeAs('/public/petpics/' . Auth::user()->id . '/' . $pet->name . '.png'); 
        }
        $pet->save();
        return redirect()->route('users.edit', Auth::user());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('users.edit', Auth::user());
    }

    public function visibility(Pet $pet){
        if($pet->visibility == 1)
            $pet->visibility = 0;
        else
            $pet->visibility = 1;
        $pet->save();
        return redirect()->route('user.edit', Auth::user());
    }
}
