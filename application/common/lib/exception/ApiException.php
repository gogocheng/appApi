<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/26
 * Time: 11:14
 */

namespace app\common\lib\exception;

use think\Exception;

class ApiException extends Exception
{
    //提示信息
    public $message = '';
    //http状态码
    public $httpCode = 500;
    //业务状态码
    //public $code = 0;
    //报错
    public $error = true;

    /**
     * @param string $message 提示信息
     * @param int $httpCode http状态码
     * @param int $code 业务状态码
     */
    public function __construct ($message = '', $httpCode = 0, $error = 0)
    {
        $this -> httpCode = $httpCode;
        $this -> message = $message;
        $this -> error = $error;
        //$this -> code = $code;

    }
}