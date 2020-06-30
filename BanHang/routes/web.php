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
Route::get('booktour','TourController@getList');

Route::get('insertTour','TourController@views');
Route::post('insertTour','TourController@insertTour');

Route::get('index',[
    'as'=>'trangchu',
    'uses'=>'PageController@getIndex']);
    Route::get('dangnhap',[
        'as'=>'login',
        'uses'=>'PageController@getLogin'
    ]);
    Route::post('dangnhap',[
        'as'=>'login',
        'uses'=>'PageController@postLogin'
    ]);
    Route::get('dangki',[
        'as'=>'signup',
        'uses'=>'PageController@getSignup'
    ]);

    Route::post('dangki',[
        'as'=>'signup',
        'uses'=>'PageController@postSignup'
    ]);

    Route::get('dangxuat',[
        'as'=>'logout',
        'uses'=>'PageController@getLogout'
    ]);

Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChitiet'
]);
Route::get('lienhe',[
    'as'=>'lienhe',
    'uses'=>'PageController@getLienhe'
]);
Route::get('about',[
    'as'=>'about',
    'uses'=>'PageController@getAbout'
]);
Route::get('gioi_thieu',[
    'as'=>'about',
    'uses'=>'PageController@getAbout'
]);
Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);
Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@getDelItemCart'
]);

Route::get('order',[
    'as'=>'order',
    'uses'=>'PageController@order'
]);

Route::post('dat-hang',[
    'as'=>'dat-hang',
    'uses'=>'PageController@postCheckout'
]);
