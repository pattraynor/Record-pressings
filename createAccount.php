<?php
include("dbconnect.php");
$con= new dbconnect();
$con->connect();
if(isset($_POST['submit'])) //If the submit button is pressed, it will take the info inserted into the username and password field, while setting type by default to not an admin,  and insert it into the database for users. 
{
	$sSql = "INSERT INTO recordRecordsUsers
		 (username, password, type)
		 VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['0']."')";
	mysql_query($sSql);
        $update=mysql_affected_rows();
	echo "<h2>Account created! You can now log in.</h2><br />";
}

?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

	Username:<input type="text" name="username" /><br />
	Password:<input type="password" name="password" /><br />

	<input type="submit" name="submit" value="Submit" />

</form>
<a href="pressingPage.php">Home</a>