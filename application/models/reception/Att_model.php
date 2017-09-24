<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 20:25
 */
class Att_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function findpos($empno){//通过工号查询到emo表中的职位id
       $data= $this->db->select('pos')->where('empno',$empno)->get('emo');
        return $data->row_array();
    }
    public function find($id){//查询职位的开始结束时间
        $data=$this->db->where('id',$id)->get('pos');
        return $data->row_array();
    }
    public function check($data=array()){//验证是否签到
        $res=$this->db->select('empno,work_time,E_status')->where($data)->get('att');
        return $res;
    }
    public function sign_in($data){
        $this->db->insert('att', $data);
        return $this->db->insert_id();//返回提交的id
    }
    public function update($data,$work_time){
        $this->db->update('att',$data,array('empno'=>$_SESSION['empno'],'work_time'=>$work_time));
        return $this->db->affected_rows();//返回影响行数

    }
   /* public function sign_in()
    {//进行签到功能
        $t1 = strtotime(date('Y-m-d', time()));//取得当前日期的开始时间
        $t1 += 3600 * 9;//设置9点是上班时间
        //echo date('Y-m-d H:i:s',$t1);
        //echo"<br>";
        $t2 = time();//当前时间
        //echo date('Y-m-d H:i:s',$t2);
        $work_time = date('Y-m-d', time());//工作日期
        $data = array('empno' => $_SESSION['empno'],//进行是否签到的判断
            'work_time' => $work_time);
        $result = $this->db->select('empno,work_time')->from('att')->where($data)->get();
        if ($result->num_rows()) {
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
            $this->db->insert('att', $arr);
            return $this->db->insert_id();//返回提交的id

        }
    }*/

   /* public function puched_out(){//打卡下班功能
        $t1 = strtotime(date('Y-m-d', time()));//取得当前日期的开始时间
        $t1 += 3600 * 18;//设置下班时间是18点
        $t2 = time();//当前时间
        $work_time = date('Y-m-d', time());//工作日期
        $data = array('empno' => $_SESSION['empno'],//进行是否签到的判断
            'work_time' => $work_time);
        $result = $this->db->select('empno,work_time')->from('att')->where($data)->get();
        if(!$result->num_rows()){
            echo "<script>alert('你还没有签到请进行签到');history.back();</script>";
        }else{
            $end = $t2;//下班时间
            if($end<$t1){
                //echo"<script>confirm('是否确定');</script>";
                $e_status="早退";

            }else{
                $e_status='正常下班';
            }
            $end=date('H:i:s',$t2);//下班时间
            $arr=array('end'=>$end,'E_status'=>$e_status);
            $this->db->update('att',$arr,array('empno'=>$_SESSION['empno'],'work_time'=>$work_time));
            return $this->db->affected_rows();//返回影响行数
        }
    }*/
    public function show(){//显示考勤表
        $work_time = date('Y-m-d', time());
        $arr=array('empno'=>$_SESSION['empno'],'work_time'=>$work_time);
        $data=$this->db->select('empno,work_time,start,end,S_status,E_status')->where($arr)->get('att');
        return $data->row_array();
    }
}