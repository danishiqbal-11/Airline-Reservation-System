<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";
 
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$tkid=$_POST['ticket'];
echo $tkid;
session_start();
$_SESSION['wallet'];
$userid=$_SESSION['user_name'];
$price=$_POST['price'];
$query="DELETE FROM ticket where ticketid='$tkid'";
$db->exec($query);
$_SESSION['wallet']=$_SESSION['wallet']+0.8*$price;
$pre=$_SESSION['wallet'];
$sql="Update users set Wallet='$pre' where userid='$userid'";
$db->exec($sql);
header("refresh:0.001; url=http://localhost/airbooky/tickets/tickets.php");
  





?>