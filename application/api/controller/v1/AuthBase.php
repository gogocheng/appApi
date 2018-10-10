<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/29
 * Time: 16:33
 */

namespace app\api\controller\v1;


use app\api\controller\Common;
use app\common\lib\exception\ApiException;
use app\common\lib\Aes;
use app\common\model\AppUser;

/**
 * description  APP客户端登录权限基础类库
 * 1    需要登录的接口必须继承此类库
 * 2    判断access_user_token是否合法
 * 3    用户信息 -> user
 * Class AuthBase
 * @package app\api\controller\v1
 */
class AuthBase extends Common
{
    /**
     * @var array 登录用户的基本信息
     */
    public $user = [];

    /**
     * description  初始化方法
     */
    public function _initialize ()
    {
        parent ::_initialize();
        if (!($this -> isLogin())) {
            throw new ApiException('当前登录已失效，请重新登录', 401);
        }
    }

    /**
     * description  判断是否登录
     * @return bool
     * @throws \think\exception\DbException
     */
    public function isLogin ()
    {
        //接受http头部信息
        $headers = request() -> header();
        //判断http头部token
        if (empty($headers['token'])) {
            return false;
        }
        //解密http头部token，与数据库中的token比对进行判断
//        $obj = new Aes();
//        $accessUserToken = $obj -> decrypt($headers['token']);
        //echo $accessUserToken;
        $user = AppUser ::get([ 'token' => $headers['token'] ]);
        if (!$user || $user -> status != 1) {
            return false;
        }
        //判断时间是否过期
        if (time() > $user -> time_out) {
            return false;
        }
        $this -> user = $user;
        return true;
    }


}