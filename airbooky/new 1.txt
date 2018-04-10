<div class="footer">
<p1>Follow Us On: &emsp; Facebook  &emsp; Twitter  &emsp;  LinkedIn</p1>
<hr>
<br><br>
<div class="about"> 
<b><u>About Us:</u></b><br><br>
Airbook is a leading online travel services provider in India and all over world.<br>
We offer best deals on flight booking and holiday packages.<br>
You can easily book and cancel your tickets.
</div>
<div class="contact">  
<b><u>Contact Us:</u></b><br><br>
Danish Iqbal<br>
Zeeshan Ahmad Khan<br>
Aiyan Hamid
</div><br><br>
<hr><br>
<p align="center">© Airbook Pvt. Ltd.
Estd. 2017. Crafted In India<p>
<br>
</div>
<style type="text/css"><html>
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
<?php
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'airline');

session_start();

$flid=$_POST['Book'];
$userid=$_SESSION['user_name'];
$pname=$_POST['pname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$source=$_POST['source'];
$des=$_POST['destination'];
$date=$_SESSION['bookdate'];
$pre=$_SESSION['price'];

echo  'price'.$pre;
echo 'money in your wallet'.$_SESSION['wallet'];

if($pre-1 < $_SESSION['wallet']){
$_SESSION['wallet']=$_SESSION['wallet']-$pre;
$pres=$_SESSION['wallet'];
$sql2= "UPDATE  `users` set Wallet='$pres' where userid='$userid'";
if (mysqli_query($con, $sql2)) {
echo "New record created successfully";}
$sql = "INSERT INTO ticket (flightid,userid,pname,Age,Sex,flightdate,source,destination) values ('$flid','$userid','$pname','$age','$sex','$date','$source','$des')";
 header("refresh:0.001; url=http://localhost/airbooky/index.php");
if (!mysqli_query($con,$sql)){
	  echo 'not inserted' ;
	  header("refresh:0.001; url=http://localhost/airbooky/tickets/tickets.php");
}}
else{
	?>
<a href="http://localhost/airbooky/bank/payment.php"><?php echo 'Add money';?></a>
<?php
}
?><?php

include("C:/wamp64/www/airbooky/home/header.php");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$userid=$_SESSION['user_name'];
$add=$_POST['paise'];
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

?><html>
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
<?php  
while($row = $query->fetch(PDO::FETCH_ASSOC)){
	if($row['Wallet']==0){
		echo 'Your wallet is Empty!';}
	else
	echo 'Money in Your Wallet is  RS.'.$row['Wallet'];
	
} ?></br>
You can <a href="payment.php">Add Money</a>

</div>
</div>
<?php include("C:/wamp64/www/airbooky/home/footer.php"); ?>
</body>
<?php
include("C:/wamp64/www/airbooky/Booktickets/searchstyle.php");
?>
<div id="search">
<fieldset style="width:90%">
<legend>Search and Book</legend>
<form method="POST" action="flightsearch.php"> 
FROM:<select name="from">
    <option value="Delhi">Delhi</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Chennai">Chennai</option>
	<option VALUE="Hyderabad">Hyderabad</option>
	<option VALUE="Bengaluru">Bengaluru</option>
	<option VALUE="Patna">Patna</option>
</select>	
 To:<select name="to">
    <option value="Mumbai">Mumbai</option>
	    <option value="Delhi">Delhi</option>
    <option value="Chennai">Chennai</option>
	<option VALUE="Hyderabad">Hyderabad</option>
	<option VALUE="Bengaluru">Bengaluru</option>
	<option VALUE="Patna">Patna</option>
</select>
Date:<input type="date" name="depart" maxlength="15" required="required">
     <input type="submit" name="Search" value="Search"/>
	</form> 
</fieldset>
</div>
<style type="text/css">

 #search{
position:center;
 margin:auto;
 border:3px solid #a1a1a1;
 font-size:120%;
 text-shadow: 1px 0px 0px #000000;
 word-spacing: 10px;
padding:10px;
 background:rgb(200, 150, 150);
 width:80%;
 border-radius:10px;
 box-shadow: 7px 7px 6px; }
  </style><?php

