<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Support\Str;

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
        $val_data = $request->validated();
        $val_data['name'] = Str::of($val_data['name'])->trim()->headline();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $val_data['type'] = "Weapons";
        if ($request->has('category')) {
            $val_data['category'] = $val_data['category'] . ' Weapons';
        }
        if ($request->has('weight')) {
            $val_data['weight'] = $val_data['weight'] . ' lb.';
        }


        Item::create($val_data);

        return to_route('admin.items.index');
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
        $item['category'] = Str::of($item['category'])->before(' Weapons');
        $item['weight'] = Str::of($item['weight'])->before(' lb.');
        // dd($item);
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, string $id)
    {
        $val_data = $request->validated();
        dd($val_data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
