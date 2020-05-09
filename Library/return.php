<?php 
session_start();
$conn=mysqli_connect("localhost","root","","account");
if(isset($_POST['submit'])) 
{
		$bd = $_POST['bookid'];
		$qn = $_POST['quantity'];
		$un = $_SESSION['name'];
		$sql1 = mysqli_query($conn,"select ID from accounts where Username='$un'");
		if($row1=mysqli_fetch_array($sql1)) 
		{
			$sd = $row1['ID'];
		}
		$s = mysqli_query($conn,"select Quant from bookissue where BID='$bd' && ID='$sd'");
		if($row2=mysqli_fetch_array($s))
		{
			if($qn <= $row2['Quant'])
			{
				$ter = $row2['Quant'];
				$per = $ter - $qn;
				if($per > 0)
				{
					$sq3 = mysqli_query($conn,"UPDATE `bookissue` set `Quant` = '$per' where `BID`='$bd' && `ID` = '$sd'");
					if ($sq3 === TRUE) 
					{
						$sql = mysqli_query($conn,"select Quantity from books where BID='$bd'");
						if($row=mysqli_fetch_array($sql)) 
						{
							$in = $row['Quantity'];
							$inc = $in + $qn;
							$r="update `books` set `Quantity`= '$inc' where `BID`= '$bd'";
							if ($conn->query($r) === TRUE)
							{
								?>
								<script type="text/javascript">
									alert("Return Successful!!!!!");
									document.location.href = "main.php";
								</script>
								<?php
							}
						}
					}
					else
					{
						echo "$per";
						echo "$bd";
						echo "$sd";
						echo "Error!!!!!";
					}
				}
				else if ($per == 0)
				{
					$sql2 = "DELETE FROM `bookissue` where `BID` = '$bd' && `ID` ='$sd'";
					if ($conn->query($sql2) === TRUE) 
					{
						$sql = mysqli_query($conn,"select Quantity from books where BID='$bd'");
						if($row=mysqli_fetch_array($sql)) 
						{
							$in = $row['Quantity'];
							$inc = $in + $qn;
							$r="UPDATE `books` set `Quantity`= '$inc' where `BID`= '$bd'";
							if ($conn->query($r) === TRUE)
							{
								?>
								<script type="text/javascript">
									alert("Return Successful!!!!!");
									document.location.href = "main.php";
								</script>
								<?php
							}
						}
					}
				}
			}	
				else
				{
					?>
					<script type="text/javascript">
						alert("Extra Quantity Entered!!!!!!");
						document.location.href = "return1.php";
					</script>
					<?php    
				}
			
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Wrong BookID Entered!!!!!");
				document.location.href = "return1.php";
			</script>
			<?php  
		}
}
		