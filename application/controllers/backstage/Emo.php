<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 9:27
 */
class Emo extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backstage/Emo_model','emo');
        $this->load->model('backstage/Pos_model','pos');
        $this->load->model('backstage/Edu_model','edu');
        $this->load->model('backstage/Dep_model','dep');
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');//开启表单验证
    }
    public function showEmo(){//查看员工信息
        $data = $this->emo->readEmo();
        $pos = $this->pos->arr();
        $edu = $this->edu->arr();
        $dep = $this->dep->arr();
        $this->load->vars('edu',$edu);
        $this->load->vars('dep',$dep);
        $this->load->vars('pos',$pos);
        $this->load->vars('data',$data);
        $this->load->view('backstage/emo_read.php');
    }
    public function update(){//显示修改页面
        $id = $this->uri->segment(4);
        $data = $this->emo->find($id);
        $date = strtotime($data['birth']);
        $year = date('Y',$date);
        $month = date('m',$date);
        $time = date('Y',time());
        $dep = $this->emo->findDep();
        $edu = $this->emo->findEdu();
        $pos = $this->emo->findPos();
        $this->session->set_userdata('id',$data['id']);
        //var_dump($data);
        $this->load->vars('time',$time);
        $this->load->vars('year',$year);
        $this->load->vars('month',$month);
        $this->load->vars('dep',$dep);
        $this->load->vars('edu',$edu);
        $this->load->vars('pos',$pos);
        $this->load->vars('data',$data);
        $this->load->view('backstage/emo_update');
    }
    public function doupdate(){//修改
        $this->valid->set_rules('empno','工号','required',array('required'=>'%s不能为空!'));
        $this->valid->set_rules('name','员工姓名','required',array('required'=>'%s不能为空!'));
        $this->valid->set_rules('sex','性别','required',array('required'=>'%s不能为空!'));
        $this->valid->set_rules('pos','职位','required',array('required'=>'%s不能为空!'));
        $this->valid->set_rules('edu','学历','required',array('required'=>'%s不能为空!'));
        $this->valid->set_rules('dep','部门','required',array('required'=>'%s不能为空!'));
        $this->valid->set_rules('tel','联系电话','required',array('required'=>'%s不能为空!'));
        if($this->valid->run()){
            $data['empno'] = $this->input->post('empno');
            $data['name'] = $this->input->post('name');
            $data['sex'] = $this->input->post('sex');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $data['birth'] = $year."-"."$month";
            $data['pos'] = $this->input->post('pos');
            $data['edu'] = $this->input->post('edu');
            $data['dep'] = $this->input->post('dep');
            $data['tel'] = $this->input->post('tel');

            $result = $this->emo->updateEmo($data);
            //var_dump($result);
            if($result){
                echo "<script>alert('修改成功!');location.href='./showEmo';</script>";
            }
        }
    }
    public function del(){
        $id = $this->uri->segment(4);
        $this->emo->deleteEmo($id);
        redirect('backstage/emo/showEmo');
    }
    public function add(){
        $time = date('Y',time());
        $data = $this->pos->readPos();
        $arr = $this->edu->readedu();
        $dep = $this->dep->readdep();
        $this->load->vars('time',$time);
        $this->load->vars('dep',$dep);
        $this->load->vars('arr',$arr);
        $this->load->vars('data',$data);
        $this->load->view('backstage/emo');
    }
    public function add_post(){
        $this->emo->add();
        redirect('backstage/emo/showEmo');
    }
    public function time(){
        $data = $this->pos->readPos();
        $this->load->vars('data',$data);
        $this->load->view('backstage/time');
    }
    public function save_time(){
        $this->pos->save();
        redirect('backstage/emo/showEmo');
    }
}