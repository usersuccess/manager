
<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/16
 * Time: 11:02
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>public/bootstrap/js/bootstrap.js"></script>
    <title>员工登录</title>
</head>
<body>
<div style="width:300px;margin:100px auto;" class="panel panel-default">
    <div class="panel-heading"><b>员工登录</b><a href="../../backstage/admin/login"style="float: right">管理员登录</a></div>
    <div class="panel-body">
    <?php echo form_open('/reception/admin/login_check')//表示由doadd方法接收表单数据?>
    <div class=""input-group input-group-sm">
        <label class="control-label">员工工号</label>
        <?php echo form_input('empno','',['class'=>'form-control'])?>
    </div>
    <div class=""input-group input-group-sm">
        <label class="control-label">密码</label>
        <?php echo form_password('password','',['class'=>'form-control'])?>
    </div>
<br>
    <div class="form-group">
        <?php echo form_submit('submit','登陆',['class'=>'btn btn-info form-control'])?>
    </div>

    <div class="form-group">
        <?php echo validation_errors();//显示验证错误信息?>
    </div>
</div>
</body>
</html>