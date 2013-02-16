<?php
include('../rosetta.php');
require_once('../twitteroauth/twitteroauth.php');
require_once('../config.php');
require_once('../classes.php');
$user_class=New Users();
$money_class=New MoneyStuff();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>tuitflow</title>
<style type='text/css'>
.wrapper{
   width: 100%;
   margin: 0 auto;
}
.header{
   float: left;
   width: 99%;
   background-color: #660066;
   padding-left:10px;
   padding-top:10px;
   padding-bottom:10px;
   
}
.wrapright{
   float: left;
   width: 100%;
   
}
.right{
   margin-left: 248px;
   height: 200px;
   
   padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px
}
.left{
   float: left;
   width: 245px;
   margin-left: -100%;
   height: 260px;
   padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px
}

body {
   padding: 0px;
   margin: 0px;
   background-color: #F0E6F0;
   font-family: 'HattoriHanzoLight';
   
}

a:link{
	color:#0000FF;
}
a:visited{
	color:#0000FF;
}
.font_header{
	font-family: 'HattoriHanzoLight';
	font-size: 38px;
	color: #fff;
	text-decoration: none;
}
@font-face {
    font-family: 'HattoriHanzoLight';
    src: url('../Hattori_Hanzo-webfont.eot');
    src: url('../Hattori_Hanzo-webfont.eot?#iefix') format('embedded-opentype'),
         url('../Hattori_Hanzo-webfont.woff') format('woff'),
         url('../Hattori_Hanzo-webfont.ttf') format('truetype'),
         url('../Hattori_Hanzo-webfont.svg#HattoriHanzoLight') format('svg');
    font-weight: normal;
    font-style: normal;

}
.left_container{
	height:260px;
	width:90%;
	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	background-color:#fff;
	margin-bottom:10px;
	line-height: 22px;
   	
}
.right_container{
	
	
	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	background-color:#fff;
	line-height: 22px;
   	
}
.footer{
   float: left;
   width: 100%;
   padding-left:10px;
   margin-top:20px;
   line-height: 22px;
   	
}
.left_container{
	height:250px;
	width:90%;
	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	background-color:#fff;
	margin-bottom:10px;
	line-height: 22px;
   	
}
.right_container{
	
	
	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	background-color:#fff;
	line-height: 22px;
   	
}
.font_followers{
	font-size: 12px;
	color: #333;
	
}
.err_message{
	border-color: #ccc;
	border-style: solid;
	border-width: 1px;
	padding: 5px;
	background-color: #F0E6F0;
	margin-bottom: 10px;
	font-weight: bold;
	text-align: center;
}
</style>

</head>
<body>
	<div class="wrapper">
    <div class="header">
        <a class="font_header" href="index.php" style="color:#fff"><img style="width: 150px; height: auto;" src="../images/logo_fondo.png" border="0" /></a>
        
        
    </div> 
    <div class="wrapright"> 	  
	    <div class="right">
	         <div class="right_container">
	         <h3>tuitflow - Admin</h3>
	         <?php
	         switch ($_GET['page']) {
	         	default;
				case 'index':
				include('index.inc.php');	 
				break;
				case 'codes':
					include('codes.php');
				break;
				 
				 
			 }
	         ?>
	         </div>
	          <div class="footer">
	        tuitflow 2013 - <?php print($lang_license); ?> - <a href="support.php" onclick="return !window.open(this.href, 'Support', 'width=500,height=500')"
    target="_blank"><?php print($lang_support); ?></a> - <a href=""><?php print($lang_tos); ?></a> -  <a href=""><?php print($lang_about); ?></a>
	    </div>     
	    </div>
	</div>    
	    <div class="left">
	         <div class="left_container">
	         <a href="">buscar usuarios</a><br>
	         <a href="">enviar dinero</a><br>
	         <a href="index.php?page=codes">codigos promo</a><br>
	         </div>
	    </div> 
	   
</div>
</body>
</html>