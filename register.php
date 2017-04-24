<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>Register</title>
<body style="width: 100%; height: 100%;">

<div style="top: 30%; left: 40%; position: absolute;">

<form name="register" method="post" action="register.php">

<h1>Register</h1><p>
<h3>
USERNAME:<input type="text" name="username" value=""></br>
EMAIL:<input type="text" name="email" value=""></br>
PASSWORD:<input type="text" name="password" value=""></br>
RE-PASSWORD:<input type="text" name="repassword" value=""></br>
<input type="submit" name="submit" value="submit">
</h3>

<p><a href='login.php'>Already have an account?</a>
</div>
</form>

</body>
</head>
</html>

<?php     

Include('dbconnect.php');

//if submit is not blanked i.e. it is clicked.
If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['username']=='' || $_REQUEST['email']=='' || $_REQUEST['password']==''|| $_REQUEST['repassword']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql="insert into user(username,email,password) values('".$_REQUEST['username']."', '".$_REQUEST['email']."', '".$_REQUEST['password']."')";

if (!$result = $mysqli->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
   
    exit;
}
echo "<div class='form'>
<center><h3>You are registered successfully.
<br/>Click here to <a href='login.php'>Login</a></h3></center></div>";
}
}
?>