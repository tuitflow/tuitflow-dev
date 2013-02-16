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
<link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<style type='text/css'>

body {
   padding: 0px;
   margin: 0px;
   background-color: #F0E6F0;
   font-family: 'Quattrocento Sans';
   line-height:20px;
   
}

a:link{
	color:#0000FF;
}
a:visited{
	color:#0000FF;
}
.font_header{
	font-family: 'Quattrocento Sans';
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

<div style="margin-top: 10px; padding-left:10px;padding-right:10px;">

	<h3><?php print($lang_get_help); ?></h3>
	<a><?php print($lang_entropy_help); ?></a>
	
</div>
    
</body>
</html>