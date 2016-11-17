<?php
namespace app\admin\controller;

use think\Request;
use think\View;
use think\Config;
use think\Loader;
use think\Session;


/**
 *  用户登录、登出、验证码
 */
class Login
{
    public function __construct()
    {
        $this->view = View::instance(Config::get('template'), Config::get('view_replace_str'));

        /*有无登陆*/
        if (Session::has(Config::get('AUTH_SESSION_ADMIN'))) {
            $this->redirect('Admin/index');
        }else {
            /*弹窗提醒，表明原因*/

        }
        /*有无权限登陆*/
        if (Session::has(Config::get('AUTH_SESSION_ADMIN'))) {
            $this->redirect('Admin/index');
        }else {
            /*弹窗提醒，表明原因*/

        }
    }

    /**
     * 登入
     */
    public function login_in() {
        if(!Request::instance()->isPost()){ //无form提交,显示登录页面
            return $this->view->fetch();

        } else{
            $data = Request::instance()->post();
            $validate = Loader::validate('Login');
            if(!$validate->check($data)){
                return ajax_return_error($validate->getError());
            }
            $map['account'] = $data['account'];
            $map['status'] = 1;
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
}

