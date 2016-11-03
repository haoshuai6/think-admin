<?php
namespace app\admin;

use \think\View;

/**
* 后台基类Controller
*/
class AdminBaseController {
    /**
     * 构造方法
     */
    public function __construct(){
        $this->view = new View();
    }
    

}
