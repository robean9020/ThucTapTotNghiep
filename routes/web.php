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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[
	'as'=> 'trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChiTietSp'
]);
Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);
Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDeleteItemCart'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('xem-gio-hang',[
	'as'=>'xemgiohang',
	'uses'=>'PageController@getCart'
]);

Route::get('login',[
	'as'=>'dangnhap',
	'uses'=>'PageController@getLogin'
]);

Route::post('login',[
	'as'=>'dangnhap',
	'uses'=>'PageController@postLogin'
]);

Route::get('sign-up',[
	'as'=>'dangky',
	'uses'=>'PageController@getSignUp'
]);

Route::post('sign-up',[
	'as'=>'dangky',
	'uses'=>'PageController@postSignUp'
]);

Route::get('dang-xuat',[
	'as'=>'log-out',
	'uses'=>'PageController@postLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
