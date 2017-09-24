<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 8:50
 */
class Edu extends CI_Controller{
    public  $need_check;//检测
    public function __construct(){
        parent::__construct();
        $this->need_check=true;
        $this->load->model('backstage/Edu_model','edu');
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');//开启表单验证
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
        /*$row = $this->edu->getTotalRow();
        if($row){*/
            $data = $this->edu->readEdu();
            $this->load->vars('data',$data);
            $this->load->view('backstage/edu');
        }
    /*}*/
    public function update(){
        $id = $this->uri->segment(4);
        $data = $this->edu->find($id);
        //var_dump($data);
        $this->session->set_userdata('id',$data['id']);
        //var_dump($this->session->id);
        $this->load->vars('data',$data);
        $this->load->view('backstage/edu_update');
    }
    public function doupdate(){
        $this->valid->set_rules('name','学历名称','required',array('required'=>'%s不能为空!'));
        if($this->valid->run()){
            $name = $this->input->post('name');
            $arr = array('name'=>$name);
            $result = $this->edu->updateEdu($arr);
            //var_dump($result);
            if($result){
                echo "<script>alert('修改成功!');location.href='./show';</script>";
            }
        }
    }
    public function del(){
        $id = $this->uri->segment(4);
        $result = $this->edu->deleteEdu($id);
        if($result){
            header("location:../show");
        }else{
            show_error('删除的数据不存在',500,'错误如下');
        }
    }
    public function add(){
        $this->valid->set_rules('name','学历名称','required|is_unique[edu.name]',array('required'=>'%s不能为空!','is_unique'=>'%s已存在'));
        if($this->valid->run()){
            $name = $this->input->post('name');
            $arr = array('name'=>$name);
            $result = $this->edu->addEdu($arr);
            //var_dump($result);
            if($result){
                echo "<script>alert('添加成功!');location.href='./show';</script>";
            }
        }else{
            $data = $this->edu->readEdu();
            $this->load->vars('data',$data);
            $this->load->view('backstage/edu');
        }
    }
}