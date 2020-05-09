<?php  
include 'db_conn.php';
	if ($_SESSION['name']=='admin') {
		header("location:admin.php");
	}
	else{
		header("location:main.php");
	}
?>