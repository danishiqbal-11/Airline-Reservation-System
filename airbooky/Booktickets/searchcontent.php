<?php
include("C:/wamp64/www/airbooky/Booktickets/searchstyle.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$userid=$_SESSION['user_name'];

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$query = $db->query("SELECT Distinct Source from flight");
?>
<div id="search">
<legend>Search and Book</legend>
<form method="POST" action="flightsearch.php"></br>
From:&nbsp;<select name="from"> 
<?php
	while($row = $query->fetch(PDO::FETCH_ASSOC)){
?>
    <option value="<?php echo strtoupper($row['Source']);?>"><?php echo strtoupper($row['Source']);?></option>	<?php }  ?>
	</select>
 To:&nbsp;<select name="to">
 <?php $sql = $db->query("SELECT Distinct Destination from flight");
while($row = $sql->fetch(PDO::FETCH_ASSOC)){ 
 ?>
    <option value="<?php echo strtoupper($row['Destination']);?>"><?php echo strtoupper($row['Destination']);?></option>
<?php
}
?>
	</select>
Date of Journey:&nbsp;<input type="date" name="depart" maxlength="15" required="required">
     <input type="submit" name="Search" value="Search"/>
	</form> 
</div>
