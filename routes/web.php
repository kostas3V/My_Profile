<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\Work_experienceController;
use App\Http\Controllers\Resumecontroller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::middleware('admin')->group(function () {
   Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
   Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
});



//Route::get('/', function () {
//   return view('welcome');
//});

Auth::routes();
Route::get('/education', [EducationController::class, 'index'])->name('education.index');
Route::get('/education/create', [EducationController::class, 'create'])->name('education.create');
Route::post('/education', [EducationController::class, 'store'])->name('education.store');
Route::get('/education/{id}/edit', [EducationController::class, 'edit'])->name('education.edit');
Route::put('/education/{id}', [EducationController::class, 'update'])->name('education.update');
Route::delete('/education/{id}', [EducationController::class, 'destroy'])->name('education.destroy');



Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{id}', [ProjectsController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');

Route::get('/work_experiences', [Work_experienceController::class, 'index'])->name('work_experiences.index');
Route::get('/work_experiences/create', [Work_experienceController::class, 'create'])->name('work_experiences.create');
Route::post('/work_experiences', [Work_experienceController::class, 'store'])->name('work_experiences.store');
Route::get('/work_experiences/{id}/edit', [Work_experienceController::class, 'edit'])->name('work_experiences.edit');
Route::put('/work_experiences/{id}', [Work_experienceController::class, 'update'])->name('work_experiences.update');
Route::delete('/work_experiences/{id}', [Work_experienceController::class, 'destroy'])->name('work_experiences.destroy');

Route::get('/resume', [ResumeController::class, 'index'])->name('resume.index');
Route::get('resume/create', [ResumeController::class, 'create'])->name('resume.create');
Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');
Route::get('resume/download/{id}', [ResumeController::class, 'download'])->name('resume.download');

Route::get('/', [UsersController::class, 'index'])->name('users.index');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('users/create', [UsersController::class, 'create'])->name('users.create'); 
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [usersController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

