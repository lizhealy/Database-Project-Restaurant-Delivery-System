<?php   session_start();  ?>
<html>



<head>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<title>Food Menu</title>
</head>
<body>

<h1>Food Menu</h1>
<form name="admin_food_menus" method="post" action="admin_food_menus.php">

<h2>Title: <input type="text" name="title" value=""></p>
Description: <input type="text" name="description" value=""></p>
Price: <input type="text" name="price" value=""></p></h2>


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
$sql="insert into food_menu(title,description,price) values('".$_REQUEST['title']."', '".$_REQUEST['description']."', '".$_REQUEST['price']."')";

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
$res=mysqli_query($mysqli,"select * from food_menu");
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

mysqli_query($mysqli,"delete from food_menu where title='$val'");
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
</style>
</html>