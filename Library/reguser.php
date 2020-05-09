<?php  
$con=mysqli_connect("localhost","root","","account");
	if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 
if(isset($_POST['submit'])) {
		$un = $_POST['username'];
		$pass = $_POST['password'];	
		$sql = "INSERT INTO accounts (ID, Username, Password)
VALUES (NULL, '$un', '$pass')";

if (mysqli_query($con, $sql)) {
   ?>
   <script type="text/javascript">
   	alert("Record Added");
   	document.location.href = "admin.php";
   </script>
  <?php  
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
		}
?>