<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/17
 * Time: 8:11
 */
class Pos extends CI_Controller{
    public  $need_check;//检测
    public function __construct(){
        parent::__construct();
        $this->need_check=true;
        $this->load->model('backstage/Pos_model','pos');
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
       /* $row = $this->pos->getTotalRow();
        if($row){*/
        $start1=array(6=>'6',7=>'7',8=>'8',9=>'9',10=>'10');
        $start2= array();
        for($i=0;$i<=60;$i++){
            $start2[$i] = $i;
        }
        $end1=array(20=>'20',19=>'19',18=>'18',17=>'17',16=>'16');
        $end2= array();
        for($j=0;$j<=60;$j++){
            $end2[$j] = $j;
        }
        $this->load->vars('start1',$start1);
        $this->load->vars('start2',$start2);
        $this->load->vars('end1',$end1);
        $this->load->vars('end2',$end2);

            $data = $this->pos->readPos();
            //var_dump($data);
            $this->load->vars('data',$data);
            $this->load->view('backstage/pos');
        /*}*/
    }
    public function update(){
       /* $id = $this->uri->segment(4);
        $data = $this->pos->find($id);
        //var_dump($data);
        $this->session->set_userdata('id',$data['id']);
        //var_dump($this->session->id);
        $this->load->vars('data',$data);
        $this->load->view('backstage/pos_update');*/
        $id=$_POST['id'];
        $start1=$_POST['start1'];
        $start2=$_POST['start2'];
        $end1=$_POST['end1'];
        $end2=$_POST['end2'];
        $start=$start1.":".$start2;
        $end=$end1.":".$end2;
        $arr=array('start'=>$start,'end'=>$end);
        $result=$this->pos->updatePos($arr,$id);
        if($result){
            echo "<script>alert('修改成功!');location.href='show';</script>";
        }else{
            echo "<script>alert('修改失败!');location.href='show';</script>";
        }
    }
    /*public function doupdate(){
        $this->valid->set_rules('name','部门名称','required',array('required'=>'%s不能为空!'));
        if($this->valid->run()){
            $name = $this->input->post('name');
            $arr = array('name'=>$name);
            $result = $this->pos->updatePos($arr);
            //var_dump($result);
            if($result){
                echo "<script>alert('修改成功!');location.href='./show';</script>";
            }
        }
    }*/
    public function del(){
        $id = $this->uri->segment(4);
        $result = $this->pos->deletePos($id);
        if($result){
            header("location:../show");
        }else{
            show_error('删除的数据不存在',500,'错误如下');
        }
    }
    public function add(){
        $this->valid->set_rules('name','部门名称','required|is_unique[pos.name]',array('required'=>'%s不能为空!','is_unique'=>'%s已存在'
));
        if($this->valid->run()) {
            /*$name = $this->input->post('name');
            $arr = array('name'=>$name);*/
            $start1=$_POST['start1'];
            $start2=$_POST['start2'];
            $start=$start1.":".$start2;
            $end1=$_POST['end1'];
            $end2=$_POST['end2'];
            $end=$end1.":".$end2;
            $arr = array('name' => $_POST['name'], 'start' => $start, 'end' => $end);
            $result = $this->pos->addPos($arr);
            //var_dump($result);
            if ($result) {
                echo "<script>alert('添加成功!');location.href='./show';</script>";
            } else {
                echo "<script>alert('添加失败!');location.href='show';</script>";
            }
        }else{
            $start1=array(6=>'6',7=>'7',8=>'8',9=>'9',10=>'10');
            $start2=array(6=>'6',7=>'7',8=>'8',9=>'9',10=>'10');

            $end1=array(20=>'20',19=>'19',18=>'18',17=>'17',16=>'16');
            $this->load->vars('start1',$start1);
            $this->load->vars('end1',$end1);
            $data = $this->pos->readPos();
            //var_dump($data);
            $this->load->vars('data',$data);
            $this->load->view('backstage/pos');
        }
    }
    public function select(){
        $this->load->view('backstage/pos_select');
    }
    public function doselect1(){
        $name1=$_POST['name1'];
        $data=$this->pos->select1($name1);
        if($data){
            $this->load->vars('pos1',$name1);
            $this->load->vars('data',$data);
            $this->load->view('backstage/pos_select');
        }else{
            echo "<script>alert('查询失败!');location.href='./select';</script>";
        }
    }
    public function doselect2(){
        $name2=$_POST['name2'];
        $data=$this->pos->select2($name2);
        if($data){
            $id=$data['pos'];
            $arr=$this->pos->find($id);
            $posname=$arr['name'];
            $this->load->vars('posname',$posname);
            $this->load->vars('data',$data);
            $this->load->view('backstage/pos_select');
        }else{
            echo "<script>alert('查询失败!');location.href='./select';</script>";
        }
    }
}