<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 20:25
 */
class Att extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reception/Att_model','att');
        $this->load->helper(array('url','form'));
    }
    public function att(){
        $this->load->view('reception/att');
    }
    /*public function sign(){//签到页面
        $res=$this->att->sign_in();
        if($res){
            echo"<script>alert('签到成功请勿重新签到');history.back();</script>";
        }
    }*/
    /*public function puched(){//打卡下班
        $res=$this->att->puched_out();
        if($res){
            echo"<script>alert('下班打卡成功，走人');history.back();</script>";
        }

    }*/
    public function puched(){//打卡下班
        $t1 = strtotime(date('Y-m-d', time()));//取得当前日期的开始时间
        $h=$this->att->findpos($_SESSION['empno']);
        $e=$this->att->find($h['pos']);
        $e1=$e['end'];//取得结束时间
        $ee=explode(':',$e1);
        $t1+= (3600 * $ee[0] + 60 * $ee[1]);//设置下班时间是18点
        $t2 = time();//当前时间
        $work_time = date('Y-m-d', time());//工作日期
        $data = array('empno' => $_SESSION['empno'],//进行是否签到的判断
            'work_time' => $work_time);
        $check=$this->att->check($data);
        if(!$check->num_rows()){
            echo "<script>alert('你还没有签到请进行签到');history.back();</script>";
        }else {
            $sign=$check->row_array();
            if($sign['E_status']!='还未打卡下班'){
                echo "<script>alert('已经签离过了!');history.back();</script>";
            }else {
                $end = $t2;//下班时间
                if ($end < $t1) {
                    //echo"<script>confirm('是否确定');</script>";
                    $e_status = "早退";

                } else {
                    $e_status = '正常下班';
                }
                $end = date('H:i:s', $t2);//下班时间
                $arr = array('end' => $end, 'E_status' => $e_status);
                $res = $this->att->update($arr, $work_time);//取得改变的返回值
                if ($res) {
                    echo "<script>alert('下班打卡成功，走人');history.back();</script>";
                }
            }
        }

    }
    public function show(){//查看我的考勤
        $res=$this->att->show();
        $this->load->vars('data',$res);
        $this->load->view('reception/showatt');
    }
    public function sign(){
        $h=$this->att->findpos($_SESSION['empno']);
        $s=$this->att->find($h['pos']);
        $s1=$s['start'];//取得开始时间
        $ss=explode(':',$s1);
        $t1 = strtotime(date('Y-m-d', time()));//取得当前日期的开始时间
        $t1 += (3600 * $ss[0] + 60 * $ss[1]);//设置上班时间
        //echo date('Y-m-d H:i:s',$t1);die;
        //echo date('Y-m-d H:i:s',$t1);
        //echo"<br>";
        $t2 = time();//当前时间
        $work_time = date('Y-m-d', time());//工作日期
        $data = array('empno' => $_SESSION['empno'],//进行是否签到的判断
            'work_time' => $work_time);
        $check=$this->att->check($data);//
        if ($check->num_rows()) {
        echo "<script>alert('你已经签到了请勿重新签到');history.back();</script>";
    } else {
            $start = $t2;//上班时间
            if ($t1 > $t2) {//没有迟到
                $s_status = '正常上班';
            } else {
                $s_status = '迟到';
            }
            $start = date('H:i:s', $t2);//上班时间
            $arr = array('empno' => $_SESSION['empno'],
                'work_time' => $work_time,
                'start' => $start,
                'S_status' => $s_status);
            $res=$this->att->sign_in($arr);
            if($res){
                echo"<script>alert('签到成功请勿重新签到');history.back();</script>";
            }
    }
    }
}