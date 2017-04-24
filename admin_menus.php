<?php   session_start();  ?>
<body>

<h1><p>Welcome <?php echo $_SESSION['username']; ?>!</p></h1>
<?php
include("dbconnect.php");
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<meta charset="utf-8">
<title>Menus</title>
</head>
<body>


<p><h2> Menu Options</h2></p>
<h3>
<ul>
<li><a href="admin_food_menus.php">Food Menus</a></li>
<li><a href="admin_drink_menus.php">Drink Menus</a></li>
<li><a href="admin_merchandise_menus.php">Merchandise Menus</a></li>
</ul>
</h3>
<p></p>
<div class="form">
<a href="admin_home.php">Home</a>
<a href="logout.php">Logout</a>
</div>
</body>
</html>