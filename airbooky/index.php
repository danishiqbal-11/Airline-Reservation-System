<html>
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
</html>