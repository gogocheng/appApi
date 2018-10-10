<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/7/3
 * Time: 15:47
 */

namespace app\common\lib;

use app\common\validate\Farm;
/**
 * description  数据添加，删除通用类
 * Class Action
 * @package app\common\lib
 */
class Action
{
    /**
     * description   添加数据
     * @param array $data   post传值
     * @param string $model   模型实例
     * @return \think\response\Json
     */
    public static function saveAction($data = [],$model,$string)
    {
        //validate验证
        $validate = validate($string);
        if (!$validate -> check($data)) {
            return show(config('code.error'), $validate -> getError(), [], 403);
        }
        //添加
        try {
            $id = $model -> add($data);
            if ($id) {
                return show(config('code.success'), '添加成功', $data, 200);
            } else {
                return show(config('code.error'), '添加失败', [], 404);
            }
        } catch (\Exception $e) {
            return show(config('code.error'), $e -> getMessage(), '', 500);
        }
    }



}