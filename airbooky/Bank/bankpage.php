<html>
<head><title>Wallet Details</title></head>
<?php
include("C:/wamp64/www/airbooky/home/header.php");?>
<style type="text/css">
.wallet{
	background-color: #4286f4;
}

</style>
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
<div class="navigation">
<div class="container">
<fieldset Style="text-align:left; width:50%; background-color:#42f498">
<div   Style="color:#6242f4;
  font-size:120%;">Wallet Details</div></br>
<?php  
while($row = $query->fetch(PDO::FETCH_ASSOC)){
	if($row['Wallet']==0){
		echo 'Your wallet is Empty!';}
	else
	echo 'Money in Your Wallet is  Rs.'.$row['Wallet'];
	
} ?></br></br>
<div style=""><a href="payment.php"><input type="image" src="add.png" alt="Add"></a></div>
</fieldset>
</div>
</div>
<?php include("C:/wamp64/www/airbooky/home/footer.php"); ?>
</body>
