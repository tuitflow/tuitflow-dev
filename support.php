<?php
session_start();
require_once('config.php');
require_once('classes.php');
$user_logon_data=$_SESSION['user_profile'];
?>
<?php
include('rosetta.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>tuitflow</title>
<link href='https://fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<style type='text/css'>

body {
   padding: 0px;
   margin: 0px;
   background-color: #F0E6F0;
   font-family: 'Pontano Sans';
   
}

a:link{
	color:#0000FF;
}
a:visited{
	color:#0000FF;
}
.font_header{
	font-family: 'Pontano Sans';
	font-size: 38px;
	color: #fff;
	text-decoration: none;
}
.header{
   
   width: 98%;
   background-color: #660066;
   padding-left:10px;
   padding-top:10px;
   padding-bottom:10px;
   
}
.input_tx{
	border-color: #666;
	border-width: 1px;
	border-style:solid;
	padding:5px;
}
</style>
</head>
<body>
<div class="header">
        <a class="font_header" style="color:#fff"><img style="width: 150px; height: auto;" src="images/logo_fondo.png" border="0" /></a>
        
        
</div> 

<div style="margin-top: 10px; padding-left:10px;">

	<h3><?php print($lang_get_support); ?></h3>
	<?php
	if($_POST['email']==''){

	?>
	<form method="POST" action="support.php" class="search_form">
		<?php print($lang_insertmail); ?><br>
        <input class="input_tx" type="text" name="email" placeholder="<?php print($lang_email_sample); ?>" style="width: 300px;" /><br><br>
		<?php print($lang_explain); ?><br>
		<textarea name="text" rows="10" cols="50"></textarea><br><br>
		<input type="submit" value="<?php print($lang_send_button); ?>" />
		<input type="text" style="display: none;" name="user_id" value="<?php print($user_logon_data['id']); ?>" />
		</form>
		<?php
		
	}else{
		$message="Mensaje recibio desde la web:\n\n ".$_POST['text']." \n\n del usuario:\n ".$_POST['user_id'];
	mail("info@tuitflow.com", "Mensaje de soporte de: ".$_POST['email'], $message);
	print($lang_thanks_mail);
	}
	
	?>
</div>
    
</body>
</html>