<?php


// Login
Route::get('backend/login', 'Auth\LoginBackendController@showBackendLoginForm')->name('backend.login');	
Route::post('backend/login', 'Auth\LoginBackendController@backendLogin');


Route::prefix('backend')->namespace('Backend')->group(function(){
// rutas del backend	
	Route::get('/', 'DashboardController@index')->name('backend.dashboard');
	
	Route::resource('posts', 'PostController', ['except' => 'show', 'as' => 'backend']);
	Route::resource('administrators', 'AdministratorController', ['as' => 'backend']);
	Route::resource('users', 'UserController', [ 'only' => ['index', 'show', 'destroy'] ,'as' => 'backend']);
	
	Route::put('administrators/{administrator}/fotos', 'AdministratorFotosController@update')->name('backend.administrators.fotos.update');
	
	Route::resource('roles', 'RoleController', ['except' => 'show', 'as' => 'backend']);
	Route::resource('permissions', 'PermissionController', ['only' => ['index', 'edit', 'update'], 'as' => 'backend']);



	Route::middleware('role:Admin')->put('administrators/{administrator}/roles', 'AdministratorRolesController@update')->name('backend.administrators.roles.update');
	Route::middleware('role:Admin')->put('administrators/{administrator}/permissions', 'AdministratorPermissionsController@update')->name('backend.administrators.permissions.update');
	Route::post('posts/{post}/photos', 'PhotosController@store')->name('backend.post.photos.store');
	Route::delete('photos/{photo}', 'PhotosController@destroy')->name('backend.photos.destroy');
	

});


