<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];
$money_class=New MoneyStuff();
$user_class=New Users();



$user_logon_data=$_SESSION['user_profile'];
$content=$_SESSION['content'];
$user_prof=get_object_vars($content);
$user_profile=$_SESSION['user_profile'];
if($user_profile==''){
	die('no session cowboy');
}

//Ok, user confirms, delete account

//create mail to send money
$message='El usuario :'.$user_logon_data['id'].' se ha dado de baja y quiere enviar su dinero a la cuenta de paypal: '.$_POST['paypal_to'];
mail("info@tuitflow.com", "Usuario dado de baja", $message);
//Lock account
$user_class->LockAcc($user_logon_data['id']);
printf("<script>document.location.href='connect.php?message=USER_DELETED'</script>;");
die();

?>