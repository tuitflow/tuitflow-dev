<?php

/*
 * Tuitflow Bot - :D - i do this things:
 * 
 * - check if campaign raised max money level 
 * - Disable expired campaign
 */
 
 print("\n\n*************************\nHi! I'm botflow!\n\nExecuting at: ".date("Y-m-d H:i:s")."\n*************************\n\n");
 $environment='test'; // REMOVE IT FOR PRODUCTION
require_once('../twitteroauth/twitteroauth.php');
require_once('../config.php');
require_once('../classes.php');
$money_class=New MoneyStuff();
$user_class=New Users();


// First check if campaigns raised max money level
print("\nChecking if active campaigns raises max money level:\n");
$find_active_campaigns=mysql_query("SELECT id,max_money,campaign_type FROM campaigns WHERE enabled='1' AND max_money != '0';");
while($campaign=mysql_fetch_array($find_active_campaigns)){
	$campaign_id=$campaign['id'];
	$campaign_max_money=$campaign['max_money'];
	$campaign_type=$campaign['campaign_type'];
	switch ($campaign_type) {
		case 'oneweek':
			$fare=0.01;
		break;
		case 'twoweeks':
			$fare=0.05;
		break;		
		
	}
	$campaign_fund_raised=$money_class->GetCampaignAmountReceived($campaign_id);
	$campaign_fund_raised_a=$campaign_fund_raised['sum(amount)'];
	if($campaign_fund_raised_a==''){
		$campaign_fund_raised_a='0';
	}
	if($campaign_fund_raised_a>=$campaign_max_money){
		$to_status='will disable it';
		//Disable campaign:
		$disable=mysql_query("UPDATE campaigns SET enabled = '0' WHERE id = '".$campaign_id."';");
		//Send notif to liquidate campaign
		switch ($campaign_type) {
			case 'oneweek':
				$fare=0.01;
			break;
			case 'twoweeks':
				$fare=0.05;
			break;		
		
		}
		$total_fare=$campaign_fund_raised_a*$fare;
		$cabeceras = 'From: info@tuitflow.com' . "\r\n" .
    	'Reply-To: info@tuitflow.com' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();
		 $message='La campaña '.$campaign_id.' ha finalizado. Se han recaudado: '.$campaign_fund_raised_a.' y la comision a sustraer es de: '.$total_fare;
	 	mail("info@tuitflow.com", "La campaña: ".$campaign_id." ha finalizado.", $message,$cabeceras);
	}else{
		$to_status='nothing to do';
	}
	print("Campaign ".$campaign_id.": Max money limit -> ".$campaign_max_money.", Funds raised -> ".$campaign_fund_raised_a." -> I will do: ".$to_status."\n");
}



// Check if campaigns expires
print("\nChecking if campaigns expires:\n");
$find_active_campaignsn=mysql_query("SELECT id,created_at,campaign_type FROM campaigns WHERE enabled='1';");
while($campaign2=mysql_fetch_array($find_active_campaignsn)){
	$campaign_idd=$campaign2['id'];
	$campaign_created_at=$campaign2['created_at'];
	$campaign_type=$campaign2['campaign_type'];
	//Check if campaign must be active and if true, returns remaining time
		if($campaign_type=='oneweek'){
			$durationdays=7;
		}
		if($campaign_type=='twoweeks'){
			$durationdays=14;
		}
		$timestamp = strtotime($campaign_created_at);
		$now=time();
		if($timestamp+($durationdays*24*60*60)<$now){
			//campaign expired
			$to_status='expired, will disable it';
			//Disable campaign:
			$disable=mysql_query("UPDATE campaigns SET enabled = '0' WHERE id = '".$campaign_idd."';");
			//Send notif to liquidate campaign
				switch ($campaign_type) {
				case 'oneweek':
					$fare=0.01;
				break;
				case 'twoweeks':
					$fare=0.05;
				break;		
			
				}
				$campaign_fund_raised=$money_class->GetCampaignAmountReceived($campaign_idd);
				$campaign_fund_raised_a=$campaign_fund_raised['sum(amount)'];
				$total_fare=$campaign_fund_raised_a*$fare;
				$cabeceras = 'From: info@tuitflow.com' . "\r\n" .
		    	'Reply-To: info@tuitflow.com' . "\r\n" .
		    	'X-Mailer: PHP/' . phpversion();
				 $message='La campaña '.$campaign_idd.' ha finalizado. Se han recaudado: '.$campaign_fund_raised_a.' y la comision a sustraer es de: '.$total_fare;
			 	mail("info@tuitflow.com", "La campaña: ".$campaign_idd." ha finalizado.", $message,$cabeceras);
		}else{
			$to_status='on time, nothing to do';
		}
	$sum=$timestamp+($durationdays*24*60*60);
	print("Campaign ".$campaign_idd.": Created at - ".$campaign_created_at.", Now -> ".$sum." -> Type -> ".$campaign_type." -> I will do: ".$to_status." "."\n");
}







print("\n\nMy work here ends :D\n");
 ?>
