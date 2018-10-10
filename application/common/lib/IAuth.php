<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/27
 * Time: 16:28
 */

namespace app\common\lib;

use app\common\lib\Aes;
use think\Cache;

class IAuth
{
    /**
     * description  登录密码加密
     * @param $data  string
     * @return string
     */
    public static function setPassword ($data)
    {
        return md5($data . config('app.password_pre_halt'));
    }

    /**
     * description   sign Aes加密
     * @param array $data 传递数组
     * @return string   sign加密字符串
     */
    public static function setSign ($data = [])
    {
        //按字段排序
        ksort($data);
        //拼接字符串数据
        $string = http_build_query($data);
        //$string = "apptype=android&time=1530867196560&version=1";
        //Aes加密
        $string = (new Aes()) -> encrypt($string);
        return $string;
    }

    /**
     * description  检查sign是否正确
     * @param array $data 数组
     * @return bool
     */
    public static function checkSignPass ($data = [])
    {
        //解密
        $str = (new Aes()) -> decrypt($data['sign']);
        if (empty($str)) {
            return false;
        }
        // version=xx&apptype=android
        parse_str($str, $arr);

        //判断数组中的每一项是否为空
        if (!is_array($arr) || empty($arr['version']) || $arr['version'] != $data['version']) {
            return false;
        }
        if (!is_array($arr) || empty($arr['apptype']) || $arr['apptype'] != $data['apptype']) {
            return false;
        }

        if (!config('app_debug')) {
            if ((time() - ceil($arr['time'] / 1000)) > config('app.app_sign_time')) {
                return false;
            }
            // 唯一性判定，从缓存中读取,如果有即已经请求
            /*if (Cache ::get($data['sign'])) {
                return false;
            }*/
        }
        return true;
    }

    /**
     * description  设置登录token  唯一性的
     * @param string $to 手机号码
     * @return string
     */
    public static function setAppLoginToken ($to = "")
    {
        $string = md5(uniqid(md5(microtime(true)), true));
        $string = sha1($string . $to);
        return $string;
    }
}