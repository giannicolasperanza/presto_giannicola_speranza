<?php


use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;



//rotta per la home
Route::get('/', [PublicController::class, 'home'])->name('home');

// Rotta per la creazione di un articolo
Route::get('/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
// Rotta per l'edit di un articolo
Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
//Rotta per il dettaglio di un articolo
Route::get('/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/tutti-gli-articoli', [ArticleController::class, 'index'])->name('article.index');
