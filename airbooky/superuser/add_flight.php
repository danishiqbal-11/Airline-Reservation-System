<?php
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'airline');


$source = $_POST['from'];
$destination = $_POST['to'];
$arival = $_POST['arrival'];
$departure = $_POST['departure'];
$seats = $_POST['seats'];
$cost=$_POST['price'];

$sql = "INSERT INTO `flight` (Source,Destination,Arival_time,Departure_time,no_of_seats,Price) values ('$source','$destination','$arival','$departure','$seats','$cost')"; 
if (!mysqli_query($con,$sql)){
	  echo 'not inserted' ;
	  header("refresh:5; url=http://localhost/airbooky/superuser/add_flight.php");
  }
else {
	header("refresh:0.001; url=http://localhost/airbooky/index.php");
}
$con->close(); 
?>

