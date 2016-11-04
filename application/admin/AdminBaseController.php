<?php
namespace app\admin;

use \think\View;
use \Think\Config;

/**
* 后台基类Controller
*/
class AdminBaseController {
    /**
     * 构造方法
     */
    public function __construct(){
        $this->view = View::instance(Config::get('template'), Config::get('view_replace_str'));
        //or // $view = new View([],Config::get('view_replace_str'));
    }
    

}
