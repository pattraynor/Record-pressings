<?php
class managePressings
{
	function createTable() // Will use HTML to create the table for pressingPage.php
	{
	    echo "<table border=1>";
	    echo "<tr>";
	      echo "<th> Pressing Name</th>";
	      echo "<th> Pressing Year</th>";
	      echo "<th> Pressing Company</th>";
	      echo "<th> Details </th>";
	      echo "<th> Comments </th>";
	      echo "<th> Created By </th>";
	      if($_SESSION["username"] != null)
	      {
	           echo "<th> DELETE </th>"; 
		       echo "<th> UPDATE </th>";
	      }
	    echo "</tr>";
	
	}
	
	function displayRowEdit($pressingId, $pressingName, $pressingYear, $pressingCompany, $details, $comments, $creator)
	{ 
		//The function will take in all related pressing page and user database variables, and display on the log in page.
		session_start();
		$result = mysql_query("SELECT * FROM recordRecordsUsers");
	
		echo "<tr>";
		echo "<td> $pressingName </td>";
		echo "<td> $pressingYear </td>";
		echo "<td> $pressingCompany </td>";
		echo "<td> $details  </td>";
		echo "<td> $comments  </td>";
		echo "<td> $creator  </td>";
		
		
		while($row = mysql_fetch_array($result))
		{
			if($_SESSION["username"] == $row[0])
			{
			$type=$row[2];
			}
		}	 

	   if($type == 1 || $_SESSION["username"] == $creator ) //If the user is an admin (Type 1), or if the user is the one who made the entry, they will have the option to delete the entry.
	   {
		   echo "<input type=\"submit\" value=\"DELETE\" > </form></th></td>";
	   }
	
	   echo "<th><td> <form action=\"update.php?id=$pressingId\" target=\"test\" method=\"post\">";
	   echo "<input type=\"submit\" value=\"UPDATE\" > </form></th></td>";
	   echo "</tr>";
	
	}
	
	function displayRow($pressingName, $pressingYear,$add, $pressingCompany, $details, $comments, $creator)
	{
	
	   echo "<tr>";
	   echo "<th> $pressingName </th>";
	   echo "<th> $pressingYear </th>";
	   echo "<th> $add </th>";
	   echo "<th> $pressingCompany </th>";
	   echo "<th> $details </th>";
	   echo "<th> $comments  </th>";
	   echo "<th> $creator  </th>";
	   echo "</tr>";
	
	}
}
?>
