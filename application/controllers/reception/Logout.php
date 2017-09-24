<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/15
 * Time: 15:05
 */
class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function logout()
    {
        if (isset($_SESSION['name'])) {
            session_destroy();
            setcookie(session_name(), '', 1, '/');
            echo "<script>alert('退出登录成功');location.href='../admin/login'</script>";
        }
    }
}