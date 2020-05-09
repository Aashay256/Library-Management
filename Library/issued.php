<!DOCTYPE html>
<html>
<head>
	<title>Library Management</title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="lbs.css">
<script type="text/javascript">
	function logout() {
		var c = confirm("Are You Sure You want to logout??");
		if(c == true){
			alert("You have successfully logged out....");
			location.replace("index.html");
		}
	}
</script>
</head>
<body style="background-image: url(bg.jpg);">
<div class="header" style="background-color: #333333;">
    <h2 style="margin-top: 50px;">Library Management</h2><p id="date1" style="float: left;margin-top: -30px;font-weight: bold;color: rgb(255,255,128);"></p>
        <script>
            var d = new Date(); 
        document.getElementById("date1").innerHTML = d.toDateString(); 
        </script>
        <p style="float: right;margin-top: -30px;font-weight: bold;color: rgb(255,255,128);">Welcome, <?php include 'db_conn.php';echo $_SESSION['name'];?>!</p>
</div>
<div>
	<img src="logo1.jpg" style="width: 230px; height: 200px; margin-left: 0px;">
</div>
<div class="options" data-position="fixed" style="margin-top: 0px";>
    <a href="main.php">Home</a>
    <a href="issueb1.php">Issue A New Book</a> 
    <a href="issued.php">Issued Currently</a>
    <a href="return1.php">Return</a>
    <a onclick="logout()" style="color: white;">Log Out</a>
</div>
<div class="w3-animate-bottom" style="width: 900px; height: 500px; margin-left: 400px; margin-top: -500px;"> 
<?php
$con = mysqli_connect('localhost','root','','account');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 
$un = $_SESSION['name'];
$sql = mysqli_query($con,"select ID from accounts where Username='$un'");
if($row=mysqli_fetch_array($sql)) {
						$sd = $row['ID'];
					}
		echo "<table>   
   	<tr>
    <th><center>BookName</center></th>
    <th><center>AuthorName</center></th>
    <th><center>Quantity</center></th>
  	</tr>";
	$sql1 = mysqli_query($con,"select BID from bookissue where ID='$sd'");
	while($row1 = mysqli_fetch_assoc($sql1))
	{
		$bd = $row1['BID'];
			 $result = mysqli_query($con,"select b.BookName,b.AuthorName,c.Quant from books b,bookissue c where b.BID='$bd' && c.ID='$sd' && c.BID='$bd'");
    while($row2 = mysqli_fetch_assoc($result)) {
        echo "
    <tr>
    <td>".$row2['BookName']."</td>
    <td>".$row2['AuthorName']."</td>
    <td>".$row2['Quant']."</td>
  </tr>";
    }
	}
echo "</table>";
	?>
</div>
</body>
</html>