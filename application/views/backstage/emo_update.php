<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 13:33
 * 修改员工信息页面
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
                    <span>查看员工信息</span>
                </div>
                <div class="panel panel-body">
                    <div class="panel panel-body">
                        <?php echo form_open('backstage/emo/doupdate')//表示由doedit方法接收表单数据?>
                        <div class="form-group">
                            <label class="control-label">工号</label>
                            <?php echo form_input('empno',$data['empno'],['class'=>'form-control','readonly'=>"readonly",'style'=>'width:250px'])?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">员工姓名</label>
                            <?php echo form_input('name',$data['name'],['class'=>'form-control','readonly'=>"readonly",'style'=>'width:250px'])?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">性别</label>
                            <?php $sex=array('男'=>'男','女'=>'女');
                            $class = 'class="form-control" style="width:250px"';
                            ?>
                            <?php echo form_dropdown('sex',$sex,$data['sex'],$class)?>
                        </div>
                        <div class="form-inline">
                            <label class="control-label">出生年月</label><br>
                            <?php
                            $y = array();
                            $m = array();
                            for($i=1950;$i<=$time;$i++){
                                $y[$i] = $i;
                            }
                            for($i=1;$i<=12;$i++){
                                $m[$i] = $i;
                            }
                            ?>
                            <?php echo form_dropdown('year',$y,$year,['class'=>'form-control','style'=>'width:125px'])?>
                            <?php echo form_dropdown('month',$m,$month,['class'=>'form-control','style'=>'width:125px'])?>
                        </div>

                        <div class="form-group">
                            <label class="control-label">职位</label>
                            <?php
                            function arrA($pos){
                                foreach($pos as $v){
                                    $id = $v['id'];
                                    $name[$id] = $v['name'];
                                }
                                //var_dump($name);
                                return $name;
                            }
                            $arr1 = arrA($pos);
                            $class = 'class="form-control" style="width:250px"';
                            ?>
                            <?php echo form_dropdown('pos',$arr1,$data['pos'],$class)?>

                        </div>

                        <div class="form-group">
                            <label class="control-label">学历</label>
                            <?php
                            function arrB($edu){
                                foreach($edu as $v){
                                    $id = $v['id'];
                                    $name[$id] = $v['name'];
                                }
                                //var_dump($name);
                                return $name;
                            }
                            $arr2 = arrB($edu);
                            $class = 'class="form-control" style="width:250px"';
                            ?>
                            <?php echo form_dropdown('edu',$arr2,$data['edu'],$class)?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">部门名称</label>
                            <?php
                            function arrC($dep){
                                foreach($dep as $v){
                                    $id = $v['id'];
                                    $name[$id] = $v['name'];
                                }
                                return $name;
                            }
                            $arr3 = arrC($dep);
                            $class = 'class="form-control" style="width:250px"';
                            ?>
                            <?php echo form_dropdown('dep',$arr3,$data['dep'],$class)?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">联系电话</label>
                            <?php echo form_input('tel',$data['tel'],['class'=>'form-control','style'=>'width:250px'])?>
                        </div>
                        <div class="form-group">
                            <?php echo form_submit('submit','保存',['class'=>'btn btn-primary form-control'])?>
                        </div>
                        <div class="form-group">
                            <?php echo validation_errors();//显示验证错误信息?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>