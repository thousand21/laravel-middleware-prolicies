<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/accueil', function () {
    return view('home');
});

Route::get('/testimonials', function () {
    return view('pages.testimonials');
});



Route::get('/dashboard', function () {
    return view('backoffice.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/backoffice/testimonials',TestimonialController::class);
Route::resource('/backoffice/articles',ArticleController::class);
Route::resource('/backoffice/contact',ContactController::class);
Route::resource('/backoffice/commentaires',CommentaireController::class);
