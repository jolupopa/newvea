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
// para edicion de markdown
//  Route::get('/email', function(){
// 	return new App\Mail\LoginCredentials(App\Administrator::first(), 'qasedrft');
// });

//sociality
Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');


 // inicio
Route::get('/', 'PagesController@home')->name('home');
// Blog
Route::get('/blog', 'BlogController@blog')->name('blog');
Route::get('/blog/{post}', 'BlogController@post')->name('post');
//Categories
Route::get('categorias/{category}', 'BlogController@categories')->name('categories.show');
//etiquetas
Route::get('etiquetas/{tag}', 'BlogController@tags')->name('tags.show');

// propiedades
Route::get('typeproperty/{id}', 'PropertyController@by_type')->name('properties.type');
Route::get('ciudad/{city}', 'PropertyController@by_city')->name('properties.city.index');
Route::get('inmueble/{property}', 'PropertyController@show')->name('properties.show');
Route::get('promotor/{promotor}', 'PropertyController@by_promotor')->name('properties.promotor.index');

// ubicacion geografica
Route::get('ubigeo', 'UbigeoController@index')->name('ubigeo.index');
Route::get('provincias/{id}', 'UbigeoController@getProvincias')->name('provincias');
Route::get('distritos/{id}', 'UbigeoController@getDistritos')->name('distritos');
Route::get('zonas/{id}', 'UbigeoController@getZonas')->name('zonas');


Auth::routes(['verify' => true]);
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes... 
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::prefix('admin')->middleware('verified')->namespace('Admin')->group(function(){
	Route::get('cuenta', 'DashboardController@account')->name('cuenta');	
	Route::get('datos', 'DashboardController@datos')->name('datos');	
	Route::get('propiedades', 'DashboardController@properties')->name('propiedades');
	Route::get('perfil', 'DashboardController@profile')->name('perfil');
	Route::get('credito', 'DashboardController@credit')->name('credito');
	Route::get('tareas', 'DashboardController@tasks')->name('tareas');
	Route::get('contactos', 'DashboardController@contacts')->name('contactos');
	//users
	Route::get('user/{user}', 'UserController@show')->name('admin.user.show');
	Route::get('user/{user}/edit', 'UserController@edit')->name('admin.user.edit');
	Route::put('user/{user}', 'UserController@update_datos')->name('admin.user.datos.update');
	Route::put('user/{user}/password', 'UserController@update_password')->name('admin.user.password.update');
	Route::put('user/{user}/foto', 'UserController@update_foto')->name('admin.user.foto.update');
	Route::put('user/{user}/redes', 'UserController@update_redes')->name('admin.user.redes.update');
	//properties
	Route::resource('property', 'PropertyController', ['except' => 'destroy', 'as' => 'admin']);

});






 




