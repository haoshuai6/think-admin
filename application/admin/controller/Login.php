<?php
namespace app\admin\controller;

use think\Request;
use think\View;
use think\Config;
use think\Loader;
use \traits\controller\Jump;


/**
 *  用户登录、登出、验证码
 */
class Login
{
    public function __construct()
    {
        $this->view = View::instance(Config::get('template'), Config::get('view_replace_str'));
    }

    /**
     * 登入
     */
    public function login_in() {
        if(!Request::instance()->isPost()){ //无form提交,登录页面
            return $this->view->fetch();

        }else{
            $data = Request::instance()->post();
            $validate = Loader::validate('Login');
            if(!$validate->check($data)){
                return $this->error($validate->getError());

            }
        }


    }
    /**
     * 登出
     */
    public function login_out() {

    }
    /**
     * 检测用户登录
     */
    public function  checkUserLogin(){

    }
    /**
     * 验证码
    */
    public function  showVerify(){
            
    }
   

}

