<nav>
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
			if ($_SESSION['user_name']==8){
			?><li><a href="http://localhost/airbooky/superuser/superuser.php">ADD FLIGHT</a></li>
	  <?php
		}
		include("C:/wamp64/www/airbooky/home/logout.php");
		}
		?>
   </ul>
</nav>