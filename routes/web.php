<?php

use App\Http\Livewire\Admin\Category\Category;
use App\Http\Livewire\Admin\Dashboard\Dashboard;
use App\Http\Livewire\Admin\Exam\Exam;
use App\Http\Livewire\Admin\Exam\Question;
use App\Http\Livewire\Admin\Exam\QuestionCreate;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
Route::get('category', Category::class)->name('admin.category');
Route::get('questions', Question::class)->name('admin.questions');
Route::get('exam', Exam::class)->name('admin.exam');
Route::get('questions/create/{id}', QuestionCreate::class)->name('admin.questions.create');