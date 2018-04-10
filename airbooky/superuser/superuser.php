<html>
<head><title>Flight Details</title></head>
<?php
include("C:/wamp64/www/airbooky/home/header.php");?>
<body>
<?php
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$user=$_SESSION['user_name'];

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$query = $db->query("select * from `users` where userid='$user'");
//echo $user;

?>
<body>

	<div class="container">
	<div class="navigation">
	<pre>
	<div style="background-color:silver; width:52%; font-size:120%;" >
	<b>ADD FLIGHT DETAILS
	</pre>
<fieldset style="width:50%; background-color:powderblue;">
<pre>
<form method="POST" action="http://localhost/airbooky/superuser/add_flight.php"> 
	
FROM:           <input type="text" name="from" required="required">            To:<input type="text"  name="to">
<br>
<!--Date:<input type="date" name="depart" maxlength="15" />-->

Arrival Time:   <input type="time" name="arrival" required="required">  Departure Time:<input type="time" required="required" name="departure" /></br>
Number of Seats:<input type="number" name="seats" min="1" max="500" required="required"/></br>	 
Price:          <input type="text" name="price" maxlength="6" required="required"	>
	<div style="background-color:silver; width:52%;" >
	<input type="submit" name="Confirm" value="Add Details"/>	
	</div></form> 
</fieldset>
</pre>
</div></div>
</div>



</div>
</div>
</body>



