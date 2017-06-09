<?php
  require_once("config.php");
  $cla=$_REQUEST['classnumber'];
  $sql="select classnumber,name,class,phone from new where classnumber=$cla ";
  $stm=$pdo->query($sql);
  $mes=$stm->fetchAll(PDO::FETCH_ASSOC);
  
   //print_r($mes['0']);
   //print_r($mes);
?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提交信息</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <style>
            *{
              margin: 0 auto;
              padding :0 auto;
              text-align: center;
            }
    </style>
  <script language="javascript" type="text/javascript">
</script>
</head>
<body>
  <h2>信息阅览</h2>


	<form action="info.php?act=update" method="post">
      <table class="table table-bordered">
        <?php foreach ($mes as $key => $value) { ?>
        <tr>
          <td>学号</td>
          <td><input class="form-control" type='number' name="classname" placeholder="请输入学号" value="<?php echo $value['classnumber']?>"</td>
        </tr>
        <tr>
          <td>姓名</td>
          <td><input class="form-control" type='text' name="name" placeholder="请输入姓名" value="<?php echo $value['name']?>"></td>
        </tr>
        <tr>
          <td>专业</td>
          <td><input class="form-control" type='text' name="class" placeholder="请输入专业" value="<?php echo $value['class']?>"></td>
        </tr>
        <tr>
        <tr>
          <td>电话</td>
          <td><input class="form-control" type='number' name="phone" placeholder="请电话号码" value="<?php echo $value['phone']?>"></td>
        </tr>
        <tr>
          <td colspan="2"><a href="update.php?classnumber=<?php echo $cla?>" class="btn btn-primary">修改信息</a>
        </tr>
        <?php } ?>
      </table>
    </form>  
</body>
</html>