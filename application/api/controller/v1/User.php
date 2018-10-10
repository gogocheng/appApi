<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/29
 * Time: 16:59
 */

namespace app\api\controller\v1;


use app\common\lib\Aes;
use app\common\lib\IAuth;

class User extends AuthBase
{
    /**
     * description 获取用户信息
     *    用户信息需要加密
     */
    public function read ()
    {
        //$obj = new Aes();
        return show(config('code.success'), 'ok', $this -> user);
    }
    /**

     * description 修改用户信息
    $postData = input('param.');
    $update_id = $postData['id'];
     */
    public function update ()
    {
        $postData = input('param.');
        $update_id = $postData['id'];
        $data = [];
        $data['update_time'] = date('Y-m-d H:i:s', time());
        if (!empty($postData['username'])) {
            $data['username'] = $postData['username'];
        }
        if (!empty($postData['password'])) {
            //密码加密
            $data['password'] = IAuth ::setPassword($postData['password']);
        }
        if (!empty($postData['phone'])) {
            $data['phone'] = $postData['phone'];
        }
        if (empty($data)) {
            return show(config('code.error'), '您提交的数据不合法', [], 404);
        }
//        $data['token'] = IAuth ::setAppLoginToken($data['phone']);
//        $data['time_out'] = strtotime("+" . config('app.login_time_out_day')."days");
        try {
            $id = model('AppUser') -> save($data, [ 'id' => $this -> user -> id ]);
            $userData = model('AppUser') -> get(['id' => $update_id]);
            if ($id) {
                return show(config('code.success'), '更新成功', $userData, 202);
            } else {
                return show(config('code.error'), '更新失败', [], 401);
            }
        } catch (\Exception $e) {
            return show(config('code.error'), $e -> getMessage(), [], 500);
        }
    }
}