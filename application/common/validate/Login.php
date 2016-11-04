<?php
namespace app\common\validate;

use think\Validate;

class Login extends Validate
{
    protected $rule =   [
        'username'  => 'require|max:25',
        'password'     => 'require',
        'captcha|验证码'     => 'require|captcha',

    ];

    protected $message  =   [
        'username.require' => '名称必须',
        'username.max'     => '名称最多不能超过25个字符',

    ];


}