<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.types.index', ['types' => Type::orderByDesc('id')->paginate(6)]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        Type::create($val_data);
        $name = $val_data['name'];

        return to_route('admin.types.index')->with('message', "Type: $name created!");
        // dd($val_data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $type->update($val_data);
        return to_route('admin.types.index')->with('message', "Type: $type->name created!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index')->with('message', "Type: $type->name delete!");
    }
}
