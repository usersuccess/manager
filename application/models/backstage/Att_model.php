<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/17
 * Time: 15:07
 */
class Att_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function find(){//查询所有员工
       $data= $this->db->select('empno, name,id')->get('emo');
        return $data->result_array();

    }
    public function show($name,$empno){//通过empno查询员工的考勤
        $data=$this->db->where($name,$empno)->get('att');
        return $data->result_array();
    }
    public function findall(){//查询所有的签到
        $data=$this->db->get('att');
        return $data->result_array();
    }
    public function arr()
    {
        $res = $this->db->get('emo');
        $arr = $res->result_array();
        $a = array();
        foreach ($arr as $v) {
            $a[$v['empno']] = $v['name'];
        }

         return $a;

    }
}