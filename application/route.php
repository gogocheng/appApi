<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//GET
Route::get('test','api/test/index');

Route::resource('test','api/test');
//短信验证码相关
Route::resource('api/:ver/identify', 'api/:ver.identify');
//登录
Route::post('api/:ver/login', 'api/:ver.login/save');
//用户
Route::resource('api/:ver/user', 'api/:ver.user');


