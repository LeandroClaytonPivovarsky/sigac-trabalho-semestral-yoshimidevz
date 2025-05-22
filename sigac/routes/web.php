<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlunoController;   
use App\Http\Controllers\CursoController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/Alunos/create', [AlunoController::class, 'index'])->name('home');
Route::get('/Alunos/create', [AlunoController::class, 'index'])->name('home');


Route::resource('alunos', AlunoController::class);
Route::resource('cursos', CursoController::class);


// Outras rotas específicas
// Route::get('/outra-rota', [OutroController::class, 'metodo']);
