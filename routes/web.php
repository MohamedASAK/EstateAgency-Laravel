<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::get("/list",[AdminController::class,'index'])->name('admin.index');
    Route::get("/create",[AdminController::class,'create'])->name('admin.create');
    Route::post("/create",[AdminController::class,'store'])->name('admin.store');

    Route::get("/edit/{id}",[AdminController::class,'edit'])->name('admin.edit');
    Route::post("/edit/{id}",[AdminController::class,'update'])->name('admin.update');
    Route::get("/show/{id}",[AdminController::class,'show'])->name('admin.show');
    Route::post("/destroy/{id}",[AdminController::class,'destroy'])->name('admin.destroy');
});


Route::prefix('agent')->group(function(){
    Route::get("/list",[AgentController::class,'index'])->name('agent.index');
    Route::get("/create",[AgentController::class,'create'])->name('agent.create');
    Route::post("/create",[AgentController::class,'store'])->name('agent.store');

    Route::get("/edit/{id}",[AgentController::class,'edit'])->name('agent.edit');
    Route::post("/edit/{id}",[AgentController::class,'update'])->name('agent.update');
    Route::get("/show/{id}",[AgentController::class,'show'])->name('agent.show');
    Route::post("/destroy/{id}",[AgentController::class,'destroy'])->name('agent.destroy');
});

Route::prefix('developer')->group(function(){
    Route::get("/list",[DeveloperController::class,'index'])->name('developer.index');
    Route::get("/create",[DeveloperController::class,'create'])->name('developer.create');
    Route::post("/create",[DeveloperController::class,'store'])->name('developer.store');

    Route::get("/edit/{id}",[DeveloperController::class,'edit'])->name('developer.edit');
    Route::post("/edit/{id}",[DeveloperController::class,'update'])->name('developer.update');
    Route::get("/show/{id}",[DeveloperController::class,'show'])->name('developer.show');
    Route::post("/destroy/{id}",[DeveloperController::class,'destroy'])->name('developer.destroy');
});

Route::prefix('message')->group(function(){
    Route::get("/list",[MessageController::class,'index'])->name('message.index');
    Route::get("/create",[MessageController::class,'create'])->name('message.create');
    Route::post("/create",[MessageController::class,'store'])->name('message.store');

    Route::get("/edit/{id}",[MessageController::class,'edit'])->name('message.edit');
    Route::post("/edit/{id}",[MessageController::class,'update'])->name('message.update');
    Route::get("/show/{id}",[MessageController::class,'show'])->name('message.show');
    Route::post("/destroy/{id}",[MessageController::class,'destroy'])->name('message.destroy');
});

Route::prefix('order')->group(function(){
    Route::get("/list",[OrderController::class,'index'])->name('order.index');
    Route::get("/create",[OrderController::class,'create'])->name('order.create');
    Route::post("/create",[OrderController::class,'store'])->name('order.store');

    Route::get("/edit/{id}",[OrderController::class,'edit'])->name('order.edit');
    Route::post("/edit/{id}",[OrderController::class,'update'])->name('order.update');
    Route::get("/show/{id}",[OrderController::class,'show'])->name('order.show');
    Route::post("/destroy/{id}",[OrderController::class,'destroy'])->name('order.destroy');
});

Route::prefix('property')->group(function(){
    Route::get("/list",[PropertyController::class,'index'])->name('property.index');
    Route::get("/create",[PropertyController::class,'create'])->name('property.create');
    Route::post("/create",[PropertyController::class,'store'])->name('property.store');

    Route::get("/edit/{id}",[PropertyController::class,'edit'])->name('property.edit');
    Route::post("/edit/{id}",[PropertyController::class,'update'])->name('property.update');
    Route::get("/show/{id}",[PropertyController::class,'show'])->name('property.show');
    Route::post("/destroy/{id}",[PropertyController::class,'destroy'])->name('property.destroy');
});

Route::prefix('user')->group(function(){
    Route::get("/list",[UserController::class,'index'])->name('user.index');
    Route::get("/create",[UserController::class,'create'])->name('user.create');
    Route::post("/create",[UserController::class,'store'])->name('user.store');

    Route::get("/edit/{id}",[UserController::class,'edit'])->name('user.edit');
    Route::post("/edit/{id}",[UserController::class,'update'])->name('user.update');
    Route::get("/show/{id}",[UserController::class,'show'])->name('user.show');
    Route::post("/destroy/{id}",[UserController::class,'destroy'])->name('user.destroy');
});
