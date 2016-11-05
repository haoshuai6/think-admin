<?php
namespace app\admin\controller;
use app\admin\AdminBaseController;
use think\Db;

class Auth extends AdminBaseController
{

    public function  admin_group(){
        $groups = Db::name("auth_group")->order("id asc")->select();
        $groups_count = Db::name("auth_group")->count();
        $groups_data['groups'] = $groups ;
        $groups_data['groups_count'] = $groups_count ;

        $this->view->assign('groups_data', $groups_data);
        return $this->view->fetch();
    }
}
