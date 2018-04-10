<html>
<head><title>Home</title>
<style type="text/css">
</style>
</head><?php
include("C:/wamp64/www/airbooky/home/header.php");?>
<body>

<div class="ticket">
<?php
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$userid=$_SESSION['user_name'];

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$query = $db->query("select * from `ticket` where userid='$userid'");
?>
<fieldset style="text-align:center;">
<legend style="fontsize:48px;">Your Tickets</legend>
<div class="tic">
<table border="2" cellpadding="10">
<tr>
<th>PASSENGER NAME</th>
<th>SEX</th>
<th>AGE</th>
<th>SOURCE</th>
<th>DESTINATION</th>
<th>DATE OF JOURNEY</th>
<th>CANCEL TICKET</th>
</tr>
<form action="cancel.php" method="POST">
<div style="font-size:70%; text-align:right;">Cancellation Charge is 20% of Fare</div>
<?php
while($row = $query->fetch(PDO::FETCH_ASSOC)){ ?>

   <input type="hidden" name="ticket" value="<?php  echo $row['ticketid']?>" >
   <input type="hidden" name="price" value="<?php  echo $row['Price']?>">
     <tr><th>  <?php	echo $row['pname'];?></th><?php
	?><th><?php echo $row['Sex'];?></th>
	<th><?php echo $row['Age'];?></th><th><?php echo $row['source'];?></th>
	<th><?php echo $row['destination'];?></th>
	<th><?php echo $row['flightdate'];?></th>
	<th><input type="image" src="cancel.png" value="Cancel"/></th></tr><?php 
}?>
</div></div></table>
</form>
</fieldset>
<?php
include("C:/wamp64/www/airbooky/home/footer.php");
?>
</body>
</html>