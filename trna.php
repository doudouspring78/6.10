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
	<form action="update.php" method="post">
      <table class="table table-bordered">
        <tr>
          <td>学号</td>
          <td><input class="form-control" type='number' name="classnumber" placeholder="请输入学号"></td>
        </tr>
        <tr>
          <td colspan="2"><input class="btn btn-primary" type="submit" value="提交"></td>
        </tr>
      </table>
    </form>
</body>
</html>