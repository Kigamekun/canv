<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Auth::routes();
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/design/{design_id}', [HomeController::class, 'design'])->name('design');
Route::get('/add_template', [HomeController::class, 'add_template'])->name('add_template');
Route::get('/edit_template/{data_id}', [HomeController::class, 'client_edit'])->name('edit_template');
Route::post('/update_design', [HomeController::class, 'update_design'])->name('update');
Route::post('/create_template', [HomeController::class, 'create_template'])->name('create_template');
Route::get('/my_template', [HomeController::class, 'my_template'])->name('my_template');