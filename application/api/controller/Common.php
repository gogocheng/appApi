<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/27
 * Time: 14:40
 */

namespace app\api\controller;

use app\common\lib\exception\ApiException;
use app\common\lib\Yuntongxun;
use think\Controller;
use app\common\lib\Aes;
use app\common\lib\IAuth;
use app\common\lib\Time;
use think\Cache;

/**
 * description   api模块公共控制器
 * Class Common
 * @package app\api\controller
 */
class Common extends Controller
{
    /**
     * @var string header头部信息
     */
    public $header = '';

    /**
     * description 初始化
     */
    public function _initialize ()
    {
        $this -> checkRequestAuth();
        //$this -> testAes();
    }

    /**
     * description 检查每次app请求的数据是否合法
     */
    public function checkRequestAuth ()
    {
        //获取header头信息
        $header = request() -> header();

        //参数校验
        if (empty($header['sign'])) {
            throw new ApiException('sign不存在', 400);
        }
        if (!in_array($header['apptype'], config('app.app_type'))) {
            throw new ApiException('app_type不合法', 400);
        }
        if (!IAuth ::checkSignPass($header)) {
            throw new ApiException('授权码sign失败', 401);
        }
       /* //将sign放入缓存
        Cache ::set($header['sign'], 1, config('app.app_sign_cache_time'));*/
        $this -> header = $header;

    }

    /**
     * description  aes加密测试
     */
    public function testAes ()
    {
        $data = [
            'apptype' => "android",
            'version' => 1,
            'time' => Time ::get13TimeStamp(),

        ];
        $sign = IAuth ::setSign($data);
        echo $sign;
    }

    /**
     * description 短线验证码测试
     */
    public function testSend ()
    {
        $to = "18316858996";
        //$data = rand(1000, 9999);
        $datas = [ rand(1000, 9999) ];

        $tempId = config('yuntongxun.tempId');
        //dump($datas);
        Yuntongxun ::sendTemplateSMS($to, $datas, $tempId);
    }

    /**
     * description AppLoginToken 测试
     */
    public function testAppLoginToken ()
    {
        $to = "18316858996";
        $res = IAuth ::setAppLoginToken($to);
        echo $res;
    }
}