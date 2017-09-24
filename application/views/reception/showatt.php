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
    <script>

    </script>
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
                <table class="table table-border">
                <tr>
                <th>员工名字</th><th>工号</th><th>工作时间</th><th>上班时间</th><th>下班时间</th>
                    <th>上班状态</th><th>下班状态</th>
                </tr>
                <tr>
                    <td><?php echo $_SESSION['name']?></td>
               <?php
               if(!is_array($data)){
                   $data[]=$data;
               }
               foreach($data as $v):?>
                <td><?php  echo $v;?></td>
                <?php endforeach;?>
                </tr>
                    </table>
                <br><br><br>
            </div>

        </div>

    </div>
</div>
</div>
</body>
</html>