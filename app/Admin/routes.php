<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('bank', 'BankController@index');
    $router->get('bank/{id}', 'BankController@show');
    $router->get('bank/create', 'BankController@create');
    $router->post('bank/save','BankController@store');
    $router->get('bank/{id}/edit','BankController@edit');
    $router->put('bank/upd/{id}','BankController@update');


    $router->get('user', 'UserController@index');
    $router->get('user/create', 'UserController@create');
    $router->get('user/save', 'UserController@store');
    $router->get('pay/channel', 'ChannelController@index');
    $router->post('/pay/channel/disable', 'ChannelController@disablePay');

    $router->get('pay/list','OrderExchangeController@index');
    $router->post('/pay/confirm', 'OrderExchangeController@confirmPay');

    $router->get('trade/product','GoodController@index');
    $router->get('notice/list','NoticeController@index');
    $router->get('notice/list/create','NoticeController@create');
    $router->post('notice/save', 'NoticeController@store');
    $router->any('notice/add', 'NoticeController@create');
    $router->get('notice/list/{id}/edit','NoticeController@edit');
    $router->put('notice/upd/{id}','NoticeController@update');
    $router->delete('notice/list/{id}','NoticeController@destroy');
    ///notice/list/4
    $router->any('users/files', 'FileController@handle');

});



Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
],function (Router $router){
    $router->get('api/user', 'ApiController@user');
});
