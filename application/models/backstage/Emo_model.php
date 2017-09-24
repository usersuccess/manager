<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 9:27
 */
class Emo_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function readEmo(){//查看学历
        $data = $this->db->get('emo');
        return $data->result_array();
    }
    public function addEmo($arr=array()){//添加学历
        return $this->db->insert('emo',$arr);
    }
    public function updateEmo($arr=array()){//修改学历
        //echo $this->session->id;
        return $this->db->update('emo',$arr,array('id'=>$this->session->id));
    }
    public function deleteEmo($id){//删除学历
        return $this->db->delete('emo',array('id'=>$id));
    }
    public function find($id){
        $data = $this->db->where('id',$id)->get('emo');
        return $data->row_array();
    }
    public function findDep(){//查找部门，学历，职位
        $data = $this->db->get('dep');
        return $data->result_array();
    }
    public function findPos(){//查找部门，学历，职位
        $data = $this->db->get('pos');
        return $data->result_array();
    }
    public function findEdu(){//查找部门，学历，职位
        $data = $this->db->get('edu');
        return $data->result_array();
    }
    public function add(){ //添加员工
        $empno = $_POST['empno'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $birth = $year."-".$month;
        $pos = $_POST['pos'];
        $edu = $_POST['edu'];
        $dep = $_POST['dep'];
        $tel = $_POST['tel'];
        $data = array('empno'=>$empno,'name'=>$name,'sex'=>$sex,'birth'=>$birth,'pos'=>$pos,'edu'=>$edu,'dep'=>$dep,'tel'=>$tel);
        $this->db->insert('emo',$data);
    }
}
