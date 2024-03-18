<?php

use App\Http\Controllers\BreadcrumbController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizCategoryController;
use App\Http\Controllers\QuizDetailController;
use App\Http\Controllers\QuizEventController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TeamUserController;
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
Route::middleware(['auth', 'verified', 'role:super admin,penanggung jawab,fasilitator'])->group(function () {

// Dashboard Menu
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');

// Result Menu
Route::get('/result', [ResultController::class, 'index'])->name('result.index');
Route::get('/result/download/pdf', [ResultController::class, 'download_pdf']);
Route::get('/result/download/excel', [ResultController::class, 'exportExcel']);

//  Questions menu
Route::get('/quiz/quizess&surveys', [QuizDetailController::class, 'index'])->name('type.index');
Route::post('/quiz/quizess&surveys/Add', [QuizDetailController::class, 'store'])->name('type.store');
Route::get('/quiz/quizess&surveys/Add', [QuizDetailController::class, 'create'])->name('type.create');
Route::get('/quiz/quizess&surveys/Edit-{id}', [QuizDetailController::class, 'edit'])->name('type.edit');
Route::get('/quiz/quizess&surveys/Drop-{slug}', [QuizDetailController::class, 'destroy'])->name('type.destroy');
Route::put('/quiz/quizess&surveys/Edit-{slug}', [QuizDetailController::class, 'update'])->name('questions.update');
Route::post('/quiz/quizess&surveys/type{id}', [QuizDetailController::class, 'update_questions'])->name('questions_types.update');
Route::put('/quiz/quizess&surveys/type{id}', [QuizDetailController::class, 'update_type'])->name('type.update');
Route::post('/quiz/quizess&surveys/questions{id}', [QuizDetailController::class, 'insert_questions'])->name('questions.store');

// Categories menu
Route::get('/quiz/categories', [QuizCategoryController::class, 'index'])->name('categories.index');
Route::get('/quiz/categories/{slug}', [QuizCategoryController::class, 'edit'])->name('categories.edit');
Route::put('/quiz/categories/{slug}', [QuizCategoryController::class, 'update'])->name('categories.update');

// Event menu
Route::get('/quiz/event', [QuizEventController::class, 'index'])->name('event.index');
Route::get('/quiz/event/Add', [QuizEventController::class, 'create'])->name('event.create');
Route::post('/quiz/event/Add', [QuizEventController::class, 'store'])->name('event.store');
Route::get('/quiz/event/Edit-{slug}', [QuizEventController::class, 'edit'])->name('event.edit');
Route::put('/quiz/event/Edit-{slug}', [QuizEventController::class, 'update'])->name('event.update');
Route::get('/quiz/event/Drop-{slug}', [QuizEventController::class, 'destroy'])->name('event.destroy');

// Team Menu
Route::get('/team', [TeamUserController::class, 'index'])->name('team.index');
Route::get('/team/Edit-{id}', [TeamUserController::class, 'edit'])->name('team.edit');
Route::put('/team/Edit-{id}', [TeamUserController::class, 'update'])->name('team.update');
Route::get('/team/Add', [TeamUserController::class, 'create'])->name('team.create');
Route::post('/team/Add', [TeamUserController::class, 'store'])->name('team.store');
Route::get('/team/Drop-{id}', [TeamUserController::class, 'destroy'])->name('team.destroy');
});

require __DIR__.'/auth.php';
