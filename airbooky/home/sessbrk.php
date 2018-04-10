<?php
session_start();
include("C:/wamp64/www/airbooky/func.php");
if ((log_in())){
session_destroy();
header("refresh:0.1; url=http://localhost/airbooky/index.php");
}
?>