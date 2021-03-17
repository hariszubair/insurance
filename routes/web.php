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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
});
Route::get('/migrate', function() {
    $exitCode = Artisan::call('migrate');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dark_mode', [App\Http\Controllers\HomeController::class, 'dark_mode'])->name('dark_mode');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/about_us', [App\Http\Controllers\HomeController::class, 'about_us'])->name('about_us');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

//insurances 
Route::get('/pet_insurance', [App\Http\Controllers\HomeController::class, 'pet_insurance'])->name('pet_insurance');
Route::get('/health_insurance', [App\Http\Controllers\HomeController::class, 'health_insurance'])->name('health_insurance');
Route::get('/life_insurance', [App\Http\Controllers\HomeController::class, 'life_insurance'])->name('life_insurance');
Route::get('/car_insurance', [App\Http\Controllers\HomeController::class, 'car_insurance'])->name('car_insurance');
Route::get('/home_insurance', [App\Http\Controllers\HomeController::class, 'home_insurance'])->name('home_insurance');


//user controller
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users')->middleware(['permission:add user|edit user|delete user']);
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')->middleware(['permission:edit user']);;
Route::patch('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update')->middleware(['permission:edit user']);;
Route::delete('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete')->middleware(['permission:delete user']);;

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create')->middleware(['permission:add user']);
Route::post('/ajax_users', [App\Http\Controllers\UserController::class, 'ajax_users'])->name('ajax_users')->middleware(['permission:add user|edit user|delete user']);
Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store')->middleware(['permission:add user']);



