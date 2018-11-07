<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/27
 * Time: 14:25
 */

return [
    'password_pre_halt' => '_#qwer',   // 密码加密盐
    'aes_key' => 'aes123abc789qwer',//aes 密钥 , 服务端和客户端必须保持一致 16位
    'app_type' => [
        'ios',
        'android',
    ],
    'app_sign_time' => 3600,// sign失效时间 秒为单位
    'app_sign_cache_time' => 3700,// sign 缓存失效时间  秒为单位
    'login_time_out_day' => 7, //登录token的失效时间   日为单位
    'host' => "http://".$_SERVER['HTTP_HOST'],   //获取主机地址
    'port' => $_SERVER["SERVER_PORT"],  //获取端口
    'img_url' => "/agrapi/public/",
    'time' => time(),  //时间戳
    'random'  => rand(100000,999999) // 随机数
];