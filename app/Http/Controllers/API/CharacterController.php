<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::with('items', 'type')->paginate(6);
        return response()->json([
            'success' => true,
            'characters' => $characters
        ]);
    }
}
