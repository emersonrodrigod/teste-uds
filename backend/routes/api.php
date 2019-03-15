<?php

use Illuminate\Http\Request;

Route::resource('size', 'SizeController',[
    'only' => ['index', 'show'] 
]);

Route::resource('option', 'OptionController',[
    'only' => ['index', 'show']
]);

Route::resource('flavor', 'FlavorController',[
    'only' => ['index', 'show']
]);

Route::resource('order','OrderController',[
    'except' => ['create','edit']
]);
Route::post('/order/{order}/option','OrderController@attachOption');