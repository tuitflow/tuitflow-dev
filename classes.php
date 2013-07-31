<?php
class Users{
	
	//Checks if user exists. Returns user profile if true, and false if false (obviously :D)
	function check_user_exists($screen_name,$twitter_id){
		$user_check=mysql_query("SELECT id,languaje,currency FROM users WHERE screen_name = '".$screen_name."' AND twitter_id = '".$twitter_id."';");
		if(mysql_num_rows($user_check)>0){
			$user_profile=mysql_fetch_array($user_check);
			return $user_profile;
		}else{
			return false;
		}
	}
	//Insert user to DB and create account balance record
	function insert_user($screen_name,$twitter_id,$followers_count,$following_count,$profile_img,$currency,$languaje){
		$insert=mysql_query("INSERT INTO  `users` (`id` ,`screen_name` ,`twitter_id` ,`followers_count` ,`following_count` ,`profile_img` ,`created` ,`active`, `currency`, `languaje`)
		VALUES (NULL ,  '".$screen_name."',  '".$twitter_id."',  '".$followers_count."',  '".$following_count."',  '".$profile_img."',CURRENT_TIMESTAMP ,  '1', '".$currency."','".$languaje."');");
		if (!$insert) {
			return false;
    		die('Invalid query: ' . mysql_error());
		}else{
			//Create account_balance record
			
			$quer=mysql_query("SELECT id FROM users WHERE `twitter_id` = '".$twitter_id."'; ");
			$login_user_id=mysql_fetch_array($quer);
			
			if($followers_count>=MINIMUM_FOLLOWERS_TO_GET_INITIAL){
				$initial_payment=mysql_query("INSERT INTO  `paypal_payments` (`id` ,`hash` ,`amount` ,`currency` ,`user_id` ,`status` ,`date`)VALUES (NULL ,  'INITIAL_PAYMENT',  '".START_ACCOUNT_BALANCE."',  '".$currency."',  '".$login_user_id['id']."',  '1',CURRENT_TIMESTAMP);");
				$account=mysql_query("INSERT INTO  `account_balance` (`id` ,`user_id` ,`balance` ,`last_transaction`)VALUES (NULL ,  '".$login_user_id['id']."',  '".START_ACCOUNT_BALANCE."', CURRENT_TIMESTAMP);");
			}else{
				$account=mysql_query("INSERT INTO  `account_balance` (`id` ,`user_id` ,`balance` ,`last_transaction`)VALUES (NULL ,  '".$login_user_id['id']."',  '', CURRENT_TIMESTAMP);");
			}
			return $login_user_id['id'];
		}
	}
	//Save relationship between two twitter users.
	function save_relationship($user_id,$follower_twitter_id,$screen_name,$followers_count,$following_count,$profile_img,$relationship_type){
		if($relationship_type=='FOLLOWER'){
			//Save follower data
			$insert_rel=mysql_query("INSERT INTO  `followers` (`id` ,`user_id` ,`follower_twitter_id` ,`screen_name` ,`follower_followers_count` ,`follower_following_count` ,`profile_img`)VALUES (
			NULL ,  '".$user_id."',  '".$follower_twitter_id."',  '".$screen_name."',  '".$followers_count."',  '".$following_count."',  '".$profile_img."') ON DUPLICATE KEY UPDATE `screen_name` = '".$screen_name."',`follower_followers_count` = '".$followers_count."',`follower_following_count` = '".$following_count."',`profile_img` = '".$profile_img."' ;");
			
			if (!$insert_rel) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				return true;
			}

		}else{
			//Following
			$insert_rel=mysql_query("INSERT INTO  `followings` (`id` ,`user_id` ,`following_twitter_id` ,`screen_name` ,`following_followers_count` ,`following_following_count` ,`profile_img`)VALUES (
			NULL ,  '".$user_id."',  '".$follower_twitter_id."',  '".$screen_name."',  '".$followers_count."',  '".$following_count."',  '".$profile_img."') ON DUPLICATE KEY UPDATE `screen_name` = '".$screen_name."',`following_followers_count` = '".$followers_count."',`following_following_count` = '".$following_count."',`profile_img` = '".$profile_img."' ;");
			
			if (!$insert_rel) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				return true;
			}
			
		}
		
	}
	//Get Currency logo
	function GetCurrencyLogo($currency){
		if($currency=='USD'){
			$cur_logo='$';	
		}
		if($currency=='EUR'){
			$cur_logo='&euro;';	
		}

		return $cur_logo;
	}
	//Returns user balance 
	function GetBalance($id){
		$verbal=mysql_query("SELECT `balance` FROM `account_balance` WHERE `user_id` = '$id'");
		$user_bal=mysql_fetch_array($verbal);
		$balance=$user_bal['balance'];
		if($balance==''){
			$balance='0.00';
		}
		return $balance;	
	}
	
	//Get user screen name
	function GetUSerScreenName($user_id){
		$getscreen=mysql_query("SELECT screen_name FROM users WHERE id = '".$user_id."';");
		$user_data_s=mysql_fetch_array($getscreen);
		return $user_data_s['screen_name'];
	}
		//Get user screen name
	function GetUSerScreenNameFromTwitterId($user_twitter_id){
		$getscreen=mysql_query("SELECT screen_name FROM users WHERE twitter_id = '".$user_twitter_id."';");
		$user_data_s=mysql_fetch_array($getscreen);
		return $user_data_s['screen_name'];
	}
	//Get user currency
	function GetUSerCurrency($user_id){
		$getcurrency=mysql_query("SELECT currency FROM users WHERE id = '".$user_id."';");
		$user_data_sc=mysql_fetch_array($getcurrency);
		return $user_data_sc['currency'];
	}	
		//Get user full profile
	function GetUSerFullProfile($user_id){
		$getprof=mysql_query("SELECT screen_name,twitter_id,followers_count,following_count,profile_img,currency,languaje FROM users WHERE id = '".$user_id."';");
		$user_data_p=mysql_fetch_array($getprof);
		return $user_data_p;
	}
			//Get user id from twitter id
	function GetUSerIdFromTwitterId($user_twitter_id){
		$getscreena=mysql_query("SELECT id FROM users WHERE twitter_id = '".$user_twitter_id."';");
		$user_data_sa=mysql_fetch_array($getscreena);
		return $user_data_sa['id'];
	}
				//Get twitter id from user id
	function GetTwitterIdFromUserId($user_id){
		$getscreena=mysql_query("SELECT twitter_id FROM users WHERE id = '".$user_id."';");
		$user_data_sa=mysql_fetch_array($getscreena);
		return $user_data_sa['twitter_id'];
	}
	
	function GetDescatadosActivity(){
		$view_highlights=mysql_query("SELECT a.anonymous,a.from_user_id,a.to_twitter_user_id,a.date,a.amount,b.followers_count,b.twitter_id,b.screen_name,c.screen_name as dest_screen_name,b.profile_img,c.profile_img as dest_profile_img,b.currency,c.twitter_id as dest_twitter_id FROM transactions a LEFT JOIN users b ON (a.from_user_id=b.id) LEFT JOIN users c ON (a.to_twitter_user_id=c.twitter_id) WHERE (SELECT twitter_id FROM users WHERE twitter_id = a.to_twitter_user_id)  ORDER BY b.followers_count DESC, a.date DESC LIMIT 12;");
		$i=0;
		while($view_h=mysql_fetch_array($view_highlights)){
		$highlights[$i]=$view_h;		
		$i++;
		}
		
		
		return $highlights;
	}
	
		function GetAllActivity(){
		$view_highlights=mysql_query("SELECT a.anonymous,a.from_user_id,a.to_twitter_user_id,a.date,a.amount,b.followers_count,b.twitter_id,b.screen_name,c.screen_name as dest_screen_name,b.profile_img,c.profile_img as dest_profile_img,b.currency,c.twitter_id as dest_twitter_id FROM transactions a LEFT JOIN users b ON (a.from_user_id=b.id) LEFT JOIN users c ON (a.to_twitter_user_id=c.twitter_id) WHERE (SELECT twitter_id FROM users WHERE twitter_id = a.to_twitter_user_id)  ORDER BY a.date DESC LIMIT 12;");
		$i=0;
		while($view_h=mysql_fetch_array($view_highlights)){
		$highlights[$i]=$view_h;		
		$i++;
		}
		
		
		return $highlights;
	}
	
	//Get user full profile from twitter
	function GetUSerFullProfileFromTwitter($twitter_id){
		$getproft=mysql_query("SELECT screen_name,twitter_id,followers_count,following_count,profile_img,currency,languaje FROM users WHERE twitter_id = '".$twitter_id."';");
		$user_data_pt=mysql_fetch_array($getproft);
		return $user_data_pt;
	}
	
	//Get my activity
	
	function GetMyActivity($user_id,$twitter_id){
		$get_myactivity=mysql_query("SELECT a.from_user_id, a.to_twitter_user_id, a.date, a.amount, b.followers_count, b.twitter_id, b.screen_name, c.screen_name AS dest_screen_name, b.profile_img, c.profile_img AS dest_profile_img, b.currency, c.twitter_id AS dest_twitter_id FROM transactions a LEFT JOIN users b ON ( a.from_user_id = b.id ) LEFT JOIN users c ON ( a.to_twitter_user_id = c.twitter_id ) WHERE a.anonymous =  '0' AND (
		SELECT twitter_id
		FROM users
		WHERE twitter_id = a.to_twitter_user_id
		)
		AND (
		a.to_twitter_user_id =  '".$twitter_id."'
		OR a.from_user_id =  '".$user_id."'
		)
		ORDER BY a.date DESC 
		LIMIT 3;");
		$i=0;
		while($view_ha=mysql_fetch_array($get_myactivity)){
		$highlightsa[$i]=$view_ha;		
		$i++;
		}
		return $highlightsa;
	}
	
	function FollowersTopByAmount($user_id){
		$ver_followerstop=mysql_query("SELECT a.screen_name,a.twitter_id,a.profile_img,a.currency,(select SUM(amount) from transactions WHERE to_twitter_user_id = c.to_twitter_user_id) as total_amount FROM `users` a LEFT JOIN transactions c ON (a.twitter_id=c.to_twitter_user_id) WHERE to_twitter_user_id = (SELECT follower_twitter_id FROM followers WHERE user_id ='".$user_id."' AND follower_twitter_id = c.to_twitter_user_id) GROUP BY c.to_twitter_user_id ORDER BY total_amount DESC;");
		$i=0;
		while($follower=mysql_fetch_array($ver_followerstop)){
			$folltop[$i]=$follower;
			$i++;
		}
		return $folltop;
	}
	
	function FollowingsTopByAmount($user_id){
		$ver_followerstop=mysql_query("SELECT a.screen_name,a.twitter_id,a.profile_img,a.currency,(select SUM(amount) from transactions WHERE to_twitter_user_id = c.to_twitter_user_id) as total_amount FROM `users` a LEFT JOIN transactions c ON (a.twitter_id=c.to_twitter_user_id) WHERE to_twitter_user_id = (SELECT following_twitter_id FROM followings WHERE user_id ='".$user_id."' AND following_twitter_id = c.to_twitter_user_id) GROUP BY c.to_twitter_user_id ORDER BY total_amount DESC;");
		$i=0;
		while($follower=mysql_fetch_array($ver_followerstop)){
			$folltop[$i]=$follower;
			$i++;
		}
		return $folltop;
	}
	
	function ChangeLang($lang,$user_id){
	
		$update_lang=mysql_query("UPDATE users SET languaje = '".$lang."' WHERE id = '".$user_id."';");
		if (!$update_lang) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				return true;
		}
	}
	
	function ChangeCurr($curr,$user_id){
	
		$update_lang=mysql_query("UPDATE users SET currency = '".$curr."' WHERE id = '".$user_id."';");
		if (!$update_lang) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				return true;
		}
	}
	
	function GetFriendsActivity($user_id){
		$ver_friends=mysql_query("SELECT a.anonymous,a.from_user_id,a.to_twitter_user_id,a.date,a.amount,b.followers_count,b.twitter_id,b.screen_name,c.screen_name as dest_screen_name,b.profile_img,c.profile_img as dest_profile_img,b.currency,c.twitter_id as dest_twitter_id FROM transactions a LEFT JOIN users b ON (a.from_user_id=b.id) LEFT JOIN users c ON (a.to_twitter_user_id=c.twitter_id) WHERE (SELECT twitter_id FROM users WHERE twitter_id = a.to_twitter_user_id) AND to_twitter_user_id = (SELECT follower_twitter_id FROM followers WHERE user_id ='".$user_id."' AND follower_twitter_id = to_twitter_user_id)  ORDER BY b.followers_count DESC, a.date DESC LIMIT 12");
		$i=0;
		while($view_fa=mysql_fetch_array($ver_friends)){
		$highlightsa[$i]=$view_fa;		
		$i++;
		}
		return $highlightsa;
	}
	
	function Record_user_log($user_id,$action){
		$record=mysql_query("INSERT LOW_PRIORITY INTO  `user_logs` (`id` ,`user_id` ,`action` ,`date`)VALUES (NULL ,  '".$user_id."',  '".$action."',CURRENT_TIMESTAMP);");
		return true;
	}
	
	function IsAccountLocked($user_id){
		$ver_user_status=mysql_query("SELECT active FROM users WHERE id = '".$user_id."' AND active = '0';");
		$user_status=mysql_fetch_array($ver_user_status);
		if($user_status){
			return true;
		}else{
			return false;
		}
		
	}
	
	function GetUserEntropy($user_id){
		$total_trans=mysql_query("SELECT count(*) as transn FROM transactions WHERE `from_user_id` = '".$user_id."';");
		$transn=mysql_fetch_array($total_trans);
		$total_trans=$transn['transn'];
		
		$user_trans=mysql_query("SELECT COUNT(*) as user_count FROM (SELECT count(to_twitter_user_id) as counter, `to_twitter_user_id` FROM `transactions` WHERE `from_user_id` = '".$user_id."' GROUP by `to_twitter_user_id`)as B;");
		$transu=mysql_fetch_array($user_trans);
		$user_unique=$transu['user_count'];
		if($total_trans>0 && $user_unique>0){
			$entropy=round($user_unique/$total_trans*100);
		}else{
			$entropy='100';
		}
		return $entropy;
	}
	function GetUserTrans($user_id){
		$total_trans=mysql_query("SELECT count(*) as transn FROM transactions WHERE `from_user_id` = '".$user_id."';");
		$transn=mysql_fetch_array($total_trans);
		$total_trans=$transn['transn'];
		return $total_trans;
		
	}
	
	function KnowIfUsersAlreadyTrans($user_id,$twitter_to_id){
		$view_trans=mysql_query("SELECT id FROM transactions WHERE from_user_id = '".$user_id."' AND to_twitter_user_id ='".$twitter_to_id."';");
		$trans_v=mysql_fetch_array($view_trans);
		if($trans_v){
			return true;
		}else{
			return false;
		}
	}
	
	function UpdateLastLogon($user_id){
		$now=date("Y-m-d H:i:s", time());
		$update_query=mysql_query("UPDATE LOW_PRIORITY `users` SET  `last_logon` =  '".$now."' WHERE  `id` ='".$user_id."';");
		return true;
	}
	
	function LockAcc($user_id){
		$query=mysql_query("UPDATE users SET active = '0' WHERE id = '".$user_id."'");
		return true;
		
	}
		//With great power, comes great responsibility. USE CAREFULLY
		function GetAllUsersScreenName(){
		$ver_users=mysql_query("SELECT screen_name FROM users WHERE active = '1' ORDER BY id ASC;");
		$i=0;
		while($uss=mysql_fetch_array($ver_users)){
			$userr[$i]=$uss;
			$i++;
		}
		return $userr;
		}
		
		function InsertUserRelationshipValue($screen_name,$remote_screen_name,$value){
			//Get current value
			$cur=mysql_query("SELECT current_value FROM good_relationships WHERE user_screen_name = '".$screen_name."' AND remote_twitter_screen_name = '".$remote_screen_name."';");
			$get_v=$cur['current_value'];
			$value=$get_v+$value;
			$insert_value=mysql_query("INSERT INTO  `good_relationships` (`id` ,`user_screen_name` ,`remote_twitter_screen_name` ,`timestamp` ,`current_value`)VALUES (NULL ,  '".$screen_name."',  '".$remote_screen_name."',CURRENT_TIMESTAMP ,  '".$value."');");
			return true;
		}
}
class MoneyStuff{
		
