<?php
include("C:/wamp64/www/airbooky/func.php");
	session_start();
?>

<style type ="text/css">
body
{
	font-family: Arial, sans-serif;
}

.addmoney{
	background-color:#aaffFa;
	
	
}
.ticket{
background-color: #c6fff3;
	
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
background-color:#000000;}

nav ul li a,visited{
color: #ffffff;
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
background:linear-gradient(#9e42f4,#ffbad6,#f44156);
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
