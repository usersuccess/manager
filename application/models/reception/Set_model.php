<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 16:51
 */
class Set_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function updatePwd_model($data){

        return $this->db->where('empno',$_SESSION['empno'])->update('emo',$data);

    }
}