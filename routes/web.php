<?php

use App\Http\Controllers\Guests\ItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ItemController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('guests.about');
})->name('about');

Route::get('/contacts', function () {
    return view('guests.contacts');
})->name('contacts');

Route::get('/items', [ItemController::class, 'index'])->name('guests.items.index');

Route::get('/items/{item}', [ItemController::class, 'show'])->name('guests.items.show');