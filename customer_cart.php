<?php   session_start();  ?>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>My Cart</title>
</head>
<body>

<h1>My Cart</h1>


<form name="table" action="" method="post">
<?php
Include('dbconnect.php');
mysqli_select_db($mysqli,"checkbox");
$res=mysqli_query($mysqli,"select * from food_menu");
echo "<table>";

while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>"; ?> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["title"];?> - <?php echo $row["price"];?>" /> <?php echo "</td>";
echo "<td>"; echo $row["title"]; echo "</td>";
echo "<td>"; echo $row["description"]; echo "</td>";
echo "<td>"; echo $row["price"]; echo "</td>";
echo "</tr>";
}
echo "</table>";
?>
<input type="submit" name="Order" value="Order">
</form>

<?php



if(isset($_POST["Order"]))
{

$all_food_value = implode(", ",$_POST['num']);

$boxesChecked=count($_REQUEST["num"]);

$username = $_SESSION['username'];



$sql = "INSERT INTO orders(customer_name, price, title) VALUES ('$username','$price','$all_food_value')";
mysqli_query($mysqli,$sql);

?>
<center><h1>My Cart</h1><p>

<?php

echo $all_food_value;

echo "<br>Quantity: ";
echo $boxesChecked;

echo "<br>Reward Points Earned: 1</p>";
?>

<h3>
<a href="customer_confirm.php">Confirm Order</a><p>

</h3></center>
<?php
}
?>

<a href="logout.php">Logout</a>

</body>
</html>