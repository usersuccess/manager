<?php
/**
 * Created by PhpStorm.
 * User: 无名
 * Date: 2017/8/14
 * Time: 11:14
 * 查看员工信息页面
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
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li role="presentation" ><a href="../emo/showEmo">员工信息</a></li>
                        <li role="presentation" class="active"><a href="../emo/time">上下班时间管理</a></li>
                        <li role="presentation"><a href="../emo/add">添加员工</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <?php echo form_open('backstage/emo/save_time')?>
                        <table class="table">
                            <tr class="row">
                                <td>职位</td><td>上班时间</td><td>下班时间</td>
                            </tr>
                            <?php foreach($data as $v): ?>
                                <tr class="row">
                                    <td><?php echo $v['name']?></td>
                                    <td>
                                        <?php
                                        $start = array();
                                        for($i=6;$i<=12;$i++){
                                            $start[$i] = $i.'点';
                                        }
                                        ?>
                                        <?php echo form_dropdown($v['id'].'start',$start,$v['start'],['class'=>'form-control','style'=>'width:250px'])?>
                                    </td>
                                    <td>
                                        <?php
                                        $end = array();
                                        for($i=17;$i<=24;$i++){
                                            $end[$i] = $i.'点';
                                        }
                                        ?>
                                        <?php echo form_dropdown($v['id'].'end',$end,$v['end'],['class'=>'form-control','style'=>'width:250px'])?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php echo form_submit('submit','保存',['class'=>'btn btn-info form-control'])?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>