	function GenerateSendMoneyButton($from_user_id,$to_user_id){
		$button="<a class='font_followers' href='send_money.php?from_user_id=".$from_user_id."&to_user_id=".$to_user_id."'><img id='send_money_button' border='0' src='".coin_icon."' /> </a>";
		return $button;
	}
		function GenerateCreateCampaignButton($user_id){
		$button="<a class='font_followers' href='create_campaign.php?user_id=".$user_id."'><img id='coins' border='0' style='width:auto;height:24px' src='".moneditas_icon."' /> </a>";
		return $button;
	}
	
	function SubtractMoney($user_id,$amount){
		$insert_query=mysql_query("UPDATE `account_balance` SET `balance` = (SELECT `balance` - '".$amount."' FROM (SELECT `balance` FROM `account_balance` WHERE `user_id` = '".$user_id."') as x) WHERE `user_id` = '".$user_id."';");
			if (!$insert_query) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				return true;
			}
		
	}
	
	function SumMoney($user_id,$amount){
		
		$insert_query=mysql_query("UPDATE `account_balance` SET `balance` = (SELECT `balance` + '".$amount."' FROM (SELECT `balance` FROM `account_balance` WHERE `user_id` = '".$user_id."') as x) WHERE `user_id` = '".$user_id."';");
			if (!$insert_query) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				return true;
			}
		
	}
	
	function RetrieveTransaction($hash){
		$viewtrans=mysql_query("SELECT from_user_id,to_twitter_user_id,date,redeemed,amount,anonymous,hash FROM transactions WHERE hash = '".$hash."';");
		$transaction=mysql_fetch_array($viewtrans);
		return $transaction;
	}
	
	function RedeemTransaction($hash){
		$redeem=mysql_query("UPDATE `transactions` SET `redeemed` = '1' WHERE `hash` = '".$hash."';");
			if (!$redeem) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				return true;
			}
	}

	function GetMoneyRecieved($user_twitter_id){
		$getmoney=mysql_query("SELECT sum(amount) FROM `transactions` WHERE `to_twitter_user_id` ='".$user_twitter_id."' AND redeemed = '1';");
		$fetch_money=mysql_fetch_array($getmoney);
		if($fetch_money['sum(amount)']==''){
			return '0';
		}
		return $fetch_money['sum(amount)'];
	}

	function GetMoneySent($user_id){
		$getmoney=mysql_query("SELECT sum(amount) FROM `transactions` WHERE `from_user_id` ='".$user_id."' AND redeemed = '1';");
		$fetch_money=mysql_fetch_array($getmoney);
		if($fetch_money['sum(amount)']==''){
			return '0';
		}
		return $fetch_money['sum(amount)'];
	}
	
	function GetBalanceMovements($user_id){
		$get_mov=mysql_query("SELECT amount,currency,date,hash FROM paypal_payments WHERE user_id = '".$user_id."' AND status = '1' ORDER BY date DESC LIMIT 10;");
		$i=0;
		while($movements=mysql_fetch_array($get_mov)){
			$movement[$i]=$movements;
			$i++;
		}
		return $movement;
	}
	
	function GetMyMovements($user_id,$twitter_id){
		$get_mo=mysql_query("SELECT date,amount,to_twitter_user_id,from_user_id,anonymous FROM transactions WHERE to_twitter_user_id = '".$twitter_id."' ORDER BY date DESC LIMIT 10;");
		$i=0;
		while($move=mysql_fetch_array($get_mo)){
			$movement[$i]=$move;
			$i++;
		}
		return $movement;
	}
	
	function CurrencyExchange($curr_dest,$curr_from){
		$ver_exchange_rate=mysql_query("SELECT conversion FROM currencies WHERE orig = '".$curr_from."' AND dest = '".$curr_dest."';");
		$res=mysql_fetch_array($ver_exchange_rate);
		$conversion=$res['conversion'];
		return $conversion;
		
	}
	
	function UpdateBalanceChangeCurr($user_id,$curr_dest,$curr_from){
	 $view_balance=mysql_query("SELECT balance FROM account_balance WHERE user_id = '".$user_id."';");
	 $balance=mysql_fetch_array($view_balance);
	 $conversion=$this->CurrencyExchange($curr_dest,$curr_from);
	 $new_balance=round($balance['balance']*$conversion,2);
	 $save_to=mysql_query("UPDATE account_balance SET balance = '".$new_balance."' WHERE user_id = '".$user_id."';");
	 
	 if (!$save_to) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				return $curr_dest."- ".$curr_from." - ".$conversion."-".$new_balance;
			}
		
	}
	
	function RecordPaypalRefund($user_id,$amount,$currency,$status,$hash){
		$insertar_query=mysql_query("INSERT LOW_PRIORITY INTO  `paypal_refunds` (`id` ,`hash` ,`amount` ,`currency` ,`user_id` ,`status` ,`date`)VALUES (NULL ,  '".$hash."',  '".$amount."',  '".$currency."',  '".$user_id."',  '".$status."',CURRENT_TIMESTAMP);");
		return true;
		
	}
	
	function GetMoneyManagedTime($hours){
		$hourstime=time()-($hours*60*60);
		$init=date("Y-m-d H:i:s", $hourstime);
		$end=date("Y-m-d H:i:s", time());
		
		$ver_quer=mysql_query("SELECT SUM(amount) FROM `transactions` WHERE `date` > '".$init."' AND `date` < '".$end."';");
		$_fecht=mysql_fetch_array($ver_quer);
		if($_fecht['SUM(amount)']==''){
			return '0';
		}
		return $_fecht['SUM(amount)'];
	}
	
	function ValidateVoucher($code){
		$now=date("Y-m-d H:i:s", time());
		$ver_code=mysql_query("SELECT amount, currency FROM vouchers WHERE promo_code = '".$code."' AND redeemed ='0' AND valid_until > '".$now."';");
		$code=mysql_fetch_array($ver_code);
		if($code['amount']!=''){
			return $code;
		}else{
			return false;
		}
	}
	function InsertPaymentVoucher($user_id,$currency,$amount){
		$initial_payment=mysql_query("INSERT INTO  `paypal_payments` (`id` ,`hash` ,`amount` ,`currency` ,`user_id` ,`status` ,`date`)VALUES (NULL ,  'VOUCHER_CODE',  '".$amount."',  '".$currency."',  '".$user_id."',  '1',CURRENT_TIMESTAMP);");
		return true;
	}
	function RedeemCode($code){
		$redeem=mysql_query("UPDATE `vouchers` SET redeemed = '1' WHERE promo_code = '".$code."';");
		return true;
	}
	
	function GetPendingToRedeem($user_id,$twitter_id){
		$get_pending=mysql_query("SELECT amount,hash FROM transactions WHERE redeemed = '0' AND to_twitter_user_id = '".$twitter_id."';");
		while($pending=mysql_fetch_array($get_pending)){
			$amount_to_sum=$pending['amount'];
			$this->SumMoney($user_id, $amount_to_sum);
			$this->RedeemTransaction($pending['hash']);
		}
		return true;
	}

	function SaveNewCampaign($user_id,$name,$desc,$needed_money,$max_money,$currency,$image_url,$video_url,$campaign_type,$friendly_url){
		$insertar=mysql_query("INSERT INTO  `campaigns` (`id` ,`user_id` ,`name` ,`description` ,`needed_money` ,`max_money` ,`currency` ,`image_url` ,`video_url` ,`campaign_type` ,`created_at` ,`enabled` , `friendly_url`)VALUES (NULL ,  '".$user_id."',  '".$name."',  '".$desc."',  '".$needed_money."',  '".$max_money."',  '".$currency."',  '".$image_url."',  '".$video_url."',  '".$campaign_type."', CURRENT_TIMESTAMP ,  '1','".$friendly_url."');		");
		 if (!$insertar) {
				return false;
    			die('Invalid query: ' . mysql_error());
			}else{
				$ver_insert=mysql_query("SELECT id FROM campaigns WHERE `user_id` = '".$user_id."' ORDER BY id DESC LIMIT 1;");
				$id_camp=mysql_fetch_array($ver_insert);
				return $id_camp['id'];
			}
	}
	
	function GetCampaignData($campaign_id){
		$ver_campaign=mysql_query("SELECT user_id, name, description, needed_money, max_money, currency, image_url, video_url , campaign_type, created_at, enabled, friendly_url FROM campaigns WHERE id = '".$campaign_id."'");
		$campaign=mysql_fetch_array($ver_campaign);
		return $campaign;
	}
	
	function GetCampaignIdFromFriendly($campaign_name){
		$ver_campaign=mysql_query("SELECT id FROM campaigns WHERE friendly_url = '".$campaign_name."'");
		$campaign=mysql_fetch_array($ver_campaign);
		return $campaign;
	}
	function GetCampaignOwner($campaign_id){
		$ver_campaign=mysql_query("SELECT user_id FROM campaigns WHERE id = '".$campaign_id."'");
		$campaign=mysql_fetch_array($ver_campaign);
		return $campaign;
	}
	
	function GetCampaignAmountReceived($campaign_id){
		$ver_campaign=mysql_query("SELECT sum(amount) FROM campaign_transactions WHERE campaign_id = '".$campaign_id."'");
		$campaign=mysql_fetch_array($ver_campaign);
		return $campaign;
	}
	
	function IsCampaingActive($campaign_id,$created_at,$campaign_type){
		$remainingtime=array();
		//Check if campaign must be active and if true, returns remaining time
		if($campaign_type=='oneweek'){
			$durationdays=7;
		}
		if($campaign_type=='twoweeks'){
			$durationdays=14;
		}
		$timestamp = strtotime($created_at);
		$now=time();
		if($timestamp+($durationdays*24*60*60)<$now){
			//campaign expired
			$remtime=false;
		}else{
			//campaign on time
			$remainingtime=($timestamp+($durationdays*24*60*60))-$now;
			if($remainingtime>86400){
				//is greater than day
				$remtime['value']=ceil($remainingtime/60/60/24);
				$remtime['scale']='days';
			}else{
				if($remainingtime>3600){
				//only hours
				$remtime['value']=ceil($remainingtime/60/60);
				$remtime['scale']='hours';
				}else{
					//minutes
					$remtime['value']=ceil($remainingtime/60);
					$remtime['scale']='minutes';
				}
			}
		}
		
		return $remtime;
		
	}
	
		function GetMyCampaigns($user_id){
		$get_mov=mysql_query("SELECT id,user_id, name, description, needed_money, max_money, currency, image_url, video_url , campaign_type, created_at, enabled, friendly_url FROM campaigns WHERE user_id = '".$user_id."' ORDER BY created_at DESC LIMIT 100;");
		$i=0;
		while($movements=mysql_fetch_array($get_mov)){
			$movement[$i]=$movements;
			$i++;
		}
		return $movement;
		}
		function GetLastCampaigns(){
			$get_mov=mysql_query("SELECT id,user_id, name, description, needed_money, max_money, currency, image_url, video_url , campaign_type, created_at, enabled, friendly_url FROM campaigns ORDER BY created_at DESC LIMIT 5;");
			$i=0;
			while($movements=mysql_fetch_array($get_mov)){
				$movement[$i]=$movements;
				$i++;
			}
		return $movement;
		}
		
		
		
}

class FunctionsAndVarious{
		function UploadImage($image){
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$extension = end(explode(".", $image["name"]));
		if ((($image["type"] == "image/gif")
		|| ($image["type"] == "image/jpeg")
		|| ($image["type"] == "image/jpg")
		|| ($image["type"] == "image/pjpeg")
		|| ($image["type"] == "image/x-png")
		|| ($image["type"] == "image/png"))
		&& ($image["size"] < MAX_UPLOAD_SIZE)
		&& in_array($extension, $allowedExts))
		  {
		  if ($image["error"] > 0)
		    {
		    return false;
		    } else {
			$final_name=$this->GetRandomChars(10).$image["name"];
		    move_uploaded_file($image["tmp_name"], UPLOAD_PATH . $final_name);
		    return $final_name; 
		    }
		  }
		else
		  {
		 return false;
		  }
	}
	
	function GetRandomChars($len){
		$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
		shuffle($seed); // probably optional since array_is randomized; this may be redundant
		$rand = implode('', array_rand($seed, $len));
		return $rand;
	}
}
?>
