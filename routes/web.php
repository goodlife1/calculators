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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\IndexController@dashboard');
    Route::resource('/pages', 'Admin\PageController');
    Route::resource('/category', 'Admin\CategoryController');


});
Route::group(['prefix' => 'finance'], function () {
    Route::post('mortgage', 'FinanceCalculatorController@mortgageCalculator');
    Route::post('paymant', 'FinanceCalculatorController@paymentCalc');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::post('contact-us', 'HomeController@sendMessage')->name('send_mail');
Route::get('lang/{lang}', 'HomeController@changeLanguage');
Route::group(['prefix' => \Session::get('routeLang')], function () {
    Route::get('search', 'PageController@search')->name('search');
    Route::get('contact-us', 'PageController@contactUs')->name('contact');
    Route::get('example', function () {
        return view('calculators.finance.wacc');
    });
    Route::get('/', 'PageController@index')->name('home');
    Route::get('/category/{category}', 'PageController@getCategoryCalculators')->name('category');
    Route::get('/{page}', 'PageController@getPage')->name('page');

});



