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

    public function updatePwd_model(){
        if(isset($_POST['submit'])){
            $pwd = $_POST['password'];
        }
        $arr = array('pwd'=>$pwd);
        $data = $this->db->update('admin',$arr,array('user'=>$_SESSION['name']));
        if($data){
            return $this->db->affected_rows();
        }
    }
}