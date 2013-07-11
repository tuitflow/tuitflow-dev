<?php
//var_dump($_POST);die();
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$money_class=New MoneyStuff();
$user_class=New Users();
$user_logon_data=$_SESSION['user_profile'];
$campaign_id=$_GET['id'];
$amount=$_POST['amount'];
$content=$_SESSION['content'];
$user_prof=get_object_vars($content);
//Check if user is logged
if($user_logon_data==''){
		$return_url=urlencode($_SERVER['SCRIPT_NAME'].'?id='.$campaign_id.'');
		print("<script>document.location.href='connect.php?message=INIT_SESSION&return=".$return_url."'</script>;");
		die();
}
//Get to user id
$campaign_owner=$money_class->GetCampaignOwner($campaign_id);

//Check if user has balance
$account_balance=$user_class->GetBalance($user_logon_data['id']);
if($account_balance>=$amount && $amount!=''){
	$from_user_currency=$user_logon_data['currency'];
	$to_user_currency=$user_class->GetUSerCurrency($campaign_owner['user_id']);
	//Substract money to user
	$substract=$money_class->SubtractMoney($user_logon_data['id'], $amount);
	if($from_user_currency==$to_user_currency){
			$amount=$amount;
		}else{
			$exchange=$money_class->CurrencyExchange($to_user_currency, $from_user_currency);
			$amount=round($amount*$exchange,2);
			//var_dump($amount);die();
		}
	$add_money=$money_class->SumMoney($campaign_owner['user_id'],$amount);
	$redeemed='1';
	$anonymous='0';
	$trans_hash=md5($campaign_owner['user_id'].$user_logon_data['id'].time());
	$to_user_twitter_id=$user_class->GetTwitterIdFromUserId($campaign_owner['user_id']);
	$save_trans=mysql_query("INSERT INTO  `transactions` (`id` ,`from_user_id` ,`to_twitter_user_id` ,`date` ,`redeemed` ,`amount` ,`anonymous` , `hash`)VALUES (
NULL ,  '".$user_logon_data['id']."',  '".$to_user_twitter_id."', CURRENT_TIMESTAMP ,  '".$redeemed."',  '".$amount."',  '".$anonymous."' , '".$trans_hash."');");
		$save_trans_campaign=mysql_query("INSERT INTO  `campaign_transactions` (`id` ,`campaign_id` ,`amount` ,`currency` , `from_user_id`, `sent_time`)VALUES (
NULL ,  '".$campaign_id."',  '".$amount."','".$to_user_currency."' , '".$user_logon_data['id']."' , CURRENT_TIMESTAMP);");
	
}else{
	//Oops, no money, redirect to payment platform
	printf("<script>document.location.href='sum_balance.php?message=NO_MONEY&return='</script>;");
	
}

printf("<script>document.location.href='campaign.php?id=".$campaign_id."&INFO=THANKS_DONATE'</script>;");