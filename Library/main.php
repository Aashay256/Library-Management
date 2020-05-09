<!DOCTYPE html>
<html>
<head>
	<title>Library Management</title>
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
<div class="options" data-position="fixed" style="margin-top: 0px;">
    <a href="main.php">Home</a>
    <a href="issueb1.php">Issue A New Book</a> 
    <a href="issued.php">Issued Currently</a>
    <a href="return1.php">Return</a>
    <a onclick="logout()" style="color: white;">Log Out</a>
</div>
<div style="width: 900px; height: 200px; margin-left: 550px; margin-top: -500px;"> 
	<code><h2 style="margin-left: 160px;color: white;">Rules of Our Library</h2></code>
	<br><br>
	<video style="height: 300px; width: 70%;" controls>
	<source src="videoplayback.mp4" type="video/mp4">
	</video>
</div>
</body>
</html>
