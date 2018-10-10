<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/7/7
 * Time: 14:35
 */

namespace app\api\controller;

use think\Image as Mage;
use app\common\lib\exception\ApiException;
use app\common\lib\Imgcompress;

/**
 * description   上传图片
 * Class Image
 * @package app\api\controller\v1
 */
class Image
{
    public function save ()
    {
        if (!request() -> isPost()) {
            return show(config('code.error'), '您没有权限', [], 403);
        }
        $file = request() -> file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if (!empty($file)) {
            $info = $file -> move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {
                $imgUrl = $info -> getSaveName();
                $absoluteUrl = config('app.host') . config('app.img_url') . 'uploads' . "/" . $imgUrl;//绝对路径
                $relativelyUrl = 'uploads' . "/" . $imgUrl;//相对路径
                //调用python生成缩略图，只改变图片质量，不改变图片尺寸
                $date = substr($imgUrl, 0, 8);//日期文件夹名称
                $path = ROOT_PATH . 'public' . DS . 'uploads/' . $date;//当前图片文件夹
                $imgPath = substr($imgUrl, 9);//原图名称
                $thumbImg = getThumbImg(ROOT_PATH, $path, $imgPath);
                if(!$thumbImg == 0){
                    return show(config('code.error'), '缩略图生成失败', [], 404);
                }
                $data = [
                    'absoluteUrl' => $absoluteUrl,
                    'relativelyUrl' => $relativelyUrl
                ];
                return show(config('code.success'), '上传成功', $data, 201);
            } else {
                // 上传失败获取错误信息
                //echo $file->getError();
                return show(config('code.error'), $file -> getError(), [], 403);
            }
        }
    }
}