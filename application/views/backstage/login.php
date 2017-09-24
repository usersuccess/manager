<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/13
 * Time: 10:43
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>public/bootstrap/js/bootstrap.js"></script>
    <title>管理员登陆</title>
</head>
<body>
<div style="margin:100px auto;width:300px;"class="panel panel-default">
    <div class="panel-heading">后台管理登录<a href="<?php echo base_url('reception/admin/login');?>"style="float: right">员工登录</a></div>
    <div class="panel-body">
        <?php echo form_open('backstage/admin/login_check')//表示由doadd方法接收表单数据?>
        <div class="input-group input-group-sm">
            <label class="glyphicon glyphicon-user input-group-addon" style="top:0px"></label>
            <?php echo form_input('name','',['class'=>'form-control'])?>
        </div>
        <br>
        <div class="input-group input-group-sm">
            <label class="glyphicon glyphicon-lock input-group-addon" style="top:0px"></label>
            <?php echo form_password('pwd','',['class'=>'form-control'])?>
        </div>
        <br>
        <div class="form-group">
            <?php echo form_submit('submit','登录',['class'=>'btn btn-info btn-sm form-control '])?>
        </div>
        <div class="form-group">
            <?php echo validation_errors();//显示验证错误信息?>
        </div>
    </div>
</div>
</body>
</html>