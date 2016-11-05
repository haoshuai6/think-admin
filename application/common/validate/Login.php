<?php
namespace app\common\validate;

use think\Validate;

class Login extends Validate
{
    protected $rule =   [
        'account'  => 'require|max:25',
        'password'     => 'require',
        'captcha|验证码'     => 'require|captcha',

    ];

    protected $message  =   [
        'account.require' => '名称必须',
        'account.max'     => '名称最多不能超过25个字符',
        'password.require'     => '密码必须',

    ];


}