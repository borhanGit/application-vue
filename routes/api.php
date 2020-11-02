<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
Route::apiResource('/employee','EmployeeController');
//Route::apiResource('/employee/delete','EmployeeController@destroy');
Route::apiResource('/supplier','SupplierController');
Route::apiResource('/customer','CustomerController');
Route::apiResource('/category','CategoryController');
Route::apiResource('/product','ProductController');
Route::apiResource('/expense','ExpenseController');
Route::Post('/stock/update/{id}','ProductController@StockUpdate');
Route::get('/getting/product/{id}','PosController@GetProduct');
Route::post('/orderdone','PosController@OrderDone');
Route::get('/vats','CartController@Vats');
Route::get('/addTocart/{id}','CartController@AddToCart');
Route::get('/cart/product','CartController@CartProduct');
Route::get('/remove/cart/{id}','CartController@removeCart');
Route::get('/increment/{id}','CartController@Increment');
Route::get('/decrement/{id}','CartController@Decrement');
Route::get('/orders','OrderController@TodayOrder');
Route::get('/order/details/{id}','OrderController@OrderDetails');
Route::get('/order/orderdetails/{id}','OrderController@OrderDetailsAll');
Route::post('/search/order','OrderController@SearchOrderDate');
