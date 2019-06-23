<?php
	include('getconfdata.php');
	
	$db = @mysqli_connect($host , $username , $password , $dbname);
	$data = mysqli_query($db , "SELECT * FROM usersdata");
	$status = true;
	while($rows = mysqli_fetch_assoc($data))
	{
		if($rows['Username'] == $_POST['username'] || $rows['ChatId'] == $_POST['chatid']){
			$status = false;
			break;
		}
	}
	if($status)
	{
		mysqli_query($db, "INSERT INTO usersdata (`Username`, `ChatId` ) VALUES ('" . $_POST['username'] . "' , '". $_POST['chatid']."')");
		echo "Register Finished!";
	}
	else
	{
		
		echo "User alderly exsists!";
	}
	
?>