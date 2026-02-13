<?php

use Illuminate\Support\Facades\Route;


// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('developers', \App\Http\Controllers\DeveloperController::class);
    Route::resource('developers', \App\Http\Controllers\DeveloperController::class);
    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
    Route::resource('assets', \App\Http\Controllers\AssetController::class);
    Route::resource('bugs', \App\Http\Controllers\BugController::class);
});

