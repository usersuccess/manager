<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/13
 * Time: 10:32
 * 管理员登陆控制器
 */
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('reception/Admin_model','admin');//加载登陆模型
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');//开启表单验证
    }
    public function login(){
        $this->load->view('reception/login.php');//.php可省略
    }
    public function login_check(){
        $this->valid->set_rules('empno','员工工号','required',array('required'=>'%s不能为空!'));
        $this->valid->set_rules('password','密码','required',array('required'=>'%s不能为空!'));
        if($this->valid->run()){
            $where['empno'] = $this->input->post('empno');
            $where['password'] = $this->input->post('password');
            $arr = $this->admin->login_check($where);
        if($arr){
            $_SESSION['empno'] = $arr['empno'];//用户员工号
            $_SESSION['name']=$arr['name'];//用户名
            $this->load->view('reception/home');
        }else{
            show_error('登录失败',500,'错误如下');
        }
        }else{
            $this->load->view('reception/login');
        }
    }
}