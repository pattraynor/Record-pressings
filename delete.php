<?php
//Calls dbconnect.php, and connects to my Php database.
include("dbconnect.php");
$con= new dbconnect();
$con->connect();
 
if(isset($_GET['id']))  //If the ID is set, $pressingID will get the id, and delete the entry linked to the ID
{
        $pressingId= $_GET['id'];
	$sSql = "DELETE FROM pressings WHERE pressingId=\"$pressingId\"";
	$oResult = mysql_query($sSql);
        $rows=mysql_affected_rows();
	echo "<h2>$rows Record(s) Deleted </h2>";
}
?>
<a href="pressingPage.php">Home</a>
