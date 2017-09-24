<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 16:51
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
                <div class="panel panel-heading">
                    <label class="">修改密码</label>
                </div>
               <!-- <div class="panel panel-body">
                    <form action="./updatePwd" method="post" class="form">
                        用户名:<input type="text" name="name" value="<?php /*echo $_SESSION['name']*/?>" readonly="readonly" class="form-inline"autocomplete="off">
                        密码:<input type="password" name="password" class="form-inline">
                        <input type="submit" name="submit" value="保存" class="btn btn-xs btn-info"autocomplete="off">
                    </form>

                </div>-->
                <?php echo form_open('/reception/set/updatePwd')//表示由doadd方法接收表单数据?>
                <div class="form-group">
                    <label class="control-label">员工名</label>
                    <?php echo form_input('name',$_SESSION['name'],['class'=>'form-inline','readonly'=>"readonly"])?>
                    <label class="control-label">密码</label>
                    <?php echo form_password('password','',['class'=>'form-inline'])?>

                    <?php echo form_submit('submit','修改密码',['class'=>'btn  form-inline'])?>
                </div>
                <div class="form-group">
                    <?php echo validation_errors();//显示验证错误信息?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>