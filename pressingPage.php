<!DOCTYPE html>
<html>

<head>
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:500px;
    width:700px;
    float:left;
    padding:5px;
}
#section {
    width:400px;
    height:500px;
    float:left;
    padding:10px;
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;
}
</style>
</head>

<body>

<div id="header">
<h1>Pressings</h1>
</div>



<div id="nav">
<?php
session_start();

if($_SESSION["username"] != null) //If a session exists, the echo will be displayed.
{
	echo "<li> Welcome, " .$_SESSION["username"]."!</li>";
}


include("dbconnect.php"); //Connects to MySQL database
include("managePressings.php"); //Will use display functions from managePressings.php
$con= new dbconnect();
$con->connect();
error_reporting(E_ALL);
$result = mysql_query("SELECT * FROM pressings");



$pressings= new managePressings();
$pressings->createTable();
$typeResult = mysql_query("SELECT * FROM recordRecordsUsers");
while($row = mysql_fetch_array($typeResult)) //While there is a result, the session will compare to each username row, and set the type to the row's type.
{
	if($_SESSION["username"] == $row[0])
	{
		$type=$row[2];
	}
}

while($row = mysql_fetch_array($result))
{
	//The selected row will set each variable, then display them.
	$pressingId=$row[0];
    $pressingName=$row[1];
    $pressingYear=$row[2];
    $pressingCompany=$row[3];
    $details=$row[4];
    $comments=$row[5];
    $creator=$row[6];
    

	   echo "<tr>";
	   echo "<td> $pressingName </td>";
	   echo "<td> $pressingYear  </td>";
	   echo "<td> $pressingCompany </td>";
	   echo "<td> $details  </td>";
	   echo "<td> $comments </td>";
	   echo "<td> $creator </td>";
	   if($_SESSION["username"] != null)
	   {
		   	if($type == 1 || $_SESSION["username"] == $creator  ) //If the user is an admin or made the entry, they will be shown the delete button.
		   	{
			   echo "<td> <form action=\"delete.php?id=$pressingId\" target=\"test\" method=\"post\">";
			   echo "<input type=\"submit\" value=\"DELETE\" > </form></th></td>";
			}
			else //If not, it will show a greyed out delete button.
			{
				echo "<th> <form action=\"delete.php?id=$pressingId\" target=\"test\" method=\"post\">";
				echo "<input type=\"submit\" value=\"DELETE\" disabled > </form></th>";
			
			}
	   echo "<td> <form action=\"update.php?id=$pressingId\" target=\"test\" method=\"post\">"; //Shows the button to update the entry.
	   echo "<input type=\"submit\" value=\"UPDATE\" > </form></th></td>"; 
       echo "</tr>";
	   }

       



}
if($_SESSION["username"] != null) //If no user session exists, it will show a create account button and a log in button. If there a session exists, it will give the option to insert an entry, or log out.
{
	echo "<form action=\"insert.php\" target=\"test\" method=\"post\">";
	echo "<input type=\"submit\" value=\"Add pressing\" > </form></th></td>";
	echo " <form action=\"logout.php\" target=\"test\" method=\"post\">";
	echo "<input type=\"submit\" value=\"Log out\" > </form>";
	
}
else 
{
	echo " <form action=\"createAccount.php\" target=\"test\" method=\"post\">";
	echo "<input type=\"submit\" value=\"Create account\" > </form>";
	echo " <form action=\"login.html\" target=\"test\" method=\"post\">";
	echo "<input type=\"submit\" value=\"Login\" > </form>";
}

?>



</body>
</html>

