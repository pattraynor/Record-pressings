<?php
class dbconnect{
function connect()
{
  $con=mysql_connect("localhost","ptraynor","ptraynor"); // phpMyAdmin user name and password
    if (!$con)
     { die('Could not connect: ' . mysql_error());  }
   mysql_select_db("ptraynor", $con); // phpMyAdmin user name
}
} ?>  
