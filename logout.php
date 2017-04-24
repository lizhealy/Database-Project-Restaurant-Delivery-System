
<?php
 session_start();

Include('mainstyle.php');
  echo "Logout Successfully ";
  session_destroy();   // function that Destroys Session 
  echo "<br/>Click here to <a href='login.php'>Login</a></div>";
  echo "<br/>Click here to <a href='register.php'>Register</a></div>";

?>
