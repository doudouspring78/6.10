<?php 
	header('Content-type:text/html;charset=utf-8');
	require_once("../config.php");

	$classnumber=$_REQUEST['classnumber'];
	$name=$_POST['name'];
	$class=$_POST['class'];
	$phone=$_POST['phone'];
	$act=$_REQUEST['act'];
	
	switch ($act) {
		case 'Add':
			if(isset($_POST['submit']) && $_POST['submit'] == '提交'){
				if($classnumber == "" || $password == "" || $mail == "" || $web ==""){
					echo "<script>alert('有信息未填写');history.go(-1);</script>";
				}
				
			}
			$sql="insert into new values('{$classnumber}','{$name}','{$class}','{$phone}')";
			$res=$pdo->exec($sql);
			if($res){
				$mes="提交成功";
				echo "<script>alert('{$mes}');location.href='look.php?classnumber=$classnumber';</script>";
			}
			 else{
			 	$mes="插入失败";
			  	echo "<script>alert('{$mes}');location.href='Add.php';</script>";
			  }
			break;
		case 'update':
			$sql= "update new set name = '{$name}', class = '{$class}', phone = '{$phone}' ";
			$res=$pdo->exec($sql);
			if($res){
				$mes="更新成功";
				echo "<script>alert('{$mes}');location.href='look.php?classnumber=$classnumber';</script>";
			}
			else{//从info.php入也是修改失败
				$mes="更新失败";
				echo "<script>alert('{$mes}');location.href='update.php?classnumber=$classnumber';</script>";
			}
			
		default:
			# code...
			break;
	}
 ?>