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

    <script>
        function prints(){
            if(window.confirm("是否打印？")){
                window.print();
            }else{
                return 0;
            }
        }
    </script>

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
                <div class="panel panel-body">
                    <table class="table" style="border:1px solid red;">
                        <tr class="row">
                            <th>员工工号</th><th>员工姓名</th><th>工作时间</th><th>上班时间</th><th>下班时间</th><th>上班状态</th><th>下班状态</th>
                        </tr>
                        <?php foreach($data as $v):?>
                            <?php if(empty($att[$v['empno']])){
                                $att[$v['empno']]='该员工已被开除';
                            }?>

                            <tr class="row">
                                <td><?php echo $v['empno']?></td><td><?php echo $att[$v['empno']];?></td><td><?php echo $v['work_time']?></td><td><?php echo $v['start']?></td><td> <?php echo $v['end']?></td><td> <?php echo $v['S_status']?></td>
                                <td> <?php echo $v['E_status']?></td>
                            </tr>
                        <?php endforeach;?>
                        <a href="<?php echo site_url('backstage/att/user_att')?>"class="btn btn-danger">返回上一级</a><a onclick="prints();"class="btn btn-success">打印</a>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>