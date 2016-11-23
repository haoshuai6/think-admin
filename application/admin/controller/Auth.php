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
        $group_id =  Request::instance()->param('g_id/d');
        if (!$group_id) {
            return ajax_return_error("缺少必要参数");
        }
        if (Request::instance()->isPost()) {
            $rule_ids = Request::instance()->post('rule_ids');
            $group_res = Db::name("auth_group")->where(array('id'=>$group_id))
                ->setField('rules', trim($rule_ids));
            if($group_res){ //修改成功
                return ajax_return_adv("权限分配成功", '');
            }else {
                return ajax_return_adv("权限分配失败", '');
            }
        } else {
            /*渲染zTree的json数据*/
            $group_rule = Db::name("auth_group")->where(array('id'=>$group_id))->find();
            /*已经勾选的规则*/
            $tree_data['tree_json_already'] = '';
            if($group_rule['rules']){
                $rule_sel_array['status'] = 1;
                $rule_sel_array['id'] = array('in',$group_rule['rules']);
                $rule_ids_info =  Db::name("auth_rule")->where($rule_sel_array)->select();
               
                $zNodes_sel_ids = '';
                foreach ($rule_ids_info as $k => $v){
                    $zNodes_sel_ids .= $v['id'].',';
                }
                $zNodes_sel_ids =  rtrim($zNodes_sel_ids, ',');
                
                //dump(json_encode($zNodes));
                $tree_data['tree_json_already'] = trim($zNodes_sel_ids);
            }
            
            /*全部的rule规则*/
            $rule_all =  Db::name("auth_rule")->where(array('status'=>1))->select();
            foreach ($rule_all as $k => $v_all){
                $zNodes[$k]['id'] =  $v_all['id'];
                $zNodes[$k]['pId'] =  0;
                $zNodes[$k]['name'] = $v_all['title'];
                $zNodes[$k]['open'] = "true";
            }
            $tree_data['tree_json'] = trim(json_encode($zNodes));

            $tree_data['rule_all'] = $rule_all;
            $this->view->assign('tree_data', $tree_data);
            return $this->view->fetch();
        }
    }
    public function access_table(){
        $group_id =  Request::instance()->param('g_id/d');
        if (!$group_id) {
            return ajax_return_error("缺少必要参数");
        }
        if (Request::instance()->isPost()) {
            
        }else{
            $group_rule = Db::name("auth_group")->where(array('id'=>$group_id))->find();

            /*全部的rule规则*/
            $rule_all =  Db::name("auth_rule")->where(array('status'=>1))->select();
            
            $table_data['rule_all'] = $rule_all;
            $table_data['group_rule'] = $group_rule;

            $this->view->assign('table_data', $table_data);
            return $this->view->fetch();
        }
    }
    public function  access_user(){
        $group_id =  Request::instance()->param('g_id/d');
        if (!$group_id) {
            return ajax_return_error("缺少必要参数");
        }

        $group_users = Db::name("member")->where(array('id'=>$group_id))->find();

        $table_data['rule_all'] = $rule_all;
        $table_data['group_rule'] = $group_rule;

        $this->view->assign('table_data', $table_data);
        return $this->view->fetch();
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
