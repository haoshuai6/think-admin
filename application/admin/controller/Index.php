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
        //$groups = Db::name("AdminGroup")->where(['id' => ['in', $groups_id], 'status' => "1"])->order("sort asc,id asc")->field('id,name,icon')->select();
        //$this->view->assign('groups', $groups);
        //$this->view->assign('menu', $menu);
        return $this->view->fetch();
    }
    public function welcome(){
        return $this->view->fetch();
    }
}
