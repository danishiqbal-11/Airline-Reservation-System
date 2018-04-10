<html>
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
</html>