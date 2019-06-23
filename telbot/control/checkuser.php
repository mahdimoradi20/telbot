<?php
	include('getconfdata.php');
	
	$db = @mysqli_connect($host , $username , $password , $dbname);
	$data = mysqli_query($db , "SELECT * FROM usersdata");
	$status = false;
	$userid = "None";
	while($rows = mysqli_fetch_assoc($data))
	{
		if($rows['Username'] == $_POST['user']){
			$userid = $rows['ChatId'];
			$status = true;
			break;
		}
	}
	
	if($status)
	{
		
		echo $userid;
	}
	else
	{
		
		echo "0";
	}
	
	
?>