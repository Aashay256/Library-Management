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
<div class="w3-animate-bottom" style="width: 900px; height: 200px; margin-left: 400px; margin-top: -500px;"> 
<?php
$con = mysqli_connect('localhost','root','','account');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 
$s = "select * from books";
$result = mysqli_query($con , $s);
echo "<table>   
   <tr>
   	<th><center>BookID</center></th>
    <th><center>BookName</center></th>
    <th><center>AuthorName</center></th>
    <th><center>Quantity</center></th>
  </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "
    <tr>
    <td>".$row['BID']."</td>
    <td>".$row['BookName']."</td>
    <td>".$row['AuthorName']."</td>
    <td>".$row['Quantity']."</td>
  </tr>";
    }
echo "</table>";
	?>
	<div class="container" style="margin-left: 200px;margin-top: -100px;">
		<div class="login-box" >
		<div class="row" >
			<div class="col-md-6 align="center">
				<h2 class="whitetext"> Issue A New Book </h2>
				<form action="issueb.php" method="POST">
					<div class="form-group" >
						<label><h5 class="whitetext">Book ID</h5></label>
						<input type="number" name="bookid" class="form-control" required>
						
					</div>
					<div class="form-group" >
						<label><h5 class="whitetext">Quantity</h5></label>
						<input type="number" name="quantity" class="form-control" required>
						
					</div>
					<button type="submit" align="center" class="btn btn-primary" name="submit">Submit</button>
					
				</form>
			</div>
			
		</div>	
		</div>
	</div>
</div>
</body>
</html>