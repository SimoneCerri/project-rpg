<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.items.index', ['items' => Item::orderByDesc('id')->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $validated_data = $request->validated();

        $validated_data['slug'] = Str::slug($validated_data['name'], '-');
        if ($request->has('cover_image')) {
            $validated_data['cover_image'] = Storage::disk('public')->put('uploads/images', $validated_data['cover_image']);
        }

        Item::create($validated_data);

        return to_route('admin.characters.index')->with('message', "New character it's created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Item $item)
    {
        $validated_data = $request->validated();


        $validated_data['slug'] = Str::slug($validated_data['name'], '-');

        if ($request->has('cover_image')) {

            if ($item->cover_image) {
                Storage::disk('public')->delete($item->cover_image);
            }
            $validated_data['cover_image'] = Storage::disk('public')->put('uploads/images', $validated_data['cover_image']);
        }



        $item->update($validated_data);

        return to_route('admin.characters.index')->with('message', "$item->name updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if ($item->cover_image) {
            Storage::disk('public')->delete($item->cover_image);
        }
        $item->delete();

        return to_route('admin.characters.index')->with('message', "$item->name deleted!");
    }
}
