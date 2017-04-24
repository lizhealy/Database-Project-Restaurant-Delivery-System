<?php   session_start();  ?>
<body>
<?php

include("dbconnect.php");
?>


<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<meta charset="utf-8">
<title>Admin Home</title>
</head>
<body>

<p><h1>Welcome <?php echo $_SESSION['username']; ?>!</h1></p>

<h3>
<ul>
<li><a href="admin_menus.php">Menus</a></li>
<li><a href="admin_orders.php">Incoming Orders</a></li>
<li><a href="admin_drivers.php">Delivery Drivers</a></li>
<li><a href="admin_zones.php">Delivery Zones</a></li>
</ul>
</h3>


<div class="form">
<a href="logout.php">Logout</a>
</div>
</body>
</html>