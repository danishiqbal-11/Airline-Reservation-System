<html>
<head><Title>Your-Tickets</Title><?php
include("C:/wamp64/www/airbooky/home/header.php");
?>
<style type="text/css">
#Book{
 margin-bottom:150px;
 margin-right:150px;
 margin-left:450px;
 border:3px solid #a1a1a1;
 padding:9px 35px;
 background:rgb(200, 150, 150);
 width:400px;
 border-radius:20px;
 box-shadow: 7px 7px 6px; }
  #button
{ border-radius:10px;
 background:rgb(45,255,10);
 font-weight:bold;
font-size:20px }
#tag {
 background:#cc99ff;
}
 </style></head>
<body>
<?php
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");?>
<div class="container" style="">
<div class="navigation">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Airline";

$source=$_POST['source'];
$des=$_POST['destination'];

$_SESSION['price']=$_POST['price'];
$id=$_POST['Book'];  //flight id
$userid=$_SESSION['user_name'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * from `flight` where flight_id='$id'";
$result = $conn->query($sql);
?>
<div id="book">
<div id="tag">
<?php
   while($row = $result->fetch_assoc()) {
	echo "Your Flight is From ".$row["Source"]." to " .$row["Destination"];?></br></br>
	<?php	 
	echo 'You have to pay Rs '.$row["Price"];
}
?></div>
</br></br>
<fieldset style="width:50%">
<legend style="background-color:rgb(255,255,255);">Enter Passenger Details</legend>
<form action="bookedflight2.php" method="POST">
<input type="hidden" name="source" value="<?php  echo $source;?>"/>
<input type="hidden" name="destination" value="<?php  echo $des;?>"/>
Passenger Details<input type="text" name="pname"required="required" placeholder="Name">
          <input type="text" name="sex" required="required" placeholder="Sex  M/F">
          <input type="text" name="age" required="required" placeholder="Age">
<input type="hidden" name="Book" value=" <?php echo $id; ?> " /></br></br>
<input id="button" type="submit" name="submit" value="Pay & Book">
</div>
</div>
</div>
</body>
</html>
