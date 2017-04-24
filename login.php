<?php   session_start();  ?>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>Login</title>
</head>
<body style="width: 100%; height: 100%;">

<div style="top: 30%; left: 40%; position: absolute;">

<h1>Login</h1>
<?php

if(isset($_SESSION['username'])) {

	echo "You are already logged in";
    	echo "<br/>Click here to <a href='admin_home.php'>Login as Admin</a></div>";
	echo "<br/>Click here to <a href='customer_home.php'>Login as Customer</a></div>";
}
if (!isset($_POST['submit'])){
?>
<!-- The HTML login form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post"><h3>
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
		<input type="submit" name="submit" value="Login" /></h3>
	</form> 
<a href='register.php'>Don't have an account?</a>

<?php



} else {
	require_once("dbconnect.php");
	
 
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	$sql = "SELECT * from user WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
	$result = $mysqli->query($sql);
	if (!$result->num_rows == 1) {
		echo "<p>Invalid username/password combination</p>";
	} else {
	$_SESSION['username']=$username;
        $_SESSION['id']=$id;
		echo "<p>Logged in successfully</p>";
		echo "<br/>Click here to <a href='admin_home.php'>Login as Admin</a>";
		echo "<br/>Click here to <a href='customer_home.php'>Login as Customer</a></div>";
		
		
		
		
	}
}
?>	
</div>	
</body>
</html>