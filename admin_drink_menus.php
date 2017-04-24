<?php   session_start();  ?>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<title>Drink Menu</title>
</head>
<body>

<h1>Drink Menu</h1>
<form name="admin_drink_menus" method="post" action="admin_drink_menus.php">

Title: <input type="char" name="title" value=""></p>
Description: <input type="char" name="description" value=""></p>
Price: <input type="float" name="price" value=""></p>


<?php    

Include('dbconnect.php');

If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['title']=='' || $_REQUEST['description']=='' || $_REQUEST['price']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql="insert into drink_menu(title,description,price) values('".$_REQUEST['title']."', '".$_REQUEST['description']."', '".$_REQUEST['price']."')";

if (!$result = $mysqli->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
   
    exit;
}
echo "<h3>Added Item</h3>";
}
} 

?>

<input type="submit" name="submit" value="submit">
</form>


<form name="table" action="" method="post">
<?php

mysqli_select_db($mysqli,"checkbox");
$res=mysqli_query($mysqli,"select * from drink_menu");
echo "<table>";

while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>"; ?> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["title"]; ?>" /> <?php echo "</td>";
echo "<td>"; echo $row["title"]; echo "</td>";
echo "<td>"; echo $row["description"]; echo "</td>";
echo "<td>"; echo $row["price"]; echo "</td>";
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

mysqli_query($mysqli,"delete from drink_menu where title='$val'");
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