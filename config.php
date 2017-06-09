<?php
try{
	$dsn="mysql:host=localhost;dbname=test";/*选择数据源*/
	$username="root";
	$password="root";
	$pdo=new PDO($dsn,$username,$password);
	$pdo->query("set names 'UTF8'");
}
catch(PDOException $e){
	echo $e->getMessage();
}

?>