include("C:/wamp64/www/airbooky/home/header.php");
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");
?>
<div class="addmoney">
<form action="addmoney.php" method="POST" >
<legend>Pay With</legend><pre>
ADD:                  <input type="text" name="paise" placeholder="Amount"></br>
ENTER CARD NUMBER:    <input type="text" placeholder="CARD NUMBER"></br>
EXPIRY MONTH:         <input type="text" placeholder="MONTH"> YEAR:<input type="text" placeholder="YEAR"></br>
CVV:                  <input type="text" placeholder="CCV"></br>
<input type="Submit" value="Pay NOW"></pre>




</form>
</div>
<?php
include("C:/wamp64/www/airbooky/home/footer.php");

?>
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
<div class="tic">
<table border="1" cellpadding="3">
<tr>
<th>PASSENGER NAME</th>
<th>SOURCE</th>
<th>DESTINATION</th>
<th>DATE OF JOURNEY</th>
</tr>

<?php
while($row = $query->fetch(PDO::FETCH_ASSOC)){?>
<tr><th>  <?php	echo $row['pname'];?></th><?php
	?><th><?php echo $row['source'];?></th>
	<th><?php echo $row['destination'];?></th>
	<th><?php echo $row['flightdate'];?></th></tr><?php
}?>
</div></div></table>
<?php
include("C:/wamp64/www/airbooky/home/footer.php");
?>
</body>
</html><?php
include("C:/wamp64/www/airbooky/func.php");
	session_start();
?>

<style type ="text/css">
body
{
}

.addmoney{
	background-color:#0000FF;
	
	
}
.ticket{
background-color: #4286f4;
	
}

.logo
{
position: relative;
z-index: 3;
background-color: #f3eba0;
height: 20%;
width: 100%;
background-repeat: no-repeat;
margin-bottom: 0px;
float: left;
}

.container{
margin-top: 0px;
background-image: url(http://localhost/airbooky/home/background.jpg);
width: 100%;
height: 150%;}

.navigation{
position: relative;
z-index: 2;}

nav{
font-size: 18px;
background-color: #993300;
width: 100%;
margin-left: auto;
margin-right: auto;}

nav ul{
position: relative;
margin-left: 15px;
list-style-type: none;
padding: 0px;}

nav ul li{
display: inline-block;
padding: 20px;}

nav ul li:hover{
background-color: #333;}

nav ul li a,visited{
color: #ccc;
padding: 10px;
text-decoration: none;}

nav ul li:hover ul{
display: block;}

nav ul ul{
display: none;
position: absolute;
margin-top: 20px;
margin-left: -20px;
min-width: 100px}

nav ul ul li{
display: block;
padding: 15px;
margin-left: 0px;}

nav ul ul li a{
margin-left: 5px;}

.frame{
align: center;
position: relative;
left: 280px;
margin-left: auto;
margin-right: auto;
z-index: 1;}

#log {
	text-align:right;
}

#guest {
background:linear-gradient(#8baee8,#ffbad6,#cb9ce2);
text-align:top;
text-align:right;
}
.footer
{
background-color:black;
opacity: 0.7;
color: white;
text: white;
padding-top: 25px;
}
.footer p1
{
margin-left: 30px;
font-size: 20px;
}
.about
{
display: inline;
font-size: 15px;
float: left;
margin-left: 18px;
}
.contact
{
display: inline;
width: 15%;
position: relative;
right: -400px;
font-size: 15px;
}
</style>
<?php
include("C:/wamp64/www/airbooky/home/header.php");
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");
?>
<div class="container">
<div class="navigation">
<?php
include("C:/wamp64/www/airbooky/Booktickets/searchcontent.php");
?>
</div>
<br/><br/>
</div>
</div><div id="guest">
<?php	
echo $_SESSION['user_id'];
?>
</div><div class="footer">
<p1>Follow Us On: &emsp; Facebook  &emsp; Twitter  &emsp;  LinkedIn</p1>
<hr>
<br><br>
<div class="about"> 
<b><u>About Us:</u></b><br><br>
Airbook is a leading online travel services provider in India and all over world.<br>
We offer best deals on flight booking and holiday packages.<br>
You can easily book and cancel your tickets.
</div>
<div class="contact">  
<b><u>Contact Us:</u></b><br><br>
Danish Iqbal<br>
Zeeshan Ahmad Khan<br>
Aiyan Hamid
</div><br><br>
<hr><br>
<p align="center">© Airbook Pvt. Ltd.
Estd. 2017. Crafted In India<p>
<br>
</div>
<style type="text/css"><div class="logo">
<img src="http://localhost/airbooky/home/Logo%201.png" height="100%">
<img src="http://localhost/airbooky/home/Logo%202.png" height="70%" width="30%">
</div><li><a href="http://localhost/airbooky/home/sessbrk.php" >LOG-OUT</a> </li><?php
session_start();
include("C:/wamp64/www/airbooky/func.php");
if ((log_in())){
session_destroy();
header("refresh:0.1; url=http://localhost/airbooky/index.php");
}
?><li><a href="http://localhost/airbooky/signin/signin.php" >SIGN-IN</a> </li><nav>
  <ul>
  <?php if(log_in()){   ?>
  <li><a href="http://localhost/airbooky/index.php">HOME</a></li><li>
      <a href="http://localhost/airbooky/Booktickets/Booktickets.php">BOOK TICKETS</a></li>
	<li>
      <a href="http://localhost/airbooky/Bank/bankpage.php">MY WALLET</a></li>
	  <li><a href="http://localhost/airbooky/tickets/tickets.php">MY TICKET</a></li>
	   <?php
	}
        if(!log_in()){	
		include("C:/wamp64/www/airbooky/home/siopt.php");
		}
		else {
		include("C:/wamp64/www/airbooky/home/logout.php");
		}
		?>
   </ul>
</nav><?php
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
?><html>
<head><title>Sign-in</title></head>
<?php
include("C:/wamp64/www/airbooky/home/header.php");?>
<body>
<?php
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");
?>
<style type="text/css">
 #Sign-In{
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
 width:100px; height:40px;
 background:rgb(45,255,10);
 font-weight:bold;
 font-size:20px }
 </style>
 <body>
