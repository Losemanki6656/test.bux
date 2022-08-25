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
Route::post('/Verification', [App\Http\Controllers\HomeController::class, 'verification'])->name('verification');


Auth::routes();
Route::group(['middleware' => ['auth']], function() {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/VerificationPpage', [App\Http\Controllers\HomeController::class, 'verification_page'])->name('verification_page');
Route::Post('/Activation', [App\Http\Controllers\HomeController::class, 'activation'])->name('activation');
Route::get('/Questions', [App\Http\Controllers\HomeController::class, 'questions'])->name('questions');
Route::get('/Questions/addQues', [App\Http\Controllers\HomeController::class, 'addQues'])->name('addQues');
Route::post('/Questions/addQuestions', [App\Http\Controllers\HomeController::class, 'addQuestions'])->name('addQuestions');
Route::post('/Questions/EditQues/{id}', [App\Http\Controllers\HomeController::class, 'EditQues'])->name('EditQues');
Route::post('/Questions/DeleteQues/{id}', [App\Http\Controllers\HomeController::class, 'DeleteQues'])->name('DeleteQues');


Route::get('/adminRole', [App\Http\Controllers\HomeController::class, 'adminRole'])->name('adminRole');

Route::get('/Questions/Tasks', [App\Http\Controllers\HomeController::class, 'Tasks'])->name('Tasks');
Route::get('/Questions/addTask', [App\Http\Controllers\HomeController::class, 'addTask'])->name('addTask');
Route::post('/Questions/addTask', [App\Http\Controllers\HomeController::class, 'addTaskSucc'])->name('addTaskSucc');
Route::post('/Questions/EditTask/{id}', [App\Http\Controllers\HomeController::class, 'EditTask'])->name('EditTask');
Route::post('/Questions/DeleteTask/{id}', [App\Http\Controllers\HomeController::class, 'DeleteTask'])->name('DeleteTask');


Route::get('/home/StartTest', [App\Http\Controllers\HomeController::class, 'starttest'])->name('starttest');
Route::get('/home/StartTask', [App\Http\Controllers\HomeController::class, 'starttask'])->name('starttask');
Route::post('/home/RunTest', [App\Http\Controllers\HomeController::class, 'runtest'])->name('runtest');
Route::post('/home/RunTask', [App\Http\Controllers\HomeController::class, 'runtask'])->name('runtask');
Route::post('/home/finishTest/{id}', [App\Http\Controllers\HomeController::class, 'finishTest'])->name('finishTest');


Route::get('/home/results', [App\Http\Controllers\HomeController::class, 'results'])->name('results');


Route::get('/Administration/Testcount', [App\Http\Controllers\HomeController::class, 'testcount'])->name('testcount');
Route::post('/Administration/Testcount', [App\Http\Controllers\HomeController::class, 'EditTestCount'])->name('EditTestCount');
Route::post('/Administration/Taskcount', [App\Http\Controllers\HomeController::class, 'EditTaskCount'])->name('EditTaskCount');


Route::post('ckeditor/upload', [App\Http\Controllers\HomeController::class, 'upload'])->name('ckeditor.image-upload');


Route::get('/Questions/folders', [App\Http\Controllers\HomeController::class, 'folders'])->name('folders');
Route::post('/Questions/AddFolder', [App\Http\Controllers\HomeController::class, 'AddFolder'])->name('AddFolder');

Route::get('/Questions/themes', [App\Http\Controllers\HomeController::class, 'themes'])->name('themes');
Route::get('/Questions/addthemes', [App\Http\Controllers\HomeController::class, 'addthemes'])->name('addthemes');
Route::post('/Questions/AddThem', [App\Http\Controllers\HomeController::class, 'AddThem'])->name('AddThem');
Route::get('/Questions/TaskView/{id}', [App\Http\Controllers\HomeController::class, 'TaskView'])->name('TaskView');
Route::get('/Questions/questaskview/{id}', [App\Http\Controllers\HomeController::class, 'questaskview'])->name('questaskview');

Route::get('/home/ThemesF/{id}', [App\Http\Controllers\HomeController::class, 'ThemesF'])->name('ThemesF');
Route::get('/home/QuesView/{id}', [App\Http\Controllers\HomeController::class, 'QuesView'])->name('QuesView');
Route::get('/home/taskrun/{id}', [App\Http\Controllers\HomeController::class, 'taskrun'])->name('taskrun');


Route::post('/home/sendResult/{id}', [App\Http\Controllers\HomeController::class, 'sendResult'])->name('sendResult');
Route::post('/home/finishtask/{id}', [App\Http\Controllers\HomeController::class, 'finishtask'])->name('finishtask');


Route::get('/Questions/resultaskview', [App\Http\Controllers\HomeController::class, 'resultaskview'])->name('resultaskview');
Route::get('/Questions/balltoresult/{id}', [App\Http\Controllers\HomeController::class, 'balltoresult'])->name('balltoresult');


Route::post('/Questions/taskSucc/{id}', [App\Http\Controllers\HomeController::class, 'taskSucc'])->name('taskSucc');
Route::get('/Questions/resultTaskVies/{id}', [App\Http\Controllers\HomeController::class, 'resultTaskVies'])->name('resultTaskVies');

});



