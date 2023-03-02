<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

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

// Homepage
Route::get('/', function () {
    return redirect()->route('add.card');
});

// Affiche les informations d'une carte
Route::get('/get/card/{cardId}', [CardController::class, 'getCard'])->name('get.card');

// Gestion de l'ajout d'une carte
Route::match(['get', 'post'], '/add/card', [CardController::class, 'add'])->name('add.card');
