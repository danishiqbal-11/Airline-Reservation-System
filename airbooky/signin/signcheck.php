<?php
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'airline');

$user=$_POST['user'];                //getting user email

$Password=$_POST['pass'];               //getting password

$sql="SELECT * from users where Email='$user' and Password='$Password'";

$result = $con->query($sql);

if ($result->num_rows == 1){
	$_SESSION['name']='Loggedin';
    //echo 'logged in ';	
    include("C:/wamp64/www/airbooky/func.php");
	session_start();
	while($row = $result->fetch_assoc()) {	
	$_SESSION['user_name'] = $row["userid"];
	$_SESSION['user_id'] = $row["Name"];
	$_SESSION['wallet'] = $row["Wallet"];
		}
	header("refresh:1; url=http://localhost/airbooky/index.php");
}
else{
	echo 'login unsucessful';
}
?>