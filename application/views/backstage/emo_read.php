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
    <script>
        function checkDel(id){
            if(window.confirm("确认删除吗?")){
                window.location='../emo/del/'+id;
            }else{
                window.location='../emo/showEmo';
            }
        }
    </script>
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
                        <li role="presentation" class="active"><a href="../emo/showEmo">员工信息</a></li>
                        <li role="presentation"><a href="../emo/time">上下班时间管理</a></li>
                        <li role="presentation"><a href="../emo/add">添加员工</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr class="row">
                            <td>工号</td><td>姓名</td><td>性别</td><td>出生年月</td><td>职位</td><td>学历</td><td>部门</td><td>联系电话</td><td>编辑</td>
                        </tr>
                        <?php foreach($data as $v):?>
                            <?php if(empty($edu[$v['edu']])){//删除学历赋值空
                                $edu[$v['edu']]=null;
                            }?>
                            <?php if(empty($pos[$v['pos']])){
                                $pos[$v['pos']]=null;
                            }?>
                            <?php if(empty($dep[$v['dep']])){
                                $dep[$v['dep']]=null;
                            }?>
                            <tr class="row">
                                <td><?php echo $v['empno']?></td><td><?php echo $v['name']?></td><td><?php echo $v['sex'] ?></td><td><?php echo $v['birth'] ?></td><td><?php echo $pos[$v['pos']] ?></td><td><?php echo $edu[$v['edu']] ?></td><td><?php echo $dep[$v['dep']] ?></td><td><?php echo $v['tel'] ?></td><td><button onclick="checkDel(<?php echo $v['id'] ?>)" class="btn btn-default btn-xs">删除</button>&nbsp;<a href="<?php echo site_url('backstage/emo/update/'.$v['id']);?>" class="btn btn-default btn-xs">修改</a></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>