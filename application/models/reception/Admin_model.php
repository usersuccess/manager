<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/13
 * Time: 10:20
 * 管理员登陆
 */
class Admin_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function login_check($data=array()){
        $res = $this->db->where($data)->get('emo');
        return $res->row_array();

    }
}