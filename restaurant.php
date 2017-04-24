<html>
<head>
	<script language=javascript src="function.js"></script>
	<link rel="stylesheet" href="style.css" />
	<script language=javascript>
		function checkout()
		{
			var i=0;
			for(x=0;x<document.f1.elements.length;x++)
			{
				if(document.f1.elements[x].value=="")
					{
						f1.txtname.focus();
						alert("Pls Enter All Value");
						i=1;
						break;
					}
			}
			if(i==0)
			{
				f1.method="POST";
				f1.action="booking.php";
				f1.submit();
			}
		}
		function checkout1()
		{
			
				f2.method="POST";
				f2.action="addmenu.php";
				f2.submit();
		}
	</script>
</head>
<?php
	include "connection.php";
	include "index.php";
?>

<br><br>

<div id="center">
	<p>Welcome <?php echo $username; ?></p>
	<p>Please Use This section for Room Bookings.</p>
</div>

<br><br>

<form action="booking.php" method="POST" name="f1">
<table class="table3" align="center">
<tr>
	<th align=left>Check-In Date   :</th>
	<td>
		
		<?php
        echo "<select name='cmdday'>";
		for($i=01;$i<=31;$i++)
		if($i==date("d"))
		{
			echo "<option value='$i' selected>$i</option>";
		}
		else
		{
			echo "<option value='$i'>$i</option>";
		}
            echo "</select>";
		?>
				   


		
		<?php
        echo "<select name='cmdmonth'>";
		for($i=01;$i<=12;$i++)
		if($i==date("m"))
		{
			echo "<option value='$i' selected>$i</option>";
		}
		else
		{
			echo "<option value='$i'>$i</option>";
		}
            echo "</select>";
		?>
		
		<?php
		echo "<select name='cmdyear'>";
		for($i=2010;$i<=2020;$i++)
		{
			if($i==date("Y"))
			{
				echo "<option value='$i' selected>$i</option>";
			}
			else
			{
				echo "<option value='$i'>$i</option>";
			}
		}
		echo "</select>";
		?>	
	</td>
</tr>

<tr>
	<th align=left>Check-Out Date   :</th>
	<td>
	<?php
	echo "<select name='cmbday'>";
	
		for($i=1;$i<=31;$i++)
			if($i==date("d"))
			{
				echo "<option value='$i' selected>$i</option>";
			}
			else
			{
				echo "<option value='$i'>$i</option>";
			}
	echo "</select>";	
	
	?>
	
	<?php
	
	echo "<select name='cmbmonth'>";
		
		for($i=1;$i<=12;$i++)
			if($i==date("m"))
			{
				echo "<option value='$i' selected>$i</option>";
			}
			else
			{
				echo "<option value='$i'>$i</option>";
			}
		
	echo "</select>";
	
			
	?>
		
		<?php
		echo "<select name='cmbyear'>";
		for($i=2010;$i<=2020;$i++)
		{
			if($i==date("Y"))
			{
				echo "<option value=$i selected>".$i."</option>";
			}
			else
			{
				echo "<option value=$i>".$i."</option>";
			}
		}
		echo "</select>";
		?>
	</td>
</tr>


<tr>
	<th align=left>No. Of Rooms   :</th>
	<td>
		<select name=txtroom>
	<?php
	for($i=1;$i<=20;$i++)
	{
		echo "<option value=$i>$i</option>";
	}
	?>
	</select>
	</td>
	
	<th align=left>Type   :</th>
	<td>
	<?php
		echo "<select name=txttype>";
		$qup="select * from tariff where avroom > 0";
		$rs=mysql_query($qup);
		while($res=mysql_fetch_row($rs))
		{
			echo "<option value='".$res[0]."'>".$res[0]."</option>";
		}
		echo "<select>";
		echo "</td>";
	?>
	<td><a href=tariff.php>Tariff</a></td>
</tr>

<tr>
	<th align=left>Full Name   :</th>
	<td colspan=4><input type=text name=txtname size=50></td>
</tr>
<tr>
	<th align=left>E-mail  :</th>
	<td colspan=4><input type="text" name="txtemail" size=50></td>
</tr>
<tr>
	<th align=left>Company   :</th>
	<td colspan=4><input type=text name=txtcompany size=50 onkeyPress="validcompany()"></td>
</tr>
<tr>
	<th align=left>Phone   :</th>
	<td colspan=4><input type="text" name="txtnumber" size=15 ></td>
</tr>
<tr>
	<th align=left valign=top>Address   :</th>
	<td colspan=4><textarea name=txtaddress rows=5 cols=40></textarea></td>
</tr>
<tr>
	<th align=left>Special Requirements   :</th>
	<td colspan=4><textarea name=txtspanyreq rows=5 cols=40></textarea>
</tr>
<tr>
	<td colspan=2 align=center><input type=button name=s1 value="submit" onClick="checkout()">
	<input type=reset name=s2 value="clear"><a href=reservation.php></a></td>
</tr>

<tr align=center>
	<td><a href=edres.php>Edit</a></td>
</tr>

<tr align=center>
	<td><a href=delres.php>Delete</a></td>
</tr>
</table>
</form>



<br><br>

<div id="center">
	<p>Please Use This section for Menu Changes.</p>
</div>

<?php
	include "connection.php";
	$stmt="select * from menu";
	$rowset=mysql_query($stmt);
	if(!$rowset)
	{
		echo "<h1>In correct mysql select Query.</h1>";
		die($stmt);
	}
	echo "<center>";
	echo "<table border=1>";
	echo "<caption><p><b><i>Menu Card</i></b></p></caption>";
	echo "<tr><th>SR.</th><th colspan=2>LIST</th></tr>";
	echo "<tr><th>No.</th><th>Name</th><th>Price</th></tr>";
	
	while($result=mysql_fetch_array($rowset))
	{
		echo "<tr>";
		echo "<td>".$result['id']."</td>";
		echo "<td>".$result[1]."</td>";
		echo "<td>Rs. ".$result[2]."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>

<br><br>

<form action="addmenu.php" method="POST" name="f2">
<table class="table3" align="center">
	
<tr>
	<th align=left>Item Name 		:</th>
	<td colspan=4><input type=text name="itmname" size=50></td>
</tr>
<tr>
	<th align=left>Rate		:</th>
	<td colspan=4><input type="text" name="itmrate" size=50></td>
</tr>
<tr>
	<td colspan=2 align=center><input type=button name=s1 value="submit" onClick="checkout1()">
	<input type=reset name=s3 value="clear"></td>
</tr>

<tr align=center>
	<td><a href=edmenu.php>Edit</a></td>
</tr>

<tr align=center>
	<td><a href=delmenu.php>Delete</a></td>
</tr>
</table>
</form>

<marquee behavior=alternate><b><i>Powered By: Kunal Vaidya™</i></b></marquee>
</body>
</html>