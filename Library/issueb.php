<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","","account");
	if(isset($_POST['submit'])) {
		$bd = $_POST['bookid'];
		$qn = $_POST['quantity'];
		$sql = mysqli_query($conn,"select Quantity from books where BID='$bd'");
		if($row=mysqli_fetch_array($sql)) {
			if($qn < $row['Quantity']) {
					$in = $row['Quantity'];
					$inc = $in - $qn;
				$q="UPDATE `books` SET `Quantity`= '$inc'  WHERE `BID`= '$bd'";
    			if ($conn->query($q) === TRUE) {
				$un = $_SESSION['name'];
				$sql1 = mysqli_query($conn,"select ID from accounts where Username='$un'");
					if($row1=mysqli_fetch_array($sql1)) {
						$sd = $row1['ID'];
				$s = mysqli_query($conn,"INSERT INTO bookissue (ID, BID, Quant)
								 		 VALUES ('$sd', '$bd', '$qn')");
				}
			}
		?>
		<script type="text/javascript">
			alert("Issue Successful!!!!!");
			document.location.href = "main.php";
		</script>
	<?php  
	}
	else{
		?>
		<script type="text/javascript">
			alert("Quantity not Available!!!!!");
			document.location.href = "issueb1.php";
		</script>
	<?php  
	}
	}
	else {
		?>
		<script type="text/javascript">
			alert("Wrong BookID Entered!!!!!");
			document.location.href = "issueb1.php";
		</script>
	<?php  
		}
		}
 ?>