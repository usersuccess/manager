<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 8:53
 */
class Edu_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function readEdu(){//查看学历
        $data = $this->db->get('edu');
        return $data->result_array();
    }
    public function addEdu($arr){//添加学历
        return $this->db->insert('edu',$arr);
    }
    public function updateEdu($arr=array()){//修改学历
        //echo $this->session->id;
        return $this->db->update('edu',$arr,array('id'=>$this->session->id));
    }
    public function deleteEdu($id){//删除学历
        return $this->db->delete('edu',array('id'=>$id));
    }
    public function getTotalRow(){
        return $this->db->count_all('edu');
    }
    public function find($id){
        $data = $this->db->where('id',$id)->get('edu');
        return $data->row_array();
    }
    public function arr(){
        $res = $this->db->get('edu');
        $arr = $res->result_array();
        $a = array();
        foreach($arr as $v){
            $a[$v['id']] = $v['name'];
        }
        return $a;
    }
}