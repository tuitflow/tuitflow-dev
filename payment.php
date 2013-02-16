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
//Get user account balance
$currency=$user_profile['currency'];
$balance=$user_class->GetBalance($_SESSION['user_profile']['id']);
if($currency=='USD'){
	$conversion=$money_class->CurrencyExchange("USD", "EUR");
	$limit=round(PAYPAL_MIN_GET*$conversion,2);
}else{
	$limit=PAYPAL_MIN_GET;
}
$amount=$_POST['amount_to'];
$paypal_to=$_POST['paypal_to'];

if($paypal_to==''){
	header('Location: get_money.php');
}
//print($amount." ".$currency." ".$paypal_to);

if($amount>$balance){
	die("ERR_NO_ENOUGH_BALANCE");
}
if($amount<$limit){
	die("ERR_MINIMUN_IS_".$limit.$currency);
}
$page='paypal_refund_conf';
include('html.index.php');
?>

