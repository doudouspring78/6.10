<?php
  $classnumber=$_REQUEST['classnumber'];

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>修改信息</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <style>
            *{
              margin: 0 auto;
              padding :0 auto;
              text-align: center;
            }
    </style>
  </head>
  <body>
    <h2>修改信息</h2>
    <form action="info.php?act=update" method="post">
      <table class="table table-bordered">
        <tr>
          <td>学号</td>
          <td><input class="form-control" type='number' name="classnumber" placeholder="请输入学号" value="<?php echo $classnumber ?>"    ></td>
        </tr>
        <tr>
          <td>姓名</td>
          <td><input class="form-control" type='text' name="name" placeholder="请输入姓名"></td>
        </tr>
        <tr>
          <td>专业</td>
          <td><input class="form-control" type='text' name="class" placeholder="请输入专业"></td>
        </tr>
        <tr>
          <td>电话</td>
          <td><input class="form-control" type='number' name="phone" placeholder="请输入电话号码"></td>
        </tr>
        <tr>
          <td colspan="2"><input class="btn btn-primary" type="submit" value="提交"></td>
        </tr>
      </table>
    </form>
  </body>
</html>

