<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/17
 * Time: 15:06
 */
class Att extends CI_Controller{
    public  $need_check;//检测
    public function __construct()
    {
        parent::__construct();
        $this->need_check=true;
        $this->load->model('backstage/Att_model','att');//加载登陆模型
        $this->load->helper(array('url','form'));
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
    public function user_att(){//查询员工考勤
        $res=$this->att->find();
        $this->load->vars('data',$res);
        $this->load->view('backstage/att');
    }
    public function show(){//显示员工考勤信息
        $id = $this->uri->segment(4);//取得返回的工号值
        $res=$this->att->show('empno',$id);


            $this->load->vars('data', $res);
            $this->load->view('backstage/useratt');

    }
    public function showall(){
        $res=$this->att->findall();
        $att=$this->att->arr();
        $this->load->vars('att',$att);
        $this->load->vars('data',$res);
        $this->load->view('backstage/showall');
    }
    public function nowatt(){
        $now = date('Y-m-d', time());//现在的日期
        $res=$this->att->show('work_time',$now);
        $att=$this->att->arr();
        $this->load->vars('att',$att);
        $this->load->vars('data', $res);
        $this->load->view('backstage/showall');
    }
}