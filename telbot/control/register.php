<?php
	include('getconfdata.php');
	
	$db = @mysqli_connect($host , $username , $password , $dbname);
	$status = true;
	$data = mysqli_query($db, "SELECT * FROM messages");
	while($rows  = mysqli_fetch_assoc($data))
	{
		if($_POST['id'] == $rows['MessageID'] )
		{
			$status = false;
		}
		
	}
	
	if($_POST['id'] == "000")
	{
		$status = true;
	}
	date_default_timezone_set("Iran/tehrn");
	$date = date("h : i : sa");
 if($status)
	{
		  mysqli_query($db, "INSERT INTO messages (`Username`, `Content`, `MessageID`,`ChatID`, `Date` ) VALUES ('" . $_POST['name'] . "' ,'" . $_POST['text'] . "','" . $_POST['id'] . "','" . $_POST['chat'] . "','" .  $date ."')");
	}
	
	
?>