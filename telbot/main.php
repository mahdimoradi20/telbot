<?php
include('getconfdata.php');
$con = @mysqli_connect($host , $username , $password , $dbname);
$bot_token = "";
if(!mysqli_connect_error())
{
    $status = false;           
	$data = mysqli_query($con, "SELECT * FROM AdminData");
	while($rows  = mysqli_fetch_assoc($data))
	{
		if(($_POST['username'] == $rows['Username']) and ($_POST['password'] == $rows['Password']))
		{
			$status = true;
			$bot_token = $rows['BOT'];
			break;
		}
	}
    
}
if($status)
{
#******************	
?>

<!DOCTYPE html>

<html>

<head>
	<link href = "style/css/bootstrap.min.css" rel = "stylesheet" />
	<script src = "style/js/jquery.js" language = "javascript" ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			var obj = document.getElementById("mboard");
			
			$('#registerbtn').click(function(){
				
				var chid = document.getElementById('chatidtxt').value;
				var uname = document.getElementById('usernametxt').value ;
				
				$.post('control/adduser.php', {username : uname, chatid : chid} , function(data){
					
					alert(data);
				});
			});
			
			
			
			function Get()
			{
				$.getJSON('https://api.telegram.org/bot<?php echo $bot_token; ?>/getupdates',function(data) {
				for( i = 0 ;; i ++)
				{
						username = data['result'][i]['message']['from']['username'];
						first_name = data['result'][i]['message']['from']['first_name'];
						text_me = data['result'][i]['message']['text'];
						chat_id = data['result'][i]['message']['chat']['id'];
						id_message = data['result'][i]['message']['message_id'];
					$.post("control/register.php",{name : first_name , text :text_me, id : id_message,chat : chat_id}, function(data){});
				}
				});
			}
			
		 
		 function Show()
		 {
			 $.post('control/getMessages.php', function(data){
				 
				 $('#board').html(data);
				 obj.scrollTop = obj.scrollHeight;
			 });
		 }
		 
		 $('#sendbtn').click(function(){
				
				var txtsend = document.getElementById('txtsend').value;
				var txtmsg = document.getElementById('txtmsg').value ;
				$.post('control/checkuser.php', {user : txtsend} , function(data){
					
					if(data == '0')
					{
						alert("You must first register the User!");						
					}
					else
					{
						$.post('https://api.telegram.org/bot<?php echo $bot_token; ?>/sendMessage', 

							{chat_id : data , text : txtmsg},
							function (data){
								//alert("ارسال شد");
								document.getElementById('txtmsg').value = "";
							}
						);
						$.post("control/register.php",{name : 'admin' , text :txtmsg, id : "000",chat : data}, function(dat){});
						
					}
					
				
			});
		 });
		 
		 setInterval(Show,300);
		 setInterval(Get,300);
		});
</script>
</head>

<body style = "background-image : url('style/images/bgMain.png');" onload = "Mahdi()">

	<div class = "container" >
	
		<div class = "jumbotron">
        <img src = "image/1.jpg" width ="230" height="100" class = "pull-right" />
        <div style = "text-align : justify;" >
		Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
		Maecenas porttitor congue massa. Fusce posuere
		, magna sed pulvinar ultricies, purus lectus
		malesuada libero, sit amet commodo magna eros
		quis urna. Nunc viverra imperdiet enim. Fusce
		est. Vivamus a tellus. Pellentesque habitant
		morbi tristique senectus et netus et malesuada
		fames ac turpis egestas. Proin pharetra nonummy
		pede. Mauris et orci. Aenean nec lorem.
		</div>
		</div>
	
		<div class  = "row" >
		
			<div class = "col-sm-4" style = "background-color : yellow;height : 450px;" >
			<span style = "font-size: 30px;" >Send a Message!</span>
			<div style = "text-align : justify;" >
		<div>
		<b>TO:</b> <textarea style = "width : 30%; height : 30px;margin-top : 30px;" id = "txtsend" ></textarea><br /><br />
		<b>Message:</b><br /><textarea style = "width : 100%; height : 200px;" id = "txtmsg" ></textarea>
		<button style = "width : 45%; height : 50px;font-size : 20px;margin-top : 30px;" id = "sendbtn" >Send Message!</button>
		</div>
		</div>
			
			</div>
			<div class = "col-sm-8" style = "background-color : lightgray;height : 460px;overflow: scroll;" id = "mboard" >
			
			<b style = "font-size : 30px;">Latest Messages:<b><br />
			<div id = "board"></div>
		      
			</div>
		
		</div>
	
		<div class  = "row" >
		
			<div class = "col-sm-4" style = "background-color : lime;height : 260px;" >
			Register a User
			<div style = "text-align : justify;" >
		<div style = "font-size : 20px;">
			User Name:   <textarea style = "width : 50%; height : 30px;margin-top : 30px;" id = "usernametxt" ></textarea><br />
			ChatID:   <textarea style = "width : 40%; height : 30px;margin-top : 30px;" id = "chatidtxt" ></textarea>
			<br /><button style = "width : 30%; height : 35px;font-size : 20px;margin-top : 30px;" id = "registerbtn" >Register!</button>
		</div>
		</div>
		
		</div>
	
	</div>
	
	<script src = "style/js/bootstrap.min.js" language = "javascript" ></script>
	
	
</body>

</html>

<?php
#*************
}
else
{
#*************

	header("location:index.php");

}
#*************
mysqli_close($con);
?>
