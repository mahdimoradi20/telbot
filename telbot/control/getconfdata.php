<?php
$content = file_get_contents("../config/config.cg");
$content = substr($content , strpos($content ,"'") + 1 );



#***************************************************
$token = substr($content , 0 , strpos($content , "'"));
#***************************************************



$content = substr($content , strpos($content ,"host_ip") + 1 );
$content = substr($content , strpos($content ,"'") + 1 );



#***************************************************
$host = substr($content , 0 , strpos($content , "'"));
#***************************************************




$content = substr($content , strpos($content ,"username") + 1 );
$content = substr($content , strpos($content ,"'") + 1 );




#***************************************************
$username = substr($content , 0 , strpos($content , "'"));
#***************************************************


$content = substr($content , strpos($content ,"password =") + 1 );
$content = substr($content , strpos($content ,"'") + 1 );



#***************************************************
$password = substr($content , 0 , strpos($content , "'"));
#***************************************************




$content = substr($content , strpos($content ,"Database_name") + 1 );
$content = substr($content , strpos($content ,"'") + 1 );




#***************************************************
$dbname = substr($content , 0 , strpos($content , "'"));
#***************************************************
?>