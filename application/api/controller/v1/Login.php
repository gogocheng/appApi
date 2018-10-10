<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/29
 * Time: 14:22
 */

namespace app\api\controller\v1;

use app\api\controller\Common;
use app\common\lib\IAuth;
use app\common\lib\Yuntongxun;
use app\common\lib\Aes;
use app\common\model\AppUser;
use think\Session;

/**
 * description  app登录
 * Class Login
 * @package app\api\controller\v1
 */
class Login extends Common
{
    public function save ()
    {
        if (!request() -> isPost()) {
            return show(config('code.error'), '您没有权限', [], 403);
        }
        $param = input('param.');
        //判断手机号是否存在
        if (empty($param['phone'])) {
            return show(config('code.error'), '手机号码不合法', [], 404);
        }
        //判断短信验证码是否存在
        //客户端加密验证码
        //$param['code'] = (new Aes()) -> decrypt($param['code']);//解密
        if (empty($param['code']) && empty($param['password'])) {
            return show(config('code.error'), '手机短信验证码或密码不合法', [], 404);
        }
        //获取缓存中的验证码
        if (!empty($param['code'])) {
            $code = Yuntongxun ::checkTemplateSMS($param['phone']);

            if ($code[0] != $param['code']) {
                return show(config('code.error'), '手机短信验证码错误', [], 404);
            }
        }

        //第一次登录注册
        $user = AppUser ::get([ 'phone' => $param['phone'] ]);
        if ($user && $user -> status == 1) {
            //手机号码加密码登录
            if (!empty($param['password'])) {
                //判定用户的密码和加密之后对比
                if (IAuth ::setPassword($param['password']) != $user -> password) {
                    return show(config('code.error'), '密码不正确', [], 403);
                }
            }
            $data['token'] = IAuth ::setAppLoginToken($param['phone']);
            $data['time_out'] = strtotime("+" . config('app.login_time_out_day') . "days");
            $id = model('AppUser') -> save($data, [ 'phone' => $param['phone'] ]);
            $updateData = AppUser ::get([ 'phone' => $param['phone'] ]);
            if ($id) {
                return show(config('code.success'), '登录成功', $updateData, 200);
            } else {
                return show(config('code.error'), '登录失败', [], 403);
            }

        } else {
            //第一次验证码登录
            if (!empty($param['code'])) {
                $data['username'] = "用户" . $param['phone'];
                $data['phone'] = $param['phone'];
                $data['status'] = 1;
                $data['create_time'] = date('Y-m-d H:i:s', time());
                $data['token'] = IAuth ::setAppLoginToken($param['phone']);
                $data['time_out'] = strtotime("+" . config('app.login_time_out_day') . "days");
                $id = model('AppUser') -> add($data);
                $res = [
                    'id' => $id,
                    'username' => $data['username'],
                    'phone' => $data['phone'],
                    'token' => $data['token'],
                    'time_out' => $data['time_out'],
                    'status' => 1,
                    'create_time' => $data['create_time'],

                ];
                if ($id) {
                    return show(config('code.success'), '登录成功', $res, 200);
                } else {
                    return show(config('code.error'), '登录失败', [], 403);
                }
            } else {
                return show(config('code.error'), '用户不存在', [], 404);
            }
        }
    }
}