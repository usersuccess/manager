<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 16:41
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>员工考勤管理</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>public/bootstrap/js/bootstrap.js"></script>
    <style type="text/css">
        body{background-color: #eee;}
    </style>

        <SCRIPT LANGUAGE=javascript>  function del() {   var msg = "您真的确定要下班吗？\n\n请确认！";   if (confirm(msg)==true){    return true;   }else{    return false;   }  }  </SCRIPT>


</head>
<body>
<div style="background:#eee;width:1000px;text-align: center;margin:10px auto;" >
    <div style="align:center;color:#eea236"><h1>欢迎登陆考勤管理系统</h1></div>
</div>
<div class="container" style="width:1000px;margin:10px auto;">
    <div class="row" >
        <div class="col-xs-2 " >
            <div class="list-group" >
                <a href="../att/att"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-cog" style="margin-left:10px"></span>&nbsp;&nbsp;考勤</a>
                <a href="../set/show"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-cog" style="margin-left:10px"></span>&nbsp;&nbsp;设置</a>
                <a href="../logout/logout" class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-log-out" style="margin-left:10px"></span>&nbsp;&nbsp;退出系统</a>
            </div>
        </div>
        <div class="col-xs-10">
            <div class="panel panel-default">
                <h2>员工签到</h2>
                欢迎<?php echo $_SESSION['name']?>，点击<a href="../att/sign"class="btn btn-success"id="sign"onclick=" return sign()">签到</a>
                <a href="../att/puched"class="btn btn-danger"id="puched" onclick=" return del();">下班<a>
                        <a href="../att/show"class="btn btn-default">我的考勤</a>
            </div>

        </div>
    </div>
</div>
</body>
</html>