<div class="container" style="">
<div class="navigation">
<div id="Sign-In" style="">
<fieldset style="width:50%">
<legend style="background-color:rgb(255,255,255);">LOG-IN HERE</legend>
<form method="POST" action="http://localhost/airbooky/signin/signcheck.php">
Email: <br><input type="text" name="user" size="40" required="required"><br> 
password: <br><input type="password" name="pass" size="40" required="required"><br><br> 
<input id="button" type="submit" name="submit" value="Log-In"> 
<br><pre>
<?php
if (!(log_in())){
include("notregister.html");
}
?>
</pre>
</form> 
</fieldset> </div>
</div>
<br/><br/>
</div>
<?php
 include ("C:/wamp64/www/airbooky/home/footer.php");?>
</body>
</html>
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
?><html>
<head><title>Sign-Up</title></head>
<?php
include("C:/wamp64/www/airbooky/home/header.php");?>
<style type="text/css">
#Register {
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
 width:100px; height:40px;
 background:rgb(45,255,10);
 font-weight:bold;
 font-size:20px }
</style>
<body>
<?php
if(log_in()){
include("C:/wamp64/www/airbooky/home/contentheader.php");}
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");?>
<div class="container">
<div class="navigation">
<div id="Register">
<fieldset>
<legend>Register-Here</legend>
<form method="POST" action="http://localhost/airbooky/signup/information.php"><pre>
Name:                <input type="text" name="user" size="20" required="required"/><br>
Email:               <input type="email" name="email" size="20"required="required"/><br>
Password:            <input type="password" name="password" required="required"/><br>
Confirm Password:    <input type="password" name="password_true" required="required"/><br>
<input id="button" type="submit" name="submit" value="Sign-Up">
</pre></form>
</fieldset>
</div>
</div></div>
</body>
</html><html>
<head><title>Home</title></head><?php
include("C:/wamp64/www/airbooky/home/header.php");
if(log_in()){	
?>
<body>
<?php
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
?>
<div class="container">
<div class="navigation">
<?php
include("C:/wamp64/www/airbooky/home/contentfooter.php");?>
</div></div>
<?php
include("C:/wamp64/www/airbooky/home/footer.php");
}
else{
	
	header("refresh:0.001; url=http://localhost/airbooky/signin/signin.php");
}
?>
</body>
</html><?php

function log_in(){
	return isset($_SESSION['user_id']);
}
?>