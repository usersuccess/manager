<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 16:50
 */
class Set extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reception/Set_model','set');
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');//开启表单验证
    }
    public function show(){
        /*echo $_SESSION['name'];
        die;*/
        $this->load->view('reception/set.php');
    }
    public function updatePwd()
    {
        //控制修改员工页面，然后将表单提交到updateEmo()方法
        $this->valid->set_rules('password', '密码', 'required', array('required' => '%s不能为空!'));
       if ($this->valid->run()){
           $where['password'] = $this->input->post('password');
             $data = $this->set->updatePwd_model($where);

        if ($data) {
            echo "<script>alert('修改密码成功!');location.href='./show';</script>";
        } else {
            echo "<script>alert('修改密码失败!');history.back();</script>";
        }
        }
        else{
        $this->load->view('reception/set');
    }
    }
}