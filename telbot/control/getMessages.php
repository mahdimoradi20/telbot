<?php
	include('getconfdata.php');
	
	$db = @mysqli_connect($host , $username , $password , $dbname);
	
	$data = mysqli_query($db, "SELECT * FROM messages");
	while($rows  = mysqli_fetch_assoc($data))
	{
			echo "<span style = 'font-size : 27px;color : red;'>".$rows['Username']  . "(" . $rows['ChatID'] . "): </span><span style = 'font-size : 25px;' >" . $rows['Content'] . "</span>" ."<br />" ;
	}
	
?>