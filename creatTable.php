<?php
	header("content-type:text/html;charset=utf-8");
	require_once('config.php');
	$sql="create table new(
	classnumber varchar(32),
	name nvarchar(32),
	class nvarchar(32),
	phone varchar(32),
	
	primary key(classnumber)
	)";
	$res=$pdo->exec($sql);
	print_r($res);
	?>