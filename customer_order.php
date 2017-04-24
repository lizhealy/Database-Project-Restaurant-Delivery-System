<?php   session_start();  ?>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>Order</title>
</head>
<body>

<h1>Order</h1>
<form name="customer_order" method="post" action="customer_cart.php">

Street Address: <input type="char" name="street" value=""></p>
City: <input type="char" name="city" value=""></p>
State: <input type="char" name="state" value=""></p>
Zip Code: <input type="int" name="zip" value=""></p>


<?php    

Include('dbconnect.php');



If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['street']=='' || $_REQUEST['city']=='' || $_REQUEST['zip']=='')
{
Echo "please fill the empty field.";
}
Else
{

$zip = $_REQUEST['zip'];
$username = $_SESSION['username'];
$cust_id = intval($_POST["id"]);


$sql = "UPDATE user SET zip='$zip' where username ='$username'";

if (!$result = $mysqli->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
   
    exit;
}
echo "<h3>Updated Address</h3>";
echo "<br/> <a href='customer_cart.php'>Continue to order</a></br>";
}
} 

?>

<input type="submit" name="submit" value="submit">
</form>



<a href="admin_home.php">Home</a>
<a href="logout.php">Logout</a>

</body>
</html>