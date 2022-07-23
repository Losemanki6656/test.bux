<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/Questions', [App\Http\Controllers\HomeController::class, 'questions'])->name('questions');
Route::get('/Questions/addQues', [App\Http\Controllers\HomeController::class, 'addQues'])->name('addQues');
Route::post('/Questions/addQuestions', [App\Http\Controllers\HomeController::class, 'addQuestions'])->name('addQuestions');
Route::post('/Questions/EditQues/{id}', [App\Http\Controllers\HomeController::class, 'EditQues'])->name('EditQues');
Route::post('/Questions/DeleteQues/{id}', [App\Http\Controllers\HomeController::class, 'DeleteQues'])->name('DeleteQues');


Route::get('/Questions/Tasks', [App\Http\Controllers\HomeController::class, 'Tasks'])->name('Tasks');
Route::get('/Questions/addTask', [App\Http\Controllers\HomeController::class, 'addTask'])->name('addTask');
Route::post('/Questions/addTask', [App\Http\Controllers\HomeController::class, 'addTaskSucc'])->name('addTaskSucc');
Route::post('/Questions/EditTask/{id}', [App\Http\Controllers\HomeController::class, 'EditTask'])->name('EditTask');
Route::post('/Questions/DeleteTask/{id}', [App\Http\Controllers\HomeController::class, 'DeleteTask'])->name('DeleteTask');


Route::get('/home/StartTest', [App\Http\Controllers\HomeController::class, 'starttest'])->name('starttest');
Route::get('/home/StartTask', [App\Http\Controllers\HomeController::class, 'starttask'])->name('starttask');
Route::post('/home/RunTest', [App\Http\Controllers\HomeController::class, 'runtest'])->name('runtest');
Route::post('/home/finishTest/{id}', [App\Http\Controllers\HomeController::class, 'finishTest'])->name('finishTest');


Route::get('/home/results', [App\Http\Controllers\HomeController::class, 'results'])->name('results');


Route::get('/Administration/Testcount', [App\Http\Controllers\HomeController::class, 'testcount'])->name('testcount');
Route::post('/Administration/Testcount', [App\Http\Controllers\HomeController::class, 'EditTestCount'])->name('EditTestCount');
