<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","","account");
	if(isset($_POST['submit'])) {
		$un = $_POST['username'];
		$pw = $_POST['password'];
		$sql = mysqli_query($conn,"select password from accounts where username='$un'");
		if($row=mysqli_fetch_array($sql)) {
			if($pw == $row['password']) {
		header("location:check.php");
		$_SESSION['name'] = $un;
		exit();
	}
	else
		echo "Invalid Password";
	}
	else
		echo "Invalid Username";
		}
 ?>