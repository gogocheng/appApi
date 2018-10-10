<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/26
 * Time: 11:14
 */

namespace app\common\lib\exception;

use Exception;
use think\exception\Handle;

//异常类重写
class ApiHandleException extends Handle
{
    /**
     * @var int 异常http状态码
     */
    public $httpCode = 500;

    public function render (Exception $e)
    {
        //debug开启，返回父类reder
        if (config('app_debug') == true) {
            return parent ::render($e);
        }
        //http状态码跟随ApiException类
        if ($e instanceof ApiException) {
            $this -> httpCode = $e -> httpCode;
        }
        return show(true, $e -> getMessage(), [], $this -> httpCode);
    }
}