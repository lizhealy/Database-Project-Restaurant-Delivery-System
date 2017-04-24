<?php   session_start();  ?>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>Incoming Orders</title>
</head>
<body>

<h1>Incoming Orders</h1>




<form name="table" action="" method="post">
<?php

Include('dbconnect.php');


mysqli_select_db($mysqli,"checkbox");
$res=mysqli_query($mysqli,"select * from orders");




echo "<p><table>";

while($row=mysqli_fetch_array($res))
{
echo " <tr>
    <th>ID</th>
    <th>Name</th> 
    <th>Order</th></tr><tr>";
echo "<td>"; ?> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["customer_name"];?>" /> <?php echo "</td>";
echo "<td>"; echo $row["id"]; echo "</td>";
echo "<td>"; echo $row["customer_name"]; echo "</td>";
echo "<td>"; echo $row["title"]; echo "</td>";
echo "</tr>";
}
echo "</table><p><p><p>";


?>
<input type="submit" name="AssignDriver" value="Assign Driver">
<input type="submit" name="reward" value="Give 1 Reward Point">
</form>

<?php


if(isset($_POST["reward"]))
{
$customername=implode($_POST['num']);


$sqlcheck = mysqli_query($mysqli,"SELECT * FROM rewards WHERE username='$customername'");

 if(mysqli_num_rows($sqlcheck)> 0)
   {
    
    
$rewardresult = mysqli_query($mysqli,"SELECT rewards
FROM rewards
WHERE username
IN (

SELECT username
FROM user
WHERE username =  ('$customername')

)");


while($row = mysqli_fetch_array($rewardresult)) {

$customerrewards = $row['rewards'];

$newrewardvalue = $customerrewards + 1;
echo $newrewardvalue;


$rewsql="update rewards SET rewards='$newrewardvalue' WHERE username =  '$customername'";

if (!$result = $mysqli->query($rewsql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
   
    exit;
}

echo "<h3>Added Point</h3>";
}


}

 else
    {
   $rewsql="insert into rewards(username,rewards) values('$customername', 1)";

if (!$result = $mysqli->query($rewsql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
   
    exit;
}

echo "<h3>Added Point</h3>";
}
   
    }


if(isset($_POST["AssignDriver"]))
{


$customername=implode($_POST['num']);

$username = $_SESSION['username'];

$driverresult = mysqli_query($mysqli,"SELECT name
FROM driver
WHERE zone
IN (

SELECT id
FROM zone
WHERE zip
IN (

SELECT zip
FROM user
WHERE username =  ('$customername')
)
)");

while($row = mysqli_fetch_array($driverresult)) {
$assigneddriver = $row['name'];
}


?>

<center><h1>Assigned Driver</h1><p><h2>



<?php

echo $assigneddriver;


?>
</h2>
<h3>
<a href="admin_confirm.php">Send Order to Driver</a><p>

</h3></center>
<?php
}
?>

<a href="logout.php">Logout</a>

</body>
</html>