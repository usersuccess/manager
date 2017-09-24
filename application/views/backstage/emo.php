<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 9:27
 * 添加员工信息页面
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
    <div class="row" >
        <div class="col-xs-2 " >
            <div class="list-group" >
                <a href="<?php echo site_url('backstage/admin/home')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-menu-hamburger" style="margin-left:10px"></span>&nbsp;&nbsp;首页</a>
                <a href="<?php echo site_url('backstage/edu/show')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-pencil" style="margin-left:10px"></span>&nbsp;&nbsp;学历信息</a>
                <a href="<?php echo site_url('backstage/dep/show')?>"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-comment" style="margin-left:10px"></span>&nbsp;&nbsp;部门信息</a>
                <a href="<?php echo site_url('backstage/emo/showEmo')?>"  class="list-group-item" style="height:50px;">
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
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li role="presentation"  ><a href="../emo/showEmo">员工信息</a></li>
                        <li role="presentation"  ><a href="../emo/time" >上下班时间管理</a></li>
                        <li role="presentation" class="active"><a href="../emo/add" >添加员工</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <?php echo form_open('backstage/emo/add_post')?>
                        <div class="form-group" >
                            <label class="control-label">工号</label>
                            <?php $class='class="form-control" style="width:250px"  autocomplete="off" required oninvalid="setCustomValidity(\'不能为空\')" oninput="setCustomValidity(\'\')"'?>
                            <?php echo form_input('empno','',$class)?>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">姓名</label>
                            <?php $class='class="form-control" style="width:250px"  autocomplete="off" required oninvalid="setCustomValidity(\'不能为空\')" oninput="setCustomValidity(\'\')"'?>
                            <?php echo form_input('name','',$class)?>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">性别</label>
                            <?php $sex=array('男'=>'男','女'=>'女');?>
                            <?php echo form_dropdown('sex',$sex,'',['class'=>'form-control','style'=>'width:250px'])?>
                        </div>
                        <div class="form-inline" >
                            <label class="control-label">出生年月</label><br>
                            <?php
                            $year = array();
                            $month = array();
                            for($i=1950;$i<=$time;$i++){
                                $year[$i] = $i;
                            }
                            for($i=1;$i<=12;$i++){
                                $month[$i] = $i;
                            }
                            ?>
                            <?php echo form_dropdown('year',$year,'',['class'=>'form-control','style'=>'width:125px'])?>
                            <?php echo form_dropdown('month',$month,'',['class'=>'form-control','style'=>'width:125px'])?>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">职位</label>
                                <?php foreach($data as $a){
                                $id = $a['id'];
                                $name1[$id] = $a['name'];
                                }?>
                                <?php echo form_dropdown('pos',$name1,'',['class'=>'form-control','style'=>'width:250px'])?>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">学历</label>
                                <?php foreach($arr as $b){
                                    $id = $b['id'];
                                    $name2[$id] = $b['name'];
                                }?>
                                <?php echo form_dropdown('edu',$name2,'',['class'=>'form-control','style'=>'width:250px'])?>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">部门</label>
                            <?php foreach($dep as $c){
                                $id = $c['id'];
                                $name3[$id] = $c['name'];
                            }?>
                            <?php echo form_dropdown('dep',$name3,'',['class'=>'form-control','style'=>'width:250px'])?>
                        </div>
                        <div class="form-group" >
                            <label class="control-label">联系电话</label>
                            <?php $class='class="form-control" style="width:250px"  autocomplete="off" required oninvalid="setCustomValidity(\'不能为空\')" oninput="setCustomValidity(\'\')"'?>
                            <?php echo form_input('tel','',$class)?>
                        </div>
                        <div class="form-group">
                            <?php echo form_submit('submit','添加',['class'=>'btn btn-info form-control','style'=>'width:250px'])?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>