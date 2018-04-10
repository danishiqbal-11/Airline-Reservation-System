<?php
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'airline');
$name = $_POST['user'];
$mail = $_POST['email'];
$password = $_POST['password'];
$password_true=$_POST['password_true'];
echo $password,$password_true;
if($password==$password_true){
$sql = "INSERT INTO `users` (Name,Email,password,wallet) values ('$name','$mail','$password',0)"; 
if (!mysqli_query($con,$sql)){
	  echo 'not inserted' ;
	  header("refresh:1; url=http://localhost/airbooky/signup/register.php");
  }
else {
	header("refresh:0.001; url=http://localhost/airbooky/signin/signin.php");
}}
$con->close(); 
?>