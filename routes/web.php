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



//vendor auto

Route::post('/vendor/insurances', [App\Http\Controllers\VendorController::class, 'insurances'])->name('vendor.insurances');
Route::get('/vendor/auto/pending_quote', [App\Http\Controllers\AutoController::class, 'pending_quote'])->name('vendor.auto_pending_quote');
Route::post('/vendor/auto/ajax_pending_quote', [App\Http\Controllers\AutoController::class, 'ajax_pending_quote'])->name('vendor.ajax_auto_pending_quote');
Route::get('/auto/quote/{id}', [App\Http\Controllers\AutoController::class, 'give_quote'])->name('auto.give_quote');
Route::post('/auto/submit_value', [App\Http\Controllers\AutoController::class, 'submit_value'])->name('auto.submit_value');

Route::get('/vendor/auto/submitted_quote', [App\Http\Controllers\AutoController::class, 'submitted_quote'])->name('vendor.auto.submitted_quote');
Route::post('/vendor/auto/ajax_submitted_quote', [App\Http\Controllers\AutoController::class, 'ajax_submitted_quote'])->name('vendor.ajax_auto_submitted_quote');



Route::get('/vendor/submitted_quote', [App\Http\Controllers\VendorController::class, 'submitted_quote'])->name('vendor.submitted_quote');





//AutoController

Route::get('/auto/quote', [App\Http\Controllers\AutoController::class, 'quote'])->name('auto.quote');


//temp
Route::post('/auto/temp_store', [App\Http\Controllers\AutoController::class, 'temp_store'])->name('auto.temp_store');
Route::post('/auto/temp_drivers', [App\Http\Controllers\AutoController::class, 'temp_drivers'])->name('auto.temp_drivers');
Route::post('/auto/temp_driver_store', [App\Http\Controllers\AutoController::class, 'temp_driver_store'])->name('auto.temp_driver_store');
Route::post('/auto/temp_driver_edit', [App\Http\Controllers\AutoController::class, 'temp_driver_edit'])->name('auto.temp_driver_edit');
Route::get('/auto/temp_drivers/delete/{id}', [App\Http\Controllers\AutoController::class, 'temp_driver_delete'])->name('auto.temp_driver_delete');





Route::post('/auto/temp_claim_store', [App\Http\Controllers\AutoController::class, 'temp_claim_store'])->name('auto.temp_claim_store');
Route::post('/auto/temp_claims', [App\Http\Controllers\AutoController::class, 'temp_claims'])->name('auto.temp_claims');
Route::post('/auto/temp_claims_edit', [App\Http\Controllers\AutoController::class, 'temp_claims_edit'])->name('auto.temp_claims_edit');
Route::get('/auto/temp_claims/delete/{id}', [App\Http\Controllers\AutoController::class, 'temp_claims_delete'])->name('auto.temp_claims_delete');


Route::post('/auto/submit_quote', [App\Http\Controllers\AutoController::class, 'submit_quote'])->name('auto.submit_quote');
Route::get('/auto_requests', [App\Http\Controllers\AutoController::class, 'auto_requests'])->name('auto_requests');

Route::get('/auto/incomplete_quotes', [App\Http\Controllers\AutoController::class, 'incomplete_quotes'])->name('auto.incomplete_quotes');
Route::post('/auto/incomplete_quote_submit', [App\Http\Controllers\AutoController::class, 'incomplete_quote_submit'])->name('auto.incomplete_quote_submit');
