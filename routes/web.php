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

Route::get('/', 'FrontController@index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', 'FrontController@index')->name('home');

// front
Route::get('/front/index', 'FrontController@index')->name('front/index');
Route::get('/front/gallery', 'FrontController@gallery')->name('front/gallery');
Route::get('/front/article', 'FrontController@article')->name('front/article');
Route::get('/front/profile', 'FrontController@profile')->name('front/profile');
Route::get('/front/contact', 'FrontController@contact')->name('front/contact');
Route::get('/front/service/{slug}', 'FrontController@service')->name('front/service');
Route::get('/front/subService/{slug}', 'FrontController@subService')->name('front/subService');
Route::get('/front/detailService/{slug}', 'FrontController@detailService')->name('front/detailService');
Route::get('/front/articleDetail/{slug}', 'FrontController@articleDetail')->name('front/articleDetail');


Route::group(['middleware' => 'admin'], function(){
   // article
   Route::get('/article/index', 'ArticleController@index')->name('article/index');
   Route::post('/article/store', 'ArticleController@store')->name('article/store');
   Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article/edit');
   Route::get('/article/create', 'ArticleController@create')->name('article/create');
   Route::post('/article/update', 'ArticleController@update')->name('article/update');
   Route::get('/article/destroy/{id}', 'ArticleController@destroy')->name('article/destroy');
   // contacts
   Route::get('/contact/edit', 'ServiceController@contact')->name('contact/edit');
   // gallery
   Route::get('/gallery/index', 'GalleryController@index')->name('gallery/index');
   Route::post('/gallery/store', 'GalleryController@store')->name('gallery/store');
   Route::get('/gallery/destroy/{id}', 'GalleryController@destroy')->name('gallery/destroy');
   // detail Services
   Route::get('/detailService/index', 'DetailServiceController@index')->name('detailService/index');
   Route::post('/detailService/store', 'DetailServiceController@store')->name('detailService/store');
   Route::get('/detailService/create', 'DetailServiceController@create')->name('detailService/create');
   Route::get('/detailService/{id}/edit/', 'DetailServiceController@edit')->name('detailService/edit');
   Route::post('/detailService/update', 'DetailServiceController@update')->name('detailService/update');
   Route::get('/detailService/destroy/{id}', 'DetailServiceController@destroy')->name('detailService/destroy');
   Route::post('/detailService/updateImage', 'DetailServiceController@updateImage')->name('detailService/updateImage');
   // Profile
   Route::get('/profile/edit', 'ServiceController@profile')->name('profile/edit');
   Route::post('/profile/update', 'ServiceController@profileUpdate')->name('profile/update');
   // services
   Route::get('/service/index', 'ServiceController@index')->name('service/index');
   Route::post('/service/store', 'ServiceController@store')->name('service/store');
   Route::get('/service/create', 'ServiceController@create')->name('service/create');
   Route::get('/service/{id}/edit/', 'ServiceController@edit')->name('service/edit');
   Route::post('/service/update', 'ServiceController@update')->name('service/update');
   Route::get('/service/destroy/{id}', 'ServiceController@destroy')->name('service/destroy');
   Route::post('/service/updateImage', 'ServiceController@updateImage')->name('service/updateImage');
   // subServices
   Route::get('/subService/index', 'SubServiceController@index')->name('subService/index');
   Route::post('/subService/store', 'SubServiceController@store')->name('subService/store');
   Route::get('/subService/create', 'SubServiceController@create')->name('subService/create');
   Route::get('/subService/{id}/edit/', 'SubServiceController@edit')->name('subService/edit');
   Route::post('/subService/update', 'SubServiceController@update')->name('subService/update');
   Route::get('/subService/destroy/{id}', 'SubServiceController@destroy')->name('subService/destroy');
   Route::post('/subService/updateImage', 'SubServiceController@updateImage')->name('subService/updateImage');
});
