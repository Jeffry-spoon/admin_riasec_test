<?php

use App\Http\Controllers\BreadcrumbController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizCategoryController;
use App\Http\Controllers\QuizDetailController;
use App\Http\Controllers\QuizEventController;
use App\Http\Controllers\ResultController;
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
Route::middleware(['auth', 'verified'])->group(function () {

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');

Route::get('/result', [ResultController::class, 'index'])->name('result.index');
Route::get('/result/download/pdf', [ResultController::class, 'download_pdf']);
Route::get('/result/export/excel', [ResultController::class, 'exportExcel']);

//  Questions menu
Route::post('/quiz/quizess&surveys/Add', [QuizDetailController::class, 'store'])->name('questions.store');
Route::get('/quiz/quizess&surveys/Add', [QuizDetailController::class, 'create'])->name('questions.create');
Route::get('/quiz/quizess&surveys/Edit-{slug}', [QuizDetailController::class, 'edit'])->name('questions.edit');
Route::put('/quiz/quizess&surveys/Edit-{slug}', [QuizDetailController::class, 'update'])->name('questions.update');
Route::get('/quiz/quizess&surveys/Drop-{slug}', [QuizDetailController::class, 'destroy'])->name('questions.destroy');
Route::get('/quiz/quizess&surveys', [QuizDetailController::class, 'index'])->name('questions.index');


// Categories menu
Route::get('/quiz/categories', [QuizCategoryController::class, 'index'])->name('categories.index');
Route::get('/quiz/categories/{slug}', [QuizCategoryController::class, 'edit'])->name('categories.edit');
Route::PUT('/quiz/categories/{slug}', [QuizCategoryController::class, 'update'])->name('categories.update');

// Event menu
Route::get('/quiz/event', [QuizEventController::class, 'index'])->name('event.index');
Route::get('/quiz/event/Add', [QuizEventController::class, 'create'])->name('event.create');
Route::post('/quiz/event/Add', [QuizEventController::class, 'store'])->name('event.store');
Route::get('/quiz/event/Edit-{slug}', [QuizEventController::class, 'edit'])->name('event.edit');
Route::put('/quiz/event/Edit-{slug}', [QuizEventController::class, 'update'])->name('event.update');
Route::get('/quiz/event/Drop-{slug}', [QuizEventController::class, 'destroy'])->name('event.destroy');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
