<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/28
 * Time: 15:34
 */

namespace app\common\lib;


use think\Cache;
use think\Log;

/**
 * description  发送短信验证码基础类库
 * Class Yuntongxun
 * @package app\common\lib
 */
class Yuntongxun
{
    const LOG_TPL = "yuntongxun:";

    public static function sendTemplateSMS ($to, $datas, $tempId)
    {
        // 初始化REST SDK
        //global $accountSid,$accountToken,$accountToken,$serverIP,$serverPort,$softVersion;
        $accountSid = config('yuntongxun.accountSid');
        $accountToken = config('yuntongxun.accountToken');
        $serverIP = config('yuntongxun.serverIP');
        $serverPort = config('yuntongxun.serverPort');
        $softVersion = config('yuntongxun.softVersion');
        $appId = config('yuntongxun.appId');

        $rest = new REST($serverIP, $serverPort, $softVersion);
        $rest -> setAccount($accountSid, $accountToken);
        $rest -> setAppId($appId);

        // 发送模板短信
        //echo "Sending TemplateSMS to $to <br/>";
        $result = $rest -> sendTemplateSMS($to, $datas, $tempId);
        if ($result == NULL) {
            //echo "result error!";
            return;
            //break;
        }
        if ($result -> statusCode != 0) {
            //echo "error code :" . $result -> statusCode . "<br>";
            //echo "error msg :" . $result -> statusMsg . "<br>";
            //TODO 添加错误处理逻辑,写入日志
            Log ::write(self::LOG_TPL . "set-----111" . json_encode($result));
        } else {
            //echo "Sendind TemplateSMS success!<br/>";
            // 获取返回信息
            $smsmessage = $result -> TemplateSMS;
            //echo "dateCreated:" . $smsmessage -> dateCreated . "<br/>";
            //echo "smsMessageSid:" . $smsmessage -> smsMessageSid . "<br/>";
            //TODO 添加成功处理逻辑，将手机号码和验证码写入缓存
            Cache ::set($to, $datas, config('yuntongxun.identify_time'));
            return true;
        }
    }

    /**
     * description  检查验证码是否正常
     * @param $to
     * @return bool|mixed
     */
    public static function checkTemplateSMS ($to)
    {
        if (!$to) {
            return false;
        }
        $res = Cache ::get($to);
        return $res;
    }
}