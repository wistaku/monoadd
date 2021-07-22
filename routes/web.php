<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BelongingController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// read
Route::get("/", [AddressController::class, "index"])
    ->name("address.index")
    ->middleware("auth");

Route::get("belonging", [BelongingController::class, "index"])
    ->name("belonging.index")
    ->middleware("auth");

Route::get("tag", [TagController::class, "index"])
    ->name("tag.index")
    ->middleware("auth");

Route::get("address/{address}/show", [AddressController::class, "show"])
    ->name("address.show")
    ->middleware("auth");

Route::get("tag/{tag}/show", [TagController::class, "show"])
    ->name("tag.show")
    ->middleware("auth");


//create
Route::get("belonging/create", [BelongingController::class, "create"])
    ->name("belonging.create")
    ->middleware("auth");

Route::post("belonging/store", [BelongingController::class, "store"])
    ->name("belonging.store");

Route::post("address/store", [AddressController::class, "store"])
    ->name("address.store");

Route::post("tag/store", [TagController::class, "store"])
    ->name("tag.store");


//update
Route::get("belonging/{belonging}/edit", [BelongingController::class, "edit"])
    ->name("belonging.edit")
    ->middleware("auth");

Route::patch("belonging/{belonging}/update", [BelongingController::class, "update"])
    ->name("belonging.update");


// delete
Route::delete("belonging/{belonging}/delete", [BelongingController::class, "delete"])
    ->name("belonging.delete");

Route::delete("address/{address}/delete", [AddressController::class, "delete"])
    ->name("address.delete");

Route::delete("tag/{tag}/delete", [TagController::class, "delete"])
    ->name("tag.delete");



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
