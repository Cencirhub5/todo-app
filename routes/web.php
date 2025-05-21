<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController; // GroupController'ı kullanmak için ekle
use App\Http\Controllers\TodolistController; // TodolistController'ı kullanmak için ekle


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
    return redirect()->route('tasks.index');
});
Route::resource('tasks', TaskController::class);
Route::resource('groups', GroupController::class);
Route::resource('todolists', TodolistController::class);
// Görevleri listelemek için rota
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Yeni görev oluşturma formunu göstermek için rota
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Yeni görevi veritabanına kaydetmek için rota (POST isteği)
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Mevcut görevi güncellemek için rota (PATCH isteği)
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Görev silmek için rota (DELETE isteği)
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Not: Tüm bu rotaları tek bir satırda Resource Rotaları ile de tanımlayabiliriz:
// Route::resource('tasks', TaskController::class);