<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $items = Item::orderByDesc('id')->get();
        return view('guests.items.index',compact('items'));
    }

    public function show(Item $item)
    {
        return view('guests.items.show',compact('item'));
    }
}
