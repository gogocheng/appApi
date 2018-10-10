<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/7/3
 * Time: 15:37
 */


function deleteAction ($id,$model)
{
    //判断id
    if (empty($id)) {
        return show(config('code.error'), 'id不存在', '', 404);
    }
    //判断是否存在id对应的数据
    $res = $model -> get([ 'id' => $id ]);
    if (empty($res)) {
        return show(config('code.error'), 'id不合法，未找到相关数据', '', 404);
    }
    try {
        //$data   删除条件
        $data = [
            'status' => 0,
            'update_time' => time()
        ];
        $req = $model -> save($data, [ 'id' => $id ]);
        if ($req) {
            return show(config('code.success'), '删除成功', '', 200);
        } else {
            return show(config('code.error'), '删除失败', '', 404);
        }
    } catch (\Exception $e) {
        return show(config('code.error'), $e -> getMessage(), '', 500);
    }
}