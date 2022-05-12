<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['jwt.auth']], function(){
    Route::post('/login', 'AuthController@login');
    Route::get('/posts', 'PostsController@indx');

});