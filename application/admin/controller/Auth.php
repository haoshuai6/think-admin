<?php
namespace app\admin\controller;

use app\admin\AdminBaseController;
use think\Db;
use think\Request;
use think\Exception;

class Auth extends AdminBaseController
{
    /**
     * 用户组列表
    */
    public function  group_list(){
        $groups = Db::name("auth_group")->order("id asc")->select();
        $groups_count = Db::name("auth_group")->count();
        $groups_data['groups'] = $groups ;
        $groups_data['groups_count'] = $groups_count ;

        $this->view->assign('groups_data', $groups_data);
        return $this->view->fetch();
    }
    /**
     * 新增用户组
     */
    public function group_add(){
        return $this->view->fetch();
    }
    /**
     * 编辑用户组
     */
    public  function group_edit(){

        return $this->view->fetch();
    }
    /**
     * 删除用户组
     */
    public  function group_del(){

    }

    /**
     * 规则列表
     */
    public function  rule_list(){
        $rules = Db::name("auth_rule")->order("id asc")->select();
        $rules_count = Db::name("auth_rule")->count();
        $rules_data['rules'] = $rules;
        $rules_data['rules_count'] =  $rules_count;

        $this->view->assign('rules_data', $rules_data);
        return $this->view->fetch();
    }
    /**
     * 新增规则
     */
    public function  rule_add(){

    }
    /**
     * 编辑规则
     */
    public function  rule_edit(){
        
        return $this->view->fetch();
    }
    /**
     * 删除规则
     */
    public function  rule_del(){

    }

    /**
     * 用户列表
     */
    public function user_list(){
        $members = Db::name("member")->order("m_id asc")->select();
        $members_count = Db::name("member")->count();
        $members_data['members'] = $members ;
        $members_data['members_count'] = $members_count ;

        $this->view->assign('members_data', $members_data);
        return $this->view->fetch();
    }
    /**
     * 新增用户
     */
    public function user_add(){
         
    }
    /**
     * 编辑用户
     */
    public function user_edit(){
        return $this->view->fetch();
    }
    /**
     * 删除用户
     */
    public  function user_del(){

    }
    /**
     * 规则 树状图
    */
    public function  access_tree(){

        $role_id =  Request::instance()->param('id/d');
        if (Request::instance()->isPost()) {
            if (!$role_id) {
                return ajax_return_error("缺少必要参数");
            }
            return ajax_return_adv("权限分配成功", '');
        } else {
            /*if (!$role_id) {
                throw new Exception("缺少必要参数");
            }*/
           /* $this->view->assign("tree", json_encode($tree));*/
            return $this->view->fetch();
        }
    }
    /**
     * 生成权限树
     * @param $role_id
     * @return array
     */
    public function getAccessTree($role_id)
    {
        //分组信息
        //$groups = Db::name("auth_group")->order("id asc")->select();

    }
    
    


}
