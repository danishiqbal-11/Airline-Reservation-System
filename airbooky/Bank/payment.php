<?php

include("C:/wamp64/www/airbooky/home/header.php");
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");
?>
<div class="addmoney"><pre>
<form action="addmoney.php" method="POST" >
<legend>Pay With</legend><pre>

ADD:                  <input type="text" name="paise" placeholder="Amount"></br>
ENTER CARD NUMBER:    <input type="text" placeholder="CARD NUMBER"></br>
EXPIRY MONTH:         <input type="text" placeholder="MONTH"> YEAR:<input type="text" placeholder="YEAR"></br>
CVV:                  <input type="text" placeholder="CCV"></br>
                      <input type="Submit" value="Pay NOW">
					  </pre>




</form>
</div>
<?php
include("C:/wamp64/www/airbooky/home/footer.php");

?>
