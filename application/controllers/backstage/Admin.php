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
        $this->load->model('backstage/Admin_model','admin');//加载登陆模型
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');//开启表单验证
    }
    public function login(){
        $this->load->view('backstage/login.php');//.php可省略
    }
    public function login_check(){
        $this->valid->set_rules('name','用户名','required',array('required'=>'%s不能为空!'));
        $this->valid->set_rules('pwd','密码','required',array('required'=>'%s不能为空!'));
        if($this->valid->run()) {
            $where['user'] = $this->input->post('name');
            $where['pwd'] = $this->input->post('pwd');
            $data = $this->admin->find($where);
            if($data){
                $this->session->set_userdata('name',$data['user']);
                $this->session->set_userdata('flag','123');
                $this->load->view('backstage/home');
            }else{
                echo "<script>alert('用户名或者密码错误!');history.back();</script>";
            }
        }else{
            $this->load->view('backstage/login');
        }
    }
    public function home(){
        $this->load->view('backstage/home');
    }
    public function logout(){//用户注销(退出)
        if($this->session->has_userdata('name')){
            $this->session->unset_userdata('name');//unset($_SESSION['name'])；//一个
            $this->session->sess_destroy();//所有
            $this->load->view('backstage/login');
        }
    }
}