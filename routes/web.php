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



$routes = function () {
    Route::group(['middleware' => ['web', 'auth']], function () {

        Route::get('/locations/create', 'LocationsController@create');
        Route::post('/locations', 'LocationsController@store');

        Route::get('/locations/path', 'LocationsController@path');
        Route::get('/home', 'PagesController@home');
        Route::get('/groups/', 'GroupsController@index')->name('groups.index');
        Route::get('/groups/create', 'GroupsController@create')->name('groups.index');
        Route::post('/groups', 'GroupsController@store')->name('groups.index');

        Route::get('/groups/users', 'GroupsController@users')->name('groups.users');
        Route::get('/groups/users/{user}/active', 'GroupsController@toggleActive')->name('groups.users.toggle');
    });
    Auth::routes();
    Route::get('/contact-us', 'PagesController@contact');


    Route::get('/', 'PagesController@welcome')->name('home');
    Route::get('/contact', 'PagesController@contact')->name('contact');
};

// Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|ar'], 'middleware' => 'setLocale'], $routes);

$routes();
