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

//后台前置中间件
Route::middleware('Login')->group(function () {
    Route::get('upload','myshop\IndexController@upload'); // 上传
    Route::post('do_upload','myshop\IndexController@do_upload'); // 上传
});

//前台前置中间件
Route::middleware('Home')->group(function () {
    Route::get('home_index','home\IndexController@index'); // 列表
    Route::get('wish','home\IndexController@wish'); // 商品详情页
    Route::get('buyCart','home\IndexController@buyCart'); // 加入购物车
    Route::get('do_buyCart','home\IndexController@do_buyCart'); // 加入购物车
    Route::get('order','home\IndexController@order'); // 订单
    Route::get('do_order','home\IndexController@do_order'); // 订单
});

//前置中间件 时间
// Route::middleware('time')->group(function () {
//     Route::get('edit','myshop\IndexController@edit'); // 修改
//     Route::post('update','myshop\IndexController@update'); // 修改
// });

//后台
Route::get('register','myshop\LoginController@register'); //注册
Route::post('do_register','myshop\LoginController@do_register'); //注册表单验证
Route::post('login','myshop\LoginController@login'); //登录
Route::post('do_login','myshop\LoginController@do_login'); //登录表单提交验证
Route::get('logout','myshop\LoginController@logout'); // 退出
Route::get('create','myshop\IndexController@create'); // 添加
Route::post('save','myshop\IndexController@save'); // 执行添加
Route::get('index','myshop\IndexController@index'); // 列表
Route::get('delete','myshop\IndexController@delete'); // 删除
Route::get('edit','myshop\IndexController@edit'); // 修改
Route::post('update','myshop\IndexController@update'); // 修改

//前台
Route::get('home_register','home\Login@register'); //注册
Route::post('home_do_register','home\Login@do_register'); //注册表单验证
Route::get('home_login','home\Login@login'); // 登录
Route::post('home_do_login','home\Login@do_login'); // 执行登录
Route::get('home_logout','home\Login@logout'); // 退出
Route::get('pay','Pay\AliPayController@pay'); // 支付宝支付
Route::get('goodsList','home\goodsController@goodsList');  // 商品列表
// Route::get('delete','home\IndexController@delete');  // 商品列表


//学生管理系统
Route::get('addcreate','myshop\createController@addcreate');
Route::post('addcreate_do','myshop\createController@addcreate_do');
Route::get('list','myshop\createController@list');
Route::get('del','myshop\createController@del');
Route::get('edita','myshop\createController@edita');
Route::post('edita_do','myshop\createController@edita_do');


//后台火车票添加
Route::get('ticket_add','myshop\ticketController@ticket_add');
Route::post('ticket_add_do','myshop\ticketController@ticket_add_do');
Route::get('ticket_list','home\IndexController@ticket_list');
Route::get('ticket_del','home\IndexController@ticket_del');
Route::get('ticket_upd','home\IndexController@ticket_upd');
Route::post('ticket_upd_do','home\IndexController@ticket_upd_do');



