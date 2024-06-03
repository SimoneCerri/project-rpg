<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Character;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.characters.index', ['characters' => Character::orderByDesc('id')->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.characters.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        $validated_data = $request->validated();

        $validated_data['slug'] = Str::slug($validated_data['name'], '-');
        if ($request->has('cover_image')) {
            $validated_data['cover_image'] = Storage::disk('public')->put('uploads/images', $validated_data['cover_image']);
        }


        //dd($validated_data);
        /*  $data = $request->all(); */

        /*  $character = new Character();
         $character->name = $data['name'];
         $character->description = $data['description'];
         $character->attack = $data['attack'];
         $character->defense = $data['defense'];
         $character->speed = $data['speed'];
         $character->save(); */

        Character::create($validated_data);

        return to_route('admin.characters.index')->with('message', "New character it's created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        // $types = Type::all();
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $types = Type::all();

        //dd($types);
        return view('admin.characters.edit', compact('character', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $validated_data = $request->validated();


        $validated_data['slug'] = Str::slug($validated_data['name'], '-');

        if ($request->has('cover_image')) {

            if ($character->cover_image) {
                Storage::disk('public')->delete($character->cover_image);
            }
            $validated_data['cover_image'] = Storage::disk('public')->put('uploads/images', $validated_data['cover_image']);
        }



        $character->update($validated_data);

        return to_route('admin.characters.index')->with('message', "$character->name updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        if ($character->cover_image) {
            Storage::disk('public')->delete($character->cover_image);
        }
        $character->delete();

        return to_route('admin.characters.index')->with('message', "$character->name deleted!");
    }
}
