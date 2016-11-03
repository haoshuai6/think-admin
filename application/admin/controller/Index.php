<?php
namespace app\admin\controller;

use app\admin\AdminBaseController;

class Index  extends AdminBaseController
{
    /*
     *  $this->view 在父类中已经实例化！
     * 子类不定义构造函数 __construct()，则父类的构造函数默认会被继承下来，且会自动执行*/


    public function index()
    {
        return $this->view->fetch();
    }



}
