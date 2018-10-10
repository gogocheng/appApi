<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/28
 * Time: 11:19
 */

namespace app\common\lib;


class Time
{
    /**
     * description 生成13位时间戳
     * @return string
     */
    public static function get13TimeStamp ()
    {
        list($t1, $t2) = explode(' ', microtime());
        $res = $t2 . ceil($t1 * 1000);
        return $res;
    }
}