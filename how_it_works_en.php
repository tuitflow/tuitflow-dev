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
   line-height:20px;
   
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

<div style="margin-top: 10px; padding-left:10px;padding-right:10px;">

	<h3><?php print($lang_about); ?></h3>
	<a>
<strong>¿Qué puedo hacer en tuitflow?</strong><br>
En tuitflow puedes enviar dinero a los twitteros que desees en tan solo 3 clicks. Puedes enviar desde 0,10 euros hasta 1 euro en cada envío. Tambien puedes seguir las acciones de otros usuarios, comentarlo en Twitter, dar las gracias, ¡e incluso pedir dinero!. 
<br><br> 
<strong>¿Es seguro enviar dinero?</strong><br>
Por supuesto. Tuitflow realiza todas las transacciones bajo https que cifra y protege los datos enviados. Al recargar tu cuenta de Paypal, o cobrar tu dinero, tambien estaras seguro gracias a los métodos de seguridad de Paypal.
<br><br>
<strong>¿Comparte Tuitflow mis datos con alguien?</strong><br>
Rotundamente no. Tuitflow no realiza ningún tipo de negocio con tus datos, ni nombre, ni usuario de Twitter, mail y cualquier otro dato que almacenemos.
<br><br>
<strong>¿Hay algún coste extraordinario?</strong><br> 
No. Tuitflow no aplica ningun coste extraordinario en ningún caso. Solo Paypal puede cargar con comisiones sus transacciones desde o hacia cuentas de Tuitflow.
<br><br>
<strong>¿Puedo donar a cualquier usuario?</strong><br> 
Si. Cualquier usuario registrado en Twitter, puede recibir dinero desde tuitflow. Ocasionalmente, y para evitar abusos, el sistema de control de flow puede impedir enviar dinero a un usuario en concreto, si detecta que tus envíos de dinero tienen poca variedad.
<br><br>
<strong>¿Y si me quiero dar de baja?</strong><br> 
Para eliminar tu cuenta de tuitflow, debes hacer click en link “borrar mi cuenta” desde la pagina principal. Esto hará que tu dinero sea traspasado a tu cuenta de paypal y todos tus datos eliminados de la base de datos de tuitflow.</a>
<br><br>
<strong>Si tienes alguna duda mas:</strong><br>
<a href="https://twitter.com/tuitflow" target="blank">@tuitflow</a><br>
info@tuitflow.com<br>
</div>
    
</body>
</html>