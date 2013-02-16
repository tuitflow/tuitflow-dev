<?php
/*
 * tuitflow 2013 
 * 
 */
/* Load required lib files. */
session_start();
error_reporting(E_ALL); //TODO DEV ONLY
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$user_class=New Users();
$money_class=New MoneyStuff();
/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

//if already have $content, dont query it
if($_SESSION['content']==''){
/* If method is set change API call made. Test is called by default. */
	$content = $connection->get('account/verify_credentials');
	$_SESSION['content']=$content;

}else{
	$content=$_SESSION['content'];
}

//Ok, user auths us to access twitter data
$user_prof=get_object_vars($content);
//Check if user is already in DB
$user_check=$user_class->check_user_exists($user_prof[screen_name], $user_prof[id]);
//if not, create it
if($user_check==false && $user_prof[screen_name]!=''){
	
	//Create user
		//Retrieve timezone for currency & languaje
		$user_settings=$connection->get('account/settings'); //Get user settings from twitter API
		$user_settings_object=get_object_vars($user_settings);
		$languaje=$user_settings_object['language']; //Languaje
		//Timezone to extract Country
		$user_timezone_object=get_object_vars($user_settings_object['time_zone']);
		$user_time_zone=$user_timezone_object['tzinfo_name'];
		$user_continent=explode("/", $user_time_zone);
		switch ($user_continent[0]) {
				case 'Europe':
				$currency='EUR';
				break;
				case 'America':
				$currency='USD';
				break;
			default:
				$currency='EUR';
				break;
		}
	//Insert user
	$create_user=$user_class->insert_user($user_prof[screen_name], $user_prof[id], $user_prof[followers_count], $user_prof[friends_count], $user_prof[profile_image_url_https],$currency,$languaje);
	if($create_user!=false){
		//User created ok, now retrieve user data, followers, etc
		
	//GET FOLLOWERS
		//Get Followers ids 
			$test=$connection->get('followers/ids'); //Get Followers id from Twitter API
			$d = get_object_vars($test);
			$iii=0;
			foreach ($d['ids'] as $var) {
				//Insert follower id and user id in a relationship table
				$save_rel_f=$user_class->save_relationship($create_user, $var, NULL, NULL, NULL, NULL, 'FOLLOWER');
				//Users lookup API only accepts 100 ids in a time				
				if($iii<99){	
					if($id_list){
						$id_list=$id_list.$var.',';
					}else{
						$id_list=$var.',';
					}
				$iii++;
				}
				
			}
			//Get Followers data 
			//TODO Backgroud process to retrieve users data
			
			//Get followers data from lookup twitter api
			$users_lookup=$connection->get('users/lookup',array('user_id' => $id_list));// array('user_id' => $d['ids']));
			$i=0;
			foreach ($users_lookup as $user_data) {
				$user_data_par=get_object_vars($user_data);
				//Insert followers data data to DB
				$save_follower=$user_class->save_relationship($create_user, $user_data_par['id'], $user_data_par['screen_name'], $user_data_par['followers_count'], $user_data_par['friends_count'], $user_data_par['profile_image_url_https'], 'FOLLOWER');
				$i++;
			}
		//Get Followings SAME than followers
			$get_following=$connection->get('friends/ids');
			$dd = get_object_vars($get_following);
			$ii=0;
		
			foreach ($dd['ids'] as $var_f) {
				$save_rel=$user_class->save_relationship($create_user, $var_f, NULL, NULL, NULL, NULL, 'FOLLOWING');
				if($ii<99){	
					if($id_list_following){
						$id_list_following=$id_list_following.$var_f.',';
					}else{
						$id_list_following=$var_f.',';
					}
				$ii++;
				}
			
			}
		
		
			//Get Followings data
			$users_lookup_f=$connection->get('users/lookup',array('user_id' => $id_list_following));// array('user_id' => $d['ids']));
			//var_dump($id_list_following);die();
			$i=0;
			foreach ($users_lookup_f as $user_data_f) {
				$user_data_par_f=get_object_vars($user_data_f);
				//Insert data to DB
				$save_following=$user_class->save_relationship($create_user, $user_data_par_f['id'], $user_data_par_f['screen_name'], $user_data_par_f['followers_count'], $user_data_par_f['friends_count'], $user_data_par_f['profile_image_url_https'], 'FOLLOWING');
				$i++;
			}
			//End of create user process
			$user_profile['id']=$create_user;
			$user_profile['currency']=$currency;
			$user_profile['languaje']=$languaje;
			
			//Check if user has pendings to redeem.
			$money_class->GetPendingToRedeem($user_profile['id'], $user_prof[id]);
			
	}else{
		//TODO Handle this error
		echo "fail";
		die();
	}
}else{
	
	//User is already in Get user variables from DB
	$user_profile=$user_check;
	//Check if account is active
	$islocked=$user_class->IsAccountLocked($user_profile['id']);
	if($islocked==true){
		printf("<script>document.location.href='connect.php?error=LOCKED_USER'</script>;");
		die();
	}
	//Update last logon
	$user_class->UpdateLastLogon($user_profile['id']);
	
	
}
//Set session user profile
$_SESSION['user_profile']=$user_profile; 
if($_SESSION['user_profile']==''){
	//header('Location: ./connect.php');
}
//Here start the main page!!
$page="index";
include('html.index.php');
?>
