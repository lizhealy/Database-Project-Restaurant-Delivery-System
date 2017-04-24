<?php   session_start();  ?>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>Delivery Drivers</title>
</head>
<body>

<h1>Add Delivery Drivers</h1>
<form name="admin_drivers" method="post" action="admin_drivers.php">

Name: <input type="char" name="name" value=""></p>
Zone: <p>


<?php
Include('dbconnect.php');

mysqli_select_db($mysqli,"checkbox");
$res=mysqli_query($mysqli,"select * from zone");
echo "<table>";

while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>"; ?> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["id"]; ?>" /> <?php echo "</td>";
echo "<td>"; echo $row["id"]; echo "</td>";
echo "<td>"; echo $row["zip"]; echo "</td>";
echo "</tr>";
}
echo "</table>";
?>


<?php    



If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['name']=='')
{
Echo "please fill the empty field.";
}
Else
{

$all_zone_value = implode(", ",$_POST['num']);

$name = $_REQUEST['name'];

$sql = "INSERT INTO driver(name,zone) VALUES ('$name','$all_zone_value')";


if (!$result = $mysqli->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
   
    exit;
}
echo "<h3>Added Driver</h3>";
}
} 

?>

<input type="submit" name="submit" value="submit">
</form>


<form name="table" action="" method="post">
<?php

mysqli_select_db($mysqli,"checkbox");
$res=mysqli_query($mysqli,"select * from driver");
echo "<table>";

while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>"; ?> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["name"]; ?>" /> <?php echo "</td>";
echo "<td>"; echo $row["name"]; echo "</td>";
echo "<td>"; echo $row["zone"]; echo "</td>";
echo "</tr>";
}
echo "</table>";
?>
<input type="submit" name="Delete" value="Delete">
</form>

<?php

if(isset($_POST["Delete"]))
{

$box=$_POST['num'];
while(list($key,$val)=@each($box))
{

mysqli_query($mysqli,"delete from driver where name='$val'");
}

?>

<script type ="text/javascript">
window.location.href=window.location.href;
</script>
<?php
}
?>

<a href="admin_home.php">Home</a>
<a href="logout.php">Logout</a>

</body>
</html>