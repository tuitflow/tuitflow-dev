<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$money_class=New MoneyStuff();
$user_class=New Users();
$user_logon_data=$_SESSION['user_profile'];
$content=$_SESSION['content'];
$user_prof=get_object_vars($content);
$user_profile=$_SESSION['user_profile'];
$page='sum_balance';
include('html.index.php');
?>
<!--
<form method="GET" action="paypal.php">
		<input type="text" name="amount" id="amount" value="0.00" /> <?php print($user_logon_data['currency']); ?>
		<input type="text" name="currency" id="currency" value="<?php print($user_logon_data['currency']); ?>" />
		<input type="submit" value="go to paypal" />
	</form>
	
-->