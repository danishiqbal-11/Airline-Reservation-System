<html>
<head><title>Home</title></head><?php
include("C:/wamp64/www/airbooky/home/header.php");
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");

$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'airline');


$flid=$_POST['Book'];
$userid=$_SESSION['user_name'];
$pname=$_POST['pname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$source=$_POST['source'];
$des=$_POST['destination'];
$date=$_SESSION['bookdate'];
$pre=$_SESSION['price'];
?></br></br>
<div style="background:#a3ffe8; width:50%;margin-left:25%;">
</br>
<?php
echo '&nbsp&nbsp&nbsp   Price of ticket = Rs '.$pre;?></br></br><?php
echo '&nbsp&nbsp&nbsp   Money in your wallet = Rs '.$_SESSION['wallet'];?></br></br><?php
echo '&nbsp&nbsp&nbsp   You cannot Book your flight first add money in your wallet.';

if($pre-1 < $_SESSION['wallet']){
$_SESSION['wallet']=$_SESSION['wallet']-$pre;
$pres=$_SESSION['wallet'];
$sql2= "UPDATE  `users` set Wallet='$pres' where userid='$userid'";
if (mysqli_query($con, $sql2)) {
echo "New record created successfully";}
$sql = "INSERT INTO ticket (flightid,userid,pname,Age,Sex,flightdate,source,destination,Price) values ('$flid','$userid','$pname','$age','$sex','$date','$source','$des','$pre')";
 header("refresh:0.001; url=http://localhost/airbooky/index.php");
if (!mysqli_query($con,$sql)){
	  echo 'not inserted' ;
	  header("refresh:0.001; url=http://localhost/airbooky/tickets/tickets.php");
}}
else{
	?>
<pre>      <a href="http://localhost/airbooky/bank/payment.php"><input type="image" src="add.png"></a></br></br></br></br></br></br></pre>
</div></br></br></br>
<?php
}
include("C:/wamp64/www/airbooky/home/footer.php");
?>