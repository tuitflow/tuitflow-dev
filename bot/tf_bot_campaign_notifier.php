<?php

/*
 * Tuitflow Bot - :D - i do this things:
 * 
 * - Notify users about its campaigns
 */
 
 print("\n\n*************************\nHi! I'm botflow!\n\nExecuting at: ".date("Y-m-d H:i:s")."\n*************************\n\n");
 $environment='test'; // REMOVE IT FOR PRODUCTION
require_once('../twitteroauth/twitteroauth.php');
require_once('../config.php');
require_once('../classes.php');
$money_class=New MoneyStuff();
$user_class=New Users();

// First check active campaigns
print("\nChecking active campaigns...\n");
$find_active_campaigns=mysql_query("SELECT id,needed_money,user_id FROM campaigns WHERE enabled='1';");
while($campaign=mysql_fetch_array($find_active_campaigns)){
	$campaign_id=$campaign['id'];
	$campaign_user_id=$campaign['user_id'];
	$campaign_needed_money=$campaign['needed_money'];
	$campaign_twitter_user_id=$user_class->GetTwitterIdFromUserId($campaign_user_id);
	$campaign_twitter_screen_name=$user_class->GetUSerScreenName($campaign_user_id);
	$campaign_amount=$money_class->GetCampaignAmountReceived($campaign_id);
	$campaign_user_currency=$user_class->GetUSerCurrency($campaign_user_id);
	$campaign_fund_raised_a=$campaign_amount['sum(amount)'];
	if($campaign_fund_raised_a==''){
		$campaign_fund_raised_a=0;
	}
	
	//be careful, notifier:
	//Get random value from $notificator array
	$k = array_rand($notificator);
	$notificator_data = $notificator[$k];
	$link="https://".TUITFLOW_URL."campaign.php?id=".$campaign_id;
	$connection_own = new TwitterOAuth($notificator_data['consumer_key'], $notificator_data['consumer_secret'], $notificator_data['own_key'], $notificator_data['own_secret']);
	
	$user_prof=$user_class->GetUSerFullProfile($campaign_user_id);
	$user_lang=$user_prof['languaje'];
	
	if($user_lang=='es'){
		$status="@".$campaign_twitter_screen_name.", tu campaña ha recaudado hasta hoy: ".$campaign_fund_raised_a.' '.$campaign_user_currency.'. ¡Sigue difundiendola y consigue tu objetivo! '.$link;
	}else{
		$status="@".$campaign_twitter_screen_name.", your campaign has raised so far: ".$campaign_fund_raised_a.' '.$campaign_user_currency.'. spread it and get your target! '.$link;
	}
	if($campaign_twitter_screen_name=='rebrok' && $campaign_fund_raised_a>0){ // REMOVE IT FOR PRODUCTION
		$notify=$connection_own->post('statuses/update', array('status' => $status));
		print($status."\n");
		
	}// REMOVE IT FOR PRODUCTION
}



?>
