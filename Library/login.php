<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;

}

.bg-image {
  /* The image used */
  background-image: url("bg.jpg");
  
  /* Add the blur effect */
  filter: blur(4px);
  -webkit-filter: blur(4px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1 ;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

input[type=text], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 10%;	
    background-color: blue;
    color: white;
    padding: 5px 5px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: green;
}

input[type=reset] {
    width: 10%;
    background-color: blue;
    color: white;
    padding: 5px 5px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=reset]:hover {
    background-color: green;
}
</style>
</head>
<body>
<script language="javascript">
function check()
{

 if(document.form2.username.value=="")
  {
    alert("Plese Enter Username or email");
  document.form2.username.focus();
  return false;
  }
   if(document.form2.password.value=="")
  {
    alert("Please Enter password");
  document.form2.password.focus();
  return false;
  }

  return true;
}
  </script>

<div class="bg-image"></div>

<div class="bg-text">
  <center>
<h2><div>
  <form method="POST">
    <label for="fname">User Name</label><br/>
    <input type="text" id="fname" name="username" placeholder="Your name..">
<br>

   <center>Password<br/><input type="password" id="myInput" placeholder="Your password" name="password"></center>
   <center><input type="checkbox" onclick="myFunction()">Show Password</center>

<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>  
 
 
    <input type="submit" name="submit"><br/>

    <input type="reset" value="Reset">

    <input type="reset" onclick="location.href='index.html';" value="Home">
  </form>
</div>
</h2></center>
</body>



</div>

</body>
</html>

<?php  
  include 'db_conn.php';
?>
