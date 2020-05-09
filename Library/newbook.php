<?php  
$con=mysqli_connect("localhost","root","","account");
	if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 
if(isset($_POST['submit'])) {
		$bn = $_POST['bookname'];
		$an = $_POST['authorname'];
		$qn = $_POST['quantity'];	
		$sql = "INSERT INTO books (BID, BookName, AuthorName, Quantity)
VALUES (NULL, '$bn', '$an', '$qn')";

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