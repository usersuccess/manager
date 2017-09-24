<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/17
 * Time: 8:11
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>员工考勤管理后台</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>public/bootstrap/js/bootstrap.js"></script>
    <style type="text/css">
        body{background-color: #eee;}
    </style>
</head>
<body>
<div style="background:#eee;width:1000px;text-align: center;margin:10px auto;" >
    <div style="align:center;color:#eea236"><h1>欢迎进入后台管理系统</h1></div>
</div>
<div class="container" style="width:1000px;margin:10px auto;">
    <div class="row">
        <div class="col-xs-2 " >
            <div class="list-group" >
                <a href="<?php echo site_url('backstage/admin/home')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-menu-hamburger" style="margin-left:10px"></span>&nbsp;&nbsp;首页</a>
                <a href="<?php echo site_url('backstage/edu/show')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-pencil" style="margin-left:10px"></span>&nbsp;&nbsp;学历信息</a>
                <a href="<?php echo site_url('backstage/dep/show')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-comment" style="margin-left:10px"></span>&nbsp;&nbsp;部门信息</a>
                <a href="<?php echo site_url('backstage/pos/show')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-heart" style="margin-left:10px"></span>&nbsp;&nbsp;职位信息</a>
                <a href="<?php echo site_url('backstage/emo/showEmo')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-heart" style="margin-left:10px"></span>&nbsp;&nbsp;员工信息</a>
                <a href="<?php echo site_url('backstage/att/user_att')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-cog" style="margin-left:10px"></span>&nbsp;&nbsp;考勤信息</a>
                <a href="<?php echo site_url('backstage/set/show')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-cog" style="margin-left:10px"></span>&nbsp;&nbsp;设置</a>
                <a href="<?php echo site_url('backstage/admin/logout')?>" class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-log-out" style="margin-left:10px"></span>&nbsp;&nbsp;退出系统</a>
            </div>
        </div>
        <div class="col-xs-10">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <span>修改职位信息</span>
                    <a href="">查看职位信息</a>
                </div>
                <div class="panel panel-body">
                    <?php echo form_open('backstage/pos/doupdate')//表示由doedit方法接收表单数据?>
                    <div class="form-group">
                        <label class="control-label">职位名称</label>
                        <?php echo form_input('name',$data['name'],['class'=>'form-inline'])?>
                        <?php echo form_submit('submit','保存',['class'=>'btn btn-primary btn-xs'])?>
                    </div>
                    <div class="form-group">
                        <?php echo validation_errors();//显示验证错误信息?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>