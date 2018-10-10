<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------


// 应用公共文件

/**
 * description   通用化API接口数据输出
 * @param $status    业务状态码
 * @param $message   提示信息
 * @param array $data 返回数据
 * @param int $httpCode http状态码
 * @return \think\response\Json
 */
function show ($status, $message, $data = [], $httpCode = 200)
{
    $res = [
        'error' => $status,
        'message' => $message,
        'data' => $data,
    ];

    return json($res, $httpCode);
}

/**
 * description  跨域提交表单
 * @param  url $url
 * @param  array $params
 * @return mixed
 */
function curlPost($url,$params) {
    $postData = '';
    foreach($params as $k => $v)
    {
        $postData .= $k . '='.$v.'&';
    }
    rtrim($postData, '&');
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

/**
 * description 上传图片
 * @param $file
 * @return mixed   图片路径
 */
function upload($file){

    // 移动到框架应用根目录/public/uploads/ 目录下
    if($file){
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $imgUrl = $info -> getSaveName();
            return $imgUrl;
        }else{
            // 上传失败获取错误信息
            //echo $file->getError();
            return show(config('code.error'), $file->getError(), '', 403);
        }
    }

}

/**
 * description   调用python生成缩略图
 * @param $projectPath  根目录
 * @param $path   图片目录
 * @param $image   原图名称
 */
function getThumbImg($projectPath, $path, $image){
    $script_path = $projectPath."script.py";
    $cmd = config('app.python_path')." $script_path $path $image";
	system($cmd,$res);
    return $res;
}


