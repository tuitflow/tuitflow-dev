<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>tuitflow</title>
<meta http-equiv="refresh" content="5;url=https://tuitflow.com/">
<style type='text/css'>

body {
   padding: 0px;
   margin: 0px;
   background-color: #F0E6F0;
   font-family: 'HattoriHanzoLight';
   line-height:20px;
   
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
    src: url('Hattori_Hanzo-webfont.eot');
    src: url('Hattori_Hanzo-webfont.eot?#iefix') format('embedded-opentype'),
         url('Hattori_Hanzo-webfont.woff') format('woff'),
         url('Hattori_Hanzo-webfont.ttf') format('truetype'),
         url('Hattori_Hanzo-webfont.svg#HattoriHanzoLight') format('svg');
    font-weight: normal;
    font-style: normal;

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

.font_err{
	font-family: 'HattoriHanzoLight';
	font-size: 38px;
	color: #666;
	text-decoration: none;
	line-height: 35px;
	
}
</style>
</head>
<body>
<div class="header">
        <a class="font_header" style="color:#fff"><img style="width: 150px; height: auto;" src="images/logo_fondo.png" border="0" /></a>
        
        
</div> 

<div style="margin-top: 30px; padding-left:10px;padding-right:10px;width: 96%; text-align: center;">
	<a class="font_err">Oops!</a><br><br>
	<img src="images/pig.png" border='0' style="height: 300px; width: auto;"/>
	<br><br>
	<a class="font_err">Something was wrong...</a><br><br>
	<a class="font_err">Algo ha salido mal...</a><br><br>
	
</div>
    
</body>
</html>