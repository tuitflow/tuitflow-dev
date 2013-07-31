<?php
//var_dump($_POST);die();
include('rosetta.php');
//session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$money_class=New MoneyStuff();
$user_class=New Users();
$user_logon_data=$_SESSION['user_profile'];
$to_user_id=intval($_GET['to_user_id']); // This user will be recieve the money
$user_data=$_SESSION['user'][$to_user_id];
$amount=$_POST['amount'];
$content=$_SESSION['content'];
$user_prof=get_object_vars($content);
/*
var_dump($_POST);
var_dump($user_logon_data);
var_dump($to_user_id);
var_dump($user_data);
*/

$user_exists=$user_class->check_user_exists($user_data['screen_name'], $user_data['id']);
//var_dump($user_exists);die();
// Check if logged user has sufficient money
$account_balance=$user_class->GetBalance($user_logon_data['id']);
//If transaction anonymous?
if($_POST['anon']){
	$anonymous='1';
}else{
	$anonymous='0';
}



if($account_balance>=$amount && $amount!=''){
	//Ok, account has enough  money
	//echo("enough money!!");
	//deduct money from user profile
	$substract=$money_class->SubtractMoney($user_logon_data['id'], $amount);
	
	//if user is in DB, sum money to destination user and
	if($user_exists==true){
		$from_user_currency=$user_logon_data['currency'];
		$to_user_currency=$user_exists['currency'];
		if($from_user_currency==$to_user_currency){
			$amount=$amount;
		}else{
			$exchange=$money_class->CurrencyExchange($to_user_currency, $from_user_currency);
			$amount=round($amount*$exchange,2);
			//var_dump($amount);die();
		}
		//Do the adition to the user destination account_balance 
		$add_money=$money_class->SumMoney($user_exists['id'],$amount);
		$redeemed='1'; //Redeem is true because we add money to user profile
	}else{
		$redeemed='0';
	}
	
	//save transaction log
	$trans_hash=md5($user_data['screen_name'].$user_data['id'].$user_logon_data['id'].time());
	$save_trans=mysql_query("INSERT INTO  `transactions` (`id` ,`from_user_id` ,`to_twitter_user_id` ,`date` ,`redeemed` ,`amount` ,`anonymous` , `hash`)VALUES (
NULL ,  '".$user_logon_data['id']."',  '".$user_data['id']."', CURRENT_TIMESTAMP ,  '".$redeemed."',  '".$amount."',  '".$anonymous."' , '".$trans_hash."');");
	
	//notify to destination user
	$link="https://".TUITFLOW_URL."redeem.php?id=".$trans_hash;
	//Get random value from $notificator array
	$k = array_rand($notificator);
	$notificator_data = $notificator[$k];
	$connection_own = new TwitterOAuth($notificator_data['consumer_key'], $notificator_data['consumer_secret'], $notificator_data['own_key'], $notificator_data['own_secret']);
	if($anonymous==0){
		//get $user_screen_name
		$user_screen_name=$user_class->GetUSerScreenName($user_logon_data['id']);
		$currency=$user_logon_data['currency'];
		
		$status="@".$user_data['screen_name'].", @".$user_screen_name." ".$lang_twitter_post." ".$amount.' '.$currency.'. '.$link;
	}else{
		$status="@".$user_data['screen_name'].", alguien te ha regalado ".$amount.' '.$currency.'. '.$link;
	}
	
	if($_POST['nonotify']!='nonotifynonotify'){
		//do nothing
		$notify=$connection_own->post('statuses/update', array('status' => $status));
	}else{
		$nonotify=true;
		
	}
	
	
	//yeah, all done
	$status='ok';
	//print("done");
	//print("<a href='".$link."'> link <a/>");
	//delete post to avoid re send
}else{
	//Oops, no money, redirect to payment platform
	printf("<script>document.location.href='sum_balance.php?message=NO_MONEY'</script>;");
	
	//echo("no money, you need add money!<br>");
	?>
	<!--
	<form method="GET" action="paypal.php">
		<input type="text" name="amount" id="amount" value="0.00" /> <?php print($user_logon_data['currency']); ?>
		<input type="text" name="currency" id="currency" value="<?php print($user_logon_data['currency']); ?>" />
		<input type="text" name="to_user_id" id="to_user_id" value="<?php print($to_user_id); ?>" />
		<input type="submit" value="go to paypal" />
	</form>
	-->
	<?php
}
$page='save_transaction';
include('html.index.php');
?>