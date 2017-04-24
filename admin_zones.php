<?php   session_start();  ?>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>Delivery Zones</title>
</head>
<body>

<h1>Add Delivery Zones</h1>
<form name="admin_zones" method="post" action="admin_zones.php">

Zipcode: <input type="char" name="zip" value=""></p>
Zone ID: <input type="char" name="id" value=""></p>


<?php    

Include('dbconnect.php');

If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['zip']=='' || $_REQUEST['id']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql="insert into zone(zip,id) values('".$_REQUEST['zip']."', '".$_REQUEST['id']."')";

if (!$result = $mysqli->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
   
    exit;
}
echo "<h3>Added Zone</h3>";

}
} 

?>

<input type="submit" name="submit" value="submit">
</form>


<form name="table" action="" method="post">
<?php

mysqli_select_db($mysqli,"checkbox");
$res=mysqli_query($mysqli,"select * from zone");
echo "<table>";

while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>"; ?> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["zip"]; ?>" /> <?php echo "</td>";
echo "<td>"; echo $row["zip"]; echo "</td>";
echo "<td>"; echo $row["id"]; echo "</td>";
echo "</tr>";
}
echo "</table>";
?>
<input type="submit" name="Delete" value="Delete">
</form>

<p><h2>Drivers/Zipcodes</h2></p>
<form name="table" action="" method="post">
<?php

Include('dbconnect.php');
mysqli_select_db($mysqli,"checkbox");

$res=mysqli_query($mysqli,"select * from whatZip");



echo "<p><table>";

while($row=mysqli_fetch_array($res))
{
echo " 
<tr>
<th>Name</th>
<th>Zipcode</th>
</tr>
<tr>";
echo "<td>"; echo $row["name"]; echo "</td>";
echo "<td>"; echo $row["zip"]; echo "</td>";
echo "</tr>";
}
echo "</table></p><p></p>";


?>

<?php

if(isset($_POST["Delete"]))
{

$box=$_POST['num'];
while(list($key,$val)=@each($box))
{

mysqli_query($mysqli,"delete from zone where zip='$val'");
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