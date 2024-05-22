<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$characters = Character::all();

        //return view('admin.characters.index', compact('characters'));
        return view('admin.characters.index', ['characters' => Character::orderByDesc('id')->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        $val_data = $request->validated();
        $name = $val_data['name'];
        Character::create($val_data);
        return to_route('admin.characters.index')->with('message', "New project it's created: $name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view('admin.characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {

        $character->update($request->validated());
        return to_route('admin.characters.index')->with('message', "$character->name updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return to_route('admin.characters.index')->with('message', "$character->name deleted!");
    }
}
