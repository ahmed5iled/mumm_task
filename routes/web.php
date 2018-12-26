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

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', 'AuthenticationController@loginPage')->name('loginPage');
        Route::post('/', 'AuthenticationController@login')->name('login');
    });
    Route::get('/logout', 'AuthenticationController@logout')->name('logout');
    Route::get('/home', 'AuthenticationController@home')->name('home');
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::post('/information', 'ProfileController@changePersonalInfo')->name('changePersonalInfo');
        Route::post('/password', 'ProfileController@changePassword')->name('changePassword');
        Route::post('/avatar', 'ProfileController@changeProfileImage')->name('changeProfileImage');
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoriesController@index')->name('listCategories');
        Route::get('/add', 'CategoriesController@create')->name('createCategory');
        Route::post('/add', 'CategoriesController@store')->name('addCategory');
        Route::group(['prefix' => '{category}'], function () {
            Route::get('/edit', 'CategoriesController@edit')->name('editCategory');
            Route::post('/update', 'CategoriesController@update')->name('updateCategory');
            Route::get('/delete', 'CategoriesController@destroy')->name('deleteCategory');
            Route::group(['prefix' => 'blogs'], function () {
                Route::get('/', 'BlogsController@index')->name('listBlogs');
                Route::get('/add', 'BlogsController@create')->name('createBlog');
                Route::post('/add', 'BlogsController@store')->name('addBlog');
                Route::group(['prefix' => '{blog}'], function () {
                    Route::get('/edit', 'BlogsController@edit')->name('editBlog');
                    Route::post('/update', 'BlogsController@update')->name('updateBlog');
                    Route::get('/delete', 'BlogsController@destroy')->name('deleteBlog');

                });
            });
        });
    });
});

//front
Route::get('/', 'AuthenticationController@frontHome')->name('frontHome');
Route::group(['prefix' => '{categories}'], function () {
    Route::get('/', 'BlogsController@categories')->name('category');
    Route::group(['prefix' => '{blogs}'], function () {
        Route::get('/', 'BlogsController@singleBlog')->name('singleBlog');
    });
});
