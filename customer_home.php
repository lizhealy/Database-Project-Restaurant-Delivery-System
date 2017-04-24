<?php   session_start();  ?>
<body>
<?php

include("dbconnect.php");
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="mainstyle.css" type="text/css">
<head>
<meta charset="utf-8">
<title>Customer Home</title>
</head>
<body>

<p><h1>Welcome <?php echo $_SESSION['username']; ?>!</h1></p>

<h3>
<ul>

<li><a href="customer_order.php">Order</a></li>
<li><a href="customer_rewards.php">Rewards</a></li>
</ul>
</h3>
<div class="form">

<a href="logout.php">Logout</a>
</div>
</body>
</html>