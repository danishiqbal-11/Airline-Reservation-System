<html>
<head><title>Search</title></head>
<?php include ("C:/wamp64/www/airbooky/home/header.php");?>
<style type="text/css">
 #Search{
 border:3px solid #a1a1a1;
 padding:9px 35px;
 width:810px;
 border-radius:10px;
 box-shadow: 3px 3px 3px; }
table {
  width: 800px;}
th{
  padding: 7px 10px 10px 10px;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-size: 90%;
  color:rgb(255,255,255);
  border-bottom: 2px solid #111111;
  border-top: 1px solid #999;
  text-align: left;}
  table{
  background-color: #5182d1;
  padding: 15px;
  border: 2px solid #000000;}
tr.even {
  background-color: #d4db0a;}
tr:hover {
  background-color: #000000} 
  </style>
  
<body>

<?php
include("C:/wamp64/www/airbooky/home/contentheader.php");
include("C:/wamp64/www/airbooky/home/logo.php");
include("C:/wamp64/www/airbooky/home/contentfooter.php");
?>

<div class="container" style="">
<div class="navigation">

<div id="search">
    <table>
	<tr>
	<th>BOOK</th>
	<th>Flight Id</th>
	<th>Source</th>
	<th>Destination</th>
	<th>Departure Time</th>
	<th>Arrival Time</th>
	<th>Price</th>
	<th>Journey Duration</th>
	</tr>
	
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$from=$_POST['from'];
$to=$_POST['to'];
$_SESSION['bookdate']=$date=$_POST['depart'];

$wday = date('w',strtotime($date));
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  ?>
  
 <?php
	$query = $db->query("SELECT `flight`.`Flight_id` ,`flight`.`Source`,`flight`.`Destination`,`flight`.`price`,`flight`.`arival_time`,`flight`.`departure_time`
	                           FROM `flight` where source='$from' and destination='$to'");
	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		?>
		<tr><th>
		<form method="POST" action="bookedflight.php"> 
		<input type="hidden" name="Book" value="<?php echo $row['Flight_id']; ?>" />
		<input type="hidden" name="price" value="<?php echo $row['price']; ?>" />
		<input type="hidden" name="source" value="<?php  echo $row['Source'];?>"/>
		<input type="hidden" name="destination" value="<?php  echo $row['Destination'];?>"/>
		<input type="submit" value="BookNow"/></th>
		</form>
		<th><?php  echo $row['Flight_id'];?></th>
		<th><?php  echo $row['Source'];?></th>
		<th><?php  echo ($row['Destination']);?></th>
		<th><?php  echo date('H:i',strtotime($row['departure_time']));?></th>
		<th><?php  echo date('H:i',strtotime($row['arival_time']));?></th>
		<th><?php  echo $row['price'];?></th>
		<?php
		$hr=((date($row['arival_time']))-(date($row['departure_time'])));
		if($hr<0){
			$hr=$hr*-1;
		}
		$min=(date('i',strtotime($row['departure_time']))-date('i',strtotime($row['arival_time'])));
		if($min<0){
			$min=$min*-1;
		}
		?>
	<th><?php echo $hr.':'.$min;?>
		<?php } ?></th>
		</table>
</div>
</div>
</div>
</body>
</html>
