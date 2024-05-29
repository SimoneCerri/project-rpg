<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guests\ItemController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemAdminController;
use App\Http\Controllers\TypeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        //all route here that needs to be protected by our auth system
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('characters', CharacterController::class);
        Route::resource('items', ItemAdminController::class);
        Route::resource('types', TypeController::class);
    });

Route::get('/', [ItemController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('guests.about');
})->name('about');

Route::get('/contacts', function () {
    return view('guests.contacts');
})->name('contacts');

Route::get('/items', [ItemController::class, 'index'])->name('guests.items.index');

Route::get('/items/{item}', [ItemController::class, 'show'])->name('guests.items.show');

Route::resource('/characters', CharacterController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
