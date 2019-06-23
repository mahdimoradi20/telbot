
<?php
include('getconfdata.php');
$status = false;
if(!file_exists("config/ok.cg"))
{
        if((strlen($token) > 0) and (strlen($host) > 0) and (strlen($username) > 0) and  (strlen($dbname) > 0))
        {
            $con = @mysqli_connect($host , $username , $password , $dbname);
            if(!mysqli_connect_error())
            {
                mysqli_query($con, "CREATE TABLE UsersData (Name LONGTEXT , Username LONGTEXT, ChatId LONGTEXT, CountMsg LONGTEXT)");
                mysqli_query($con, "CREATE TABLE Messages (Name LONGTEXT , Content LONGTEXT, MessageID LONGTEXT, Date LONGTEXT)");
				mysqli_query($con, "CREATE TABLE AdminData (Name LONGTEXT , Username LONGTEXT, Password LONGTEXT, BOT LONGTEXT)");
				mysqli_query($con, "INSERT INTO AdminData (Name, Username , Password , BOT) VALUES ('MainUser','admin','admin','" . $token ."')");
                mysqli_close($con);    
             
            
            $file = fopen("config/ok.cg", "w");
            fwrite($file , "Please Don't Delete this File at all!");
            fclose($file);
            $status = true;
            }
        }
        else
        {
            $status = false;
        }
}
else{
         $status = true;
}
?>