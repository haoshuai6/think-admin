<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

\think\Route::get('captcha/[:id]', "\\think\\captcha\\CaptchaController@index");

\think\Validate::extend('captcha', function ($value, $id = "") {
    return captcha_check($value, $id, (array)\think\Config::get('captcha'));
});

\think\Validate::setTypeMsg('captcha', '验证码错误!');


/**
 * @param string $id
 * @param array  $config
 * @return \think\Response
 */
function captcha($id = "", $config = [])
{
    $captcha = new \think\captcha\Captcha($config);
    return $captcha->entry($id);
}


/**
 * @param $id
 * @return string
 */
function captcha_src($id = "")
{
    return \think\Url::build('/captcha' . ($id ? "/{$id}" : ''));
}


/**
 * @param $id
 * @return mixed
 * @update：20161104>haoshuai_it> 点击更换验证码
 */
function captcha_img($id = "")
{
    /*return '<img src="' . captcha_src($id) . '" alt="captcha" />';*/
    return '<img src="' . captcha_src($id) . '" alt="点击更换" onclick="this.src=\''.captcha_src().'?id=\'+Math.random();" />';
}


/**
 * @param        $value
 * @param string $id
 * @param array  $config
 * @return bool
 */
function captcha_check($value, $id = "", $config = [])
{
    $captcha = new \think\captcha\Captcha($config);
    return $captcha->check($value, $id);
}

