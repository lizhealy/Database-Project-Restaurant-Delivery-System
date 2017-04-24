<?php   session_start();  ?>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>Rewards</title>
</head>
<body>

<h1>My Rewards</h1>




<form name="table" action="" method="post">
<?php

Include('dbconnect.php');


mysqli_select_db($mysqli,"checkbox");
$res=mysqli_query($mysqli,"select * from rewards");



echo "<p><table>";

while($row=mysqli_fetch_array($res))
{
echo " 
<tr>
<th>Name</th>
<th>Rewards</th>
</tr>
<tr>";
echo "<td>"; echo $row["username"]; echo "</td>";
echo "<td>"; echo $row["rewards"]; echo "</td>";
echo "</tr>";
}
echo "</table><p><p><p>";


?>
</form>

<p><h1>Gold Customers</h1>
<form name="table" action="" method="post"></p>
<?php

Include('dbconnect.php');


mysqli_select_db($mysqli,"checkbox");
$res=mysqli_query($mysqli,"call goldCustomers()");



echo "<p><table>";

while($row=mysqli_fetch_array($res))
{
echo " 
<tr>
<th>Name</th>
<th>Rewards</th>
</tr>
<tr>";
echo "<td>"; echo $row["username"]; echo "</td>";
echo "<td>"; echo $row["rewards"]; echo "</td>";
echo "</tr>";
}
echo "</table><p><p><p>";


?>


<a href="customer_home.php">Home</a><br>
<a href="logout.php">Logout</a>

</body>
</html>