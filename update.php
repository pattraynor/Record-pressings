<?php
include("dbconnect.php");
$con= new dbconnect();
$con->connect();
if(isset($_GET['id'])) {
		$sSql = "SELECT * FROM pressings WHERE pressingId='".$_GET['id']."'";
		
        $oResult = mysql_query($sSql);

        $aRow = mysql_fetch_assoc($oResult);
        
        
	
}

if(isset($_POST['submit'])) //If the submit button is pressed, it will take the info from the text boxes, and insert it into the Pressings database.
{
	$pressingId= $_POST['pressingId'];
	$pressingName = $_POST['pressingName'];
	$pressingYear   = $_POST['pressingYear'];
	$pressingCompany = $_POST['pressingCompany'];
	$details = $_POST['details'];
	$comments = $_POST['comments'];		
	$sSql="UPDATE pressings SET pressingName =\"$pressingName\" , pressingYear = \"$pressingYear\" , pressingCompany =\"$pressingCompany\" , details =\"$details\", comments =\"$comments\" WHERE pressingId =\"$pressingId\"";
	mysql_query($sSql);
	
	echo "<h2>The pressing information has been updated!</h2>";

}


?>
 <form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id']; ?>" >
                            <input type="hidden" name="pressingId" value="<?php echo $_GET['id']; ?>" />
        PressingName:       <input type="text" name="pressingName" value="<?php echo $aRow['pressingName']; ?>" /><br />
        pressingYear:       <input type="text" name="pressingYear" value="<?php echo $aRow['pressingYear']; ?>" /><br />
        pressingCompany:    <input type="text" name="pressingCompany" value="<?php echo $aRow['pressingCompany']; ?>" /><br />
        Details:            <input type="text" name="details" value="<?php echo $aRow['details']; ?>" /><br />
        Comments:           <input type="text" name="comments" value="<?php echo $aRow['comments']; ?>" /><br />
        Creator:           <input type="text" name="comments" value="<?php echo $aRow['creator']; ?>" /><br />
        
        
                            <input type="submit" name="submit" value="Update Item" />
                          
                          
            
                          
                          


</form>
<a href="pressingPage.php">Home</a>
