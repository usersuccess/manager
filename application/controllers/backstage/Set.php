<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 16:50
 */
class Set extends CI_Controller{
    public  $need_check;//检测
    public function __construct()
    {
        parent::__construct();
        $this->need_check=true;
        $this->load->model('backstage/Set_model','set');
        $this->load->helper('url');
        $this->check_login();
    }
    public function check_login(){
        if($this->need_check){
            $checkData=$this->session->flag;
            if(!$checkData){
                redirect('backstage/admin/login');
            }
        }
    }
    public function show(){
        /*echo $_SESSION['name'];
        die;*/
        $this->load->view('backstage/set.php');
    }
    public function updatePwd(){//控制修改员工页面，然后将表单提交到updateEmo()方法
        $data = $this->set->updatePwd_model();
        if($data){
            echo "<script>alert('修改密码成功!');location.href='./show';</script>";
        }else{
            echo "<script>alert('修改密码失败!');history.back();</script>";
        }
    }
}