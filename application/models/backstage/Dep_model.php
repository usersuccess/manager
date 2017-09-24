<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/17
 * Time: 7:53
 */
class Dep_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function readDep(){//查看学历
        $data = $this->db->get('dep');
        return $data->result_array();
    }
    public function addDep($arr){//添加学历
        return $this->db->insert('dep',$arr);
    }
    public function updateDep($arr=array()){//修改学历
        //echo $this->session->id;
        return $this->db->update('dep',$arr,array('id'=>$this->session->id));
    }
    public function deleteDep($id){//删除学历
        return $this->db->delete('dep',array('id'=>$id));
    }
    public function getTotalRow(){
        return $this->db->count_all('dep');
    }
    public function find($id){
        $data = $this->db->where('id',$id)->get('dep');
        return $data->row_array();
    }
    public function arr(){
        $res = $this->db->get('dep');
        $arr = $res->result_array();
        $a = array();
        foreach($arr as $v){
            $a[$v['id']] = $v['name'];
        }
        return $a;
    }
}