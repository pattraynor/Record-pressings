<?php
session_start();
session_destroy();

		echo "You have been logged out, returning you to the home page.";		
		header("refresh:5; url=http://sod73.asu.edu/~ptraynor/project/pressingPage.php");





?>