<?php

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

Route::prefix('permissions')->group(function() {
    Route::get('/', 'PermissionsController@index')->name('permissions');
    Route::post('/index', 'PermissionsController@permission_index')->name('index.permission');
    Route::post('/add', 'PermissionsController@add_permission')->name('add.permission');
    Route::post('/edit/{id}', 'PermissionsController@edit_permission')->name('edit.permission');
     Route::delete('/{id}', 'PermissionsController@delete_permission')->name('delete.permission');
    Route::get('/users', 'PermissionsController@user_permission')->name('users.permission');
    Route::post('/users/{id}', 'PermissionsController@get_user_permission')->name('users.get_permission');
    Route::post('/users/disabled/{id}', 'PermissionsController@get_disabled_user_permission')->name('users.get_disabled_permission');
     Route::post('/user/asignPermissions', 'PermissionsController@asign_user_permission')->name('user.asign_permission');


});
Route::prefix('roles')->group(function() {
    Route::get('/', 'RolesController@roles')->name('roles');
    Route::post('/index', 'RolesController@role_index')->name('index.role');
    Route::post('/add', 'RolesController@add_role')->name('add.role');
    Route::post('/edit/{id}', 'RolesController@edit_role')->name('edit.role');
     Route::delete('/{id}', 'RolesController@delete_role')->name('delete.role');
     Route::get('/permissions', 'RolesController@roles_permission')->name('role.permission');
     Route::post('/getPermissions/{id}', 'RolesController@get_role_permission')->name('role.get_permission');
     Route::post('/asignPermissions', 'RolesController@asign_role_permission')->name('role.asign_permission');
    Route::get('/users', 'RolesController@user_roles')->name('user.roles');
    Route::post('/users/{id}', 'RolesController@get_users_roles')->name('users.get_roles');
     Route::post('/user/assignRoles', 'RolesController@asign_users_roles')->name('users.asign_roles');


});