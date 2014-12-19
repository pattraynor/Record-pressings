<?php
include("dbconnect.php"); //Calls the dbconnect.php, and connects to the database
$con= new dbconnect();
$con->connect();
session_start(); //Starts the user session.
$username = $_POST['username'];
$password = $_POST['password'];
$query= mysql_query("SELECT * FROM recordRecordsUsers WHERE username='$username'");

$numberRows = mysql_num_rows($query);


	if ($numberRows!=0)
	{
		while ($row = mysql_fetch_assoc($query)) //Goes through the Records User database, and sets the $DBusername and $DBpassword equal to the user entry.
		{
			$DBusername = $row['username'];
			$DBpassword = $row['password'];
		}
	}


	if ($password === $DBpassword) //IF the inserted password is the same as the found database password, it will redirect and log into the Pressing page. If not, it will redirect to the log in page.
	{
		$_SESSION["username"] = $username;
		echo "Welcome $username! Redirecting you in 5 seconds.";		
		header("refresh:5; url=http://sod73.asu.edu/~ptraynor/project/pressingPage.php");
	}
	else
	{

		echo "Invalid Username or Password";
		header("refresh:3; url=http://sod73.asu.edu/~ptraynor/project/login.html");
		
	}







?>

