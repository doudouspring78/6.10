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
  <h2>提交信息</h2>
	<form action="info.php?act=Add" method="post">
      <table class="table table-bordered">
        <tr>
          <td>学号</td>
          <td><input class="form-control" type='number' name="classnumber" placeholder="请输入学号"></td>
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
        <tr>
          <td>电话</td>
          <td><input class="form-control" type='number' name="phone" placeholder="请电话号码"></td>
        </tr>
        <tr>
          <td colspan="2"><input class="btn btn-primary" type="submit" value="提交">
          <a href="classN.php" class="btn btn-primary">查看已提交信息</a></td>
          
        </tr>
      </table>
    </form>
    <p>说明：如果修改信息，请先填写学号，点击修改</p>
</body>
</html>