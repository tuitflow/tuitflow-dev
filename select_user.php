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

$user_post=$_POST['user_post'];
$access_token = $_SESSION['access_token'];
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

if($user_post!=''){
	
	
	
		//Fixs bug: FS#22 - Bug al buscar usuario en send money https://www.tuitflow.com/admin/bug/index.php?do=details&task_id=22
		$findme   = '@';
		$hasarroba = strpos($user_post, $findme);
		if($hasarroba!== false){
			$user_post=substr($user_post, 1);
		}
		//Twitter Query
		
		
		$find = $connection->get('users/lookup', array('screen_name' => $user_post));	
		if(is_array($find)){
		$user_data=get_object_vars($find[0]);
		//var_dump($user_data);
		}
		
}else{
	
	//error no user
	printf("<script>document.location.href='index.php?error=ERR_USER_DONT_EXISTS'</script>;");
	
}

if($user_data['id']==''){
	//error user dont exists
	printf("<script>document.location.href='index.php?error=ERR_USER_DONT_EXISTS'</script>;");
	
}

//if user exists, redirect to send_money
printf("<script>document.location.href='send_money.php?from_user_id=".$user_profile['id']."&to_user_id=".$user_data['id']."'</script>;");

?>
