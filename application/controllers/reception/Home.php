<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 9:15
 */
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    public function show(){
        $this->load->view('reception/home');
    }
}