<?php

use App\Http\Controllers\BreadcrumbController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizCategoryController;
use App\Http\Controllers\QuizDetailController;
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
Route::get('/result/export/excel', [ResultController::class, 'exportExcel']);

//  Questions mnenu
Route::post('/quiz/quizess&surveys/Add', [QuizDetailController::class, 'store'])->name('questions.store');
Route::get('/quiz/quizess&surveys/Add', [QuizDetailController::class, 'create'])->name('questions.create');
Route::get('/quiz/quizess&surveys/Edit-{slug}', [QuizDetailController::class, 'edit'])->name('questions.edit');
Route::post('/quiz/quizess&surveys/Edit-{slug}', [QuizDetailController::class, 'update'])->name('questions.update');
Route::get('/quiz/quizess&surveys/Drop-{slug}', [QuizDetailController::class, 'destroy'])->name('questions.destroy');
Route::get('/quiz/quizess&surveys', [QuizDetailController::class, 'index'])->name('questions.index');


// Categories menu
Route::get('/quiz/categories', [QuizCategoryController::class, 'index'])->name('categories.index');
Route::get('/quiz/categories/{slug}', [QuizCategoryController::class, 'edit'])->name('categories.edit');
Route::post('/quiz/categories/{slug}', [QuizCategoryController::class, 'update'])->name('categories.update');


});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
