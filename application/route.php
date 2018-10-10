<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//GET
Route::get('test','api/test/index');

Route::resource('test','api/test');
//短信验证码相关
Route::resource('api/:ver/identify', 'api/:ver.identify');
//登录
Route::post('api/:ver/login', 'api/:ver.login/save');
//用户
Route::resource('api/:ver/user', 'api/:ver.user');

//农场信息
Route::resource('api/:ver/farm', 'api/:ver.farm');
//农场信息删除
Route::delete('api/:ver/farm', 'api/:ver.farm/delete');
//农场信息分页列表
Route::get('api/:ver/farm', 'api/:ver.farm/lists');
//农场修剪管理
Route::resource('api/:ver/prune', 'api/:ver.prune');
//农场修剪管理删除
Route::delete('api/:ver/prune', 'api/:ver.prune/delete');
//农场修剪管理分页列表
Route::get('api/:ver/prune', 'api/:ver.prune/lists');
//病虫草害管理档案
Route::resource('api/:ver/pest', 'api/:ver.pest');
//病虫草害管理档案删除
Route::delete('api/:ver/pest', 'api/:ver.pest/delete');
//病虫草害管理档案分页列表
Route::get('api/:ver/pest', 'api/:ver.pest/lists');
//农药施用记录
Route::resource('api/:ver/pesticide', 'api/:ver.pesticide');
//农药施用记录删除
Route::delete('api/:ver/pesticide', 'api/:ver.pesticide/delete');
//农药施用记录分页列表
Route::get('api/:ver/pesticide', 'api/:ver.pesticide/lists');
//植保产品记录
Route::resource('api/:ver/plant', 'api/:ver.plant');
//植保产品记录删除
Route::delete('api/:ver/plant', 'api/:ver.plant/delete');
//植保产品记录分页列表
Route::get('api/:ver/plant', 'api/:ver.plant/lists');
//农资产品器械管理档案
Route::resource('api/:ver/instrument', 'api/:ver.instrument');
//农资产品器械管理档案删除
Route::delete('api/:ver/instrument', 'api/:ver.instrument/delete');
//农资产品器械管理档案分页列表
Route::get('api/:ver/instrument', 'api/:ver.instrument/lists');
//员工登记信息
Route::resource('api/:ver/employee', 'api/:ver.employee');
//员工登记信息删除
Route::delete('api/:ver/employee', 'api/:ver.employee/delete');
//员工登记信息分页列表
Route::get('api/:ver/employee', 'api/:ver.employee/lists');
//植保员工、仓管人员
Route::resource('api/:ver/operating', 'api/:ver.operating');
//植保员工、仓管人员删除
Route::delete('api/:ver/operating', 'api/:ver.operating/delete');
//植保员工、仓管人员删除
Route::get('api/:ver/operating', 'api/:ver.operating/lists');
//采收工人采收技能
Route::resource('api/:ver/skill', 'api/:ver.skill');
//采收工人采收技能删除
Route::delete('api/:ver/skill', 'api/:ver.skill/delete');
//采收工人采收技能分页列表
Route::get('api/:ver/skill', 'api/:ver.skill/lists');
//农技人员资质
Route::resource('api/:ver/qualification', 'api/:ver.qualification');
//农技人员资质删除
Route::delete('api/:ver/qualification', 'api/:ver.qualification/delete');
//农技人员资质分页列表
Route::get('api/:ver/qualification', 'api/:ver.qualification/lists');
//员工的住宿，饮食
Route::resource('api/:ver/protection', 'api/:ver.protection');
//员工的住宿，饮食删除
Route::delete('api/:ver/protection', 'api/:ver.protection/delete');
//员工的住宿，饮食删除分页列表
Route::get('api/:ver/protection', 'api/:ver.protection/lists');
//卫生管理执行落实情况记录
Route::resource('api/:ver/sanitation', 'api/:ver.sanitation');
//卫生管理执行落实情况记录删除
Route::delete('api/:ver/sanitation', 'api/:ver.sanitation/delete');
//卫生管理执行落实情况记录分页列表
Route::get('api/:ver/sanitation', 'api/:ver.sanitation/lists');
//农场的卫生管理制度公告
Route::resource('api/:ver/system', 'api/:ver.system');
//农场的卫生管理制度公告删除
Route::delete('api/:ver/system', 'api/:ver.system/delete');
//农场的卫生管理制度公告分页列表
Route::get('api/:ver/system', 'api/:ver.system/lists');
//处理应急事件的措施和设备
Route::resource('api/:ver/emergency', 'api/:ver.emergency');
//处理应急事件的措施和设备删除
Route::delete('api/:ver/emergency', 'api/:ver.emergency/delete');
//处理应急事件的措施和设备分页列表
Route::get('api/:ver/emergency', 'api/:ver.emergency/lists');
//专人负责员工的健康
Route::resource('api/:ver/health', 'api/:ver.health');
//专人负责员工的健康删除
Route::delete('api/:ver/health', 'api/:ver.health/delete');
//专人负责员工的健康分页列表
Route::get('api/:ver/health', 'api/:ver.health/lists');
//灌溉水记录
Route::resource('api/:ver/irrigation', 'api/:ver.irrigation');
//灌溉水记录删除
Route::delete('api/:ver/irrigation', 'api/:ver.irrigation/delete');
//灌溉水记录分页列表
Route::get('api/:ver/irrigation', 'api/:ver.irrigation/lists');
//肥料施用记录
Route::resource('api/:ver/manure', 'api/:ver.manure');
//肥料施用记录删除
Route::delete('api/:ver/manure', 'api/:ver.manure/delete');
//肥料施用记录分页列表
Route::get('api/:ver/manure', 'api/:ver.manure/lists');
//商品肥料记录
Route::resource('api/:ver/muck', 'api/:ver.muck');
//商品肥料记录删除
Route::delete('api/:ver/muck', 'api/:ver.muck/delete');
//商品肥料记录分页列表
Route::get('api/:ver/muck', 'api/:ver.muck/lists');
//自备有机肥的说明
Route::resource('api/:ver/instructions', 'api/:ver.instructions');
//自备有机肥的说明删除
Route::delete('api/:ver/instructions', 'api/:ver.instructions/delete');
//自备有机肥的说明分页列表
Route::get('api/:ver/instructions', 'api/:ver.instructions/lists');
//签到记录添加
Route::resource('api/:ver/sign', 'api/:ver.sign');
//签到记录分页列表
Route::get('api/:ver/sign', 'api/:ver.sign/lists');
//个人签到记录分页列表
Route::get('api/:ver/signlist', 'api/:ver.signlist/lists');
//图片上传
Route::post('api/image', 'api/image/save');
//地块表
Route::resource('api/:ver/field', 'api/:ver.field');
//地块删除
Route::delete('api/:ver/field', 'api/:ver.field/delete');
//地块分页列表
Route::get('api/:ver/field', 'api/:ver.field/lists');
//对应农场下所有地块
Route::get('api/:ver/fieldlist', 'api/:ver.fieldlist/lists');
//传感器与地块关系
Route::resource('api/:ver/sensorfield', 'api/:ver.sensorfield');
//传感器与地块关系删除
Route::delete('api/:ver/sensorfield', 'api/:ver.sensorfield/delete');
//传感器与地块关系分页列表
Route::get('api/:ver/sensorfield', 'api/:ver.sensorfield/lists');
//溯源码
Route::resource('api/:ver/source', 'api/:ver.source');
//溯源码删除
Route::delete('api/:ver/source', 'api/:ver.source/delete');
//溯源码分页列表
Route::get('api/:ver/source', 'api/:ver.source/lists');
//肥料施用溯源码追踪
//Route::resource('api/sourcemanure', 'api/sourcemanure');
//农药施用溯源码追踪
//Route::resource('api/sourcepesticide', 'api/sourcepesticide');
//农场修剪溯源码追踪
//Route::resource('api/sourceprune', 'api/sourceprune');
//商品表
Route::resource('api/:ver/commodity', 'api/:ver.commodity');
//商品表删除
Route::delete('api/:ver/commodity', 'api/:ver.commodity/delete');
//商品表分页列表
Route::get('api/:ver/commodity', 'api/:ver.commodity/lists');
//批次表
Route::resource('api/:ver/batch', 'api/:ver.batch');
//批次表删除
Route::delete('api/:ver/batch', 'api/:ver.batch/delete');
//批次表分页列表
Route::get('api/:ver/batch', 'api/:ver.batch/lists');
//对应地块下所有批次
Route::get('api/:ver/batchlist', 'api/:ver.batchlist/lists');
//根据id查询农技表数据
Route::resource('api/:ver/techlist', 'api/:ver.techlist');
//农技表添加
Route::resource('api/:ver/technology', 'api/:ver.technology');
//农技表删除
Route::delete('api/:ver/technology', 'api/:ver.technology/delete');
//农技表分页列表
Route::get('api/:ver/technology', 'api/:ver.technology/lists');
//根据id查询问题表数据
Route::resource('api/:ver/questionlist', 'api/:ver.questionlist');
//问题表添加
Route::resource('api/:ver/question', 'api/:ver.question');
//问题表删除
Route::delete('api/:ver/question', 'api/:ver.question/delete');
//问题表分页列表
Route::get('api/:ver/question', 'api/:ver.question/lists');
//根据id查询问题表数据
Route::resource('api/:ver/answerlist', 'api/:ver.answerlist');
//回答表添加
Route::resource('api/:ver/answer', 'api/:ver.answer');
//回答表删除
Route::delete('api/:ver/answer', 'api/:ver.answer/delete');
//回答表分页列表
Route::get('api/:ver/answer', 'api/:ver.answer/lists');
//根据溯源码查到地块
Route::resource('api/:ver/queryfield', 'api/:ver.queryfield');
//对应地块下的所有传感器
Route::get('api/:ver/sensorlist', 'api/:ver.sensorlist/lists');
//通过溯源码查找农药施用，肥料施用，农场修剪,传感器列表
Route::get('api/:ver/sourcelist', 'api/:ver.sourcelist/lists');
//根据传感器编号和起始时间查询传感器的数据
Route::resource('api/:ver/querysensor', 'api/:ver.querysensor');
//app首页轮播图
Route::resource('api/:ver/banner', 'api/:ver.banner');
//app首页轮播图列表
Route::get('api/:ver/banner', 'api/:ver.banner/lists');


//小程序轮播图添加
Route::resource('api/banner', 'api/banner');
//小程序轮播图列表
Route::get('api/banner', 'api/banner/lists');
//小程序溯源查询
Route::resource('api/source', 'api/source');
//小程序根据溯源码查询商品
Route::resource('api/commodity', 'api/commodity');
//小程序根据溯源码查询商品
Route::resource('api/batch', 'api/batch');
