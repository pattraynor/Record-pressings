<?php
session_start();
include("dbconnect.php"); //Calls dbconnect.php and connects to the database
$con= new dbconnect();
$con->connect();
if(isset($_POST['submit'])) //If the submit button is pressed, it will set the $username to the session,
							// create the SQL queiry, and insert into the Pressings database.
{
	$username = $_SESSION["username"];
	$sSql = "INSERT INTO pressings
		 (pressingId, pressingName, pressingYear, pressingCompany, details, comments, creator)
		 VALUES ('".$_POST['pressingId']."', '".$_POST['pressingName']."', '".$_POST['pressingYear']."', '".$_POST['pressingCompany']."', '".$_POST['details']."', '".$_POST['comments']."', '".$username."')";
       
	mysql_query($sSql);
        $update=mysql_affected_rows();
	echo "<h2>$update Pressing Inserted</h2><br />";
}

?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

	Pressing Name:<input type="text" name="pressingName" /><br />
	Pressing Year:<input type="text" name="pressingYear" /><br />
	Pressing Company:<input type="text" name="pressingCompany" /><br />
	Details:<input type="text" name="details" /><br />
	Comments:<input type="text" name="comments" /><br />

	<input type="submit" name="submit" value="Add Pressing" />

</form>
<a href="pressingPage.php">Home</a>