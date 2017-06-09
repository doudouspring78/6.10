

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>学号确认</title>
</head>
<body>
  <form action="" method="post">
      <table class="table table-bordered">
        <tr>
          <td>学号</td>
          <td><input class="form-control" type='number' name="classnumber" placeholder="请输入学号"></td>
        </tr>
        <tr>
          <td colspan="2"><input class="btn btn-primary" type="submit" value="确定">
          </td>
          
        </tr>
      </table>
    </form>
</body>
</html>
<?php
  require_once("config.php");
  error_reporting(0);
  $cla=$_REQUEST['classnumber'];
  $sql="select classnumber,name,class,phone from new where classnumber=$cla ";
  $stm=$pdo->query($sql);
  $mes=$stm->fetchAll(PDO::FETCH_ASSOC);
  if($mes){
    echo "<script>alert('进入信息界面');location.href='look.php?classnumber=$cla';</script>";
  }else{
    echo "<script>alert('请填写正确的学号，若未提交过信息，请先提交信息');location.href='Add.php'</script>";
  }
?>