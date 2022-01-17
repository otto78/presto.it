<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\UserDetailController;
use GuzzleHttp\Middleware;

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


//rotte pubbliche
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/search', [PublicController::class, 'search'])->name('search');
Route::get('/category/{category}/{id}/articles', [PublicController::class, 'articlesByCategory'])->name('article.articlesByCategory');



//rotta per diventare revisore
Route::get('/workWithUs', [PublicController::class, 'workWithUs'])->name('revisor.workWithUs')->middleware('auth');
Route::post('/workWithUs/submit',[MailController::class, 'workWithUsSubmit'])->name('workWithUsSubmit');

// rotte crud article
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');


//rotte per img database
Route::post('/article/images/upload',[ArticleController::class, 'uploadImage'])->name('article.images.upload');
Route::delete('/article/images/remove',[ArticleController::class, 'removeImage'])->name('article.images.remove');
Route::get('/article/images',[ArticleController::class, 'getImage'])->name('article.images');



//rotte per i revisori
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
Route::put('/revisor/article/{id}/accept', [RevisorController::class, 'accept'])-> name('revisor.accept');
Route::put('/revisor/article/{id}/reject', [RevisorController::class, 'reject'])-> name('revisor.reject');
Route::put('/revisor/article/{id}/restore', [RevisorController::class, 'restore'])-> name('revisor.restore');
Route::get('/revisor/indexReject', [RevisorController::class, 'indexReject'])->name('revisor.indexReject');


//rotte user_details
Route::get('/user_details/profile/', [UserDetailController::class, 'index'])->name('user_details.index');


Route::get('/article/{user}', [PublicController::class, 'articlesByUser'])->name('article.articlesByUser');


