<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/17
 * Time: 8:11
 */
class Pos_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function readPos(){
        $data = $this->db->get('pos');
        return $data->result_array();
    }
    public function addPos($arr){
        return $this->db->insert('pos',$arr);
    }
    public function updatePos($arr,$id){
        //echo $this->session->id;
        return $this->db->update('pos',$arr,array('id'=>$id));
    }
    public function deletePos($id){
        return $this->db->delete('pos',array('id'=>$id));
    }
    public function getTotalRow(){
        return $this->db->count_all('pos');
    }
    public function find($id){
        $data = $this->db->where('id',$id)->get('pos');
        return $data->row_array();
    }
    public function select1($name){
        $id = $this->db->select('id')->from('pos')->where('name',$name)->get();
        $id=$id->row_array();
        $data=$this->db->from('emo')->where('pos',$id['id'])->get();
        return $data->result_array();
    }
    public function select2($name){
        $data=$this->db->from('emo')->where('name',$name)->get();
        return $data->row_array();
    }
    public function arr(){
        $res = $this->db->get('pos');
        $arr = $res->result_array();
        $a = array();
        foreach($arr as $v){
            $a[$v['id']] = $v['name'];
        }
        return $a;
    }
    public function save(){
        $res = $this->db->get('pos');
        $arr = $res->result_array();
        foreach($arr as $v){
            $start = $_POST[$v['id'].'start'];
            $end = $_POST[$v['id'].'end'];
            $data = array('start'=>$start,'end'=>$end);
            $this->db->update('pos',$data,array('id'=>$v['id']));
        }
    }
}