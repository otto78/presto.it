<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/search', [PublicController::class, 'search'])->name('search');
// Route::get('/search/results', [PublicController::class, ''])->name('search');


//rotta per le categorie in home
Route::get('/category/{category}/{id}/articles', [PublicController::class, 'articlesByCategory'])->name('article.articlesByCategory');


// rotte crud article
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');


//rotte per i revisori

Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
Route::post('/revisor/article/{id}/accept', [RevisorController::class, 'accept'])-> name('revisor.accept');
Route::put('/revisor/article/{id}/reject', [RevisorController::class, 'reject'])-> name('revisor.reject');
Route::get('/revisor/reject', [RevisorController::class, 'indexReject'])->name('revisor.reject');
Route::put('/revisor/article/{id}/restore', [RevisorController::class, 'restore'])-> name('revisor.restore');
