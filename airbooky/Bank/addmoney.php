<?php

include("C:/wamp64/www/airbooky/home/header.php");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$userid=$_SESSION['user_name'];
$add=$_POST['paise'];
if($add>0){
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$query  =  $db->query("Select * from users where userid='$userid'");

while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$pre=$row['Wallet'];
}
$pre=$pre+$add;
echo $pre;
$query2  =  $db->query("UPDATE  `users` set Wallet='$pre' where userid=$userid");
$_SESSION['wallet']=$pre;

	header("refresh:0.001; url=http://localhost/airbooky/Bank/bankpage.php");//redirects to wallets Details
}
else{
	echo 'Enter Valid Amount';
	header("refresh:1; url=http://localhost/airbooky/Bank/bankpage.php");//redirects to wallets Details

	
}
?>