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
Route::post('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@postLienHe'
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


Route::get('dang-xuat',[
	'as'=>'log-out',
	'uses'=>'PageController@postLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);


Route::get('admin/dangnhap','UserController@getDangNhap');

Route::post('admin/dangnhap','UserController@postDangNhap');

Route::get('admin/logout','UserController@getDangXuat');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');

		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('them','TheLoaiController@getThem');

		Route::post('them', 'TheLoaiController@postThem');

		Route::get('xoa/{id}', 'TheLoaiController@getXoa');
	});

	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('danhsach','BillController@getDanhSach');

		Route::get('sua/{id}','BillController@getSua');

		Route::post('sua/{id}','BillController@postSua');

		Route::get('them','BillController@getThem');

		Route::post('them', 'BillController@postThem');

		Route::get('xoa/{id}', 'BillController@getXoa');

		Route::get('chitiet/{id}','BillController@getChiTiet');
	});

	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','ProductController@getDanhSach');

		Route::get('them','ProductController@getThem');

		Route::post('them','ProductController@postThem');

		Route::get('sua/{id}','ProductController@getSua');

		Route::post('sua/{id}','ProductController@postSua');

		Route::get('xoa/{id}','ProductController@getXoa');

	});


	Route::group(['prefix'=>'khachhang'],function(){
		Route::get('danhsach','CustomerController@getDanhSach');

		Route::get('sua/{id}','CustomerController@getSua');

		Route::post('sua/{id}','CustomerController@postSua');

		Route::get('xoa/{id}','CustomerController@getXoa');

	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('them','UserController@getThem');

		Route::post('them','UserController@postThem');

		Route::get('sua/{id}','UserController@getSua');

		Route::post('sua/{id}','UserController@postSua');

		Route::get('xoa/{id}','UserController@getXoa');
	});

	Route::group(["prefix"=>"ajax"],function(){
		Route::get("loaitin/{idTheLoai}","AjaxController@getLoaiTin");
	});
});

