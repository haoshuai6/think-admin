<?php
namespace app\home;

use think\View;

/**
 * 基类Controller
 */
class HomeBaseController {
    /*
     * 初始化子类才使用这个方法
     */
    /*public function _initialize(){
        parent::_initialize();
    }*/


    /**
     * 构造方法
     */
    public function __construct(){
        $this->view = new View();
    }
}

