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
//Retrieve data from transaction hash
$hash=$_GET['id'];
$transaction=$money_class->RetrieveTransaction($hash);
//var_dump($transaction);die();

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    //User not logged
    //but, is user in app?
    $to_user_screen_name=$user_class->GetUSerScreenNameFromTwitterId($transaction['to_twitter_user_id']);
    $user_exists=$user_class->check_user_exists($to_user_screen_name, $transaction['to_twitter_user_id']);
	printf("<script>document.location.href='connect.php?message=INIT_SESSION'</script>;");
	die();
//Show this content in main index. User need log on.	
	/*
	if($transaction['anonymous']=='1'){
		$from_profile="Anonymous";
		print("<a>Anonymous User</a> <br>");
		print("<img src='".anonymous_profile_img."' />"."<br>");
		$currency=$user_class->GetUSerCurrency($transaction['from_user_id']);
		
	}else{
		$from_profile=$user_class->GetUSerFullProfile($transaction['from_user_id']);
		print("<a href='profile.php?id=".$from_profile['twitter_id']."' >".$from_profile['name']." @".$from_profile['screen_name']."</a> <br>");
		print("<img src='".$from_profile['profile_img']."' />"."<br>");
		print("followers: ".$from_profile['followers_count']."<br>");
		print("following: ".$from_profile['following_count']."<br>");
		$currency=$from_profile['currency'];
		
	}
	 */
	//User need start session to redeem 
}else{
	//User loged in app
	//var_dump($_SESSION['user_profile']);
$page='redeem_money_user';
include('html.index.php');
}


?>