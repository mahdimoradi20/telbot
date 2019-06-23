<?php

include("init.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>صفحه ورود</title>

<link rel="StyleSheet" type="text/css" href="style/style.css"/>
</head>
<body>
<?php
#***************
if($status)
{
#***************
?>
<div id="auth"> 
  <form id="frmAuth" action="main.php" method="POST">
    
    <span class="title">صفحه ورود</span>
	<!--نام کاربری:-->
    <input class="input" type="text" name="username" required autofocus placeholder="نام کاربری"/>
    <!--رمز عبور:<br/>-->
    <input class="input" type="password" name="password" required autocomplete="off" placeholder="رمز عبور"/>
    <br/>
    <input class="button" type="submit" name="sumbit" value="ورود"/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	

  </form>
</div>
<?php
#***************
}
else
{
#***************
?>
<div id="auth"> 
  <div style ="background-color : yellow;text-align : center;"> متاسفانه برنامه به درستی پیکره بندی نشده است!</div>
</div>
<?php
#***************
}
#***************
?>
</body>
</html>