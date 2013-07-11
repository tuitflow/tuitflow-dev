<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$money_class=New MoneyStuff();
$user_class=New Users();
$campaign_id=$_GET['id'];
$campaign_friendly=$_GET['name'];
if($campaign_id==''){
	$campaign_friendly_name=$money_class->GetCampaignIdFromFriendly($campaign_friendly);
	$campaign_id=$campaign_friendly_name['id'];
}
$access_token = $_SESSION['access_token'];
$user_profile=$_SESSION['user_profile'];

//var_dump($to_user_id);
//Check if from user is logged id
$user_logon_data=$_SESSION['user_profile'];

$content=$_SESSION['content'];
$user_prof=get_object_vars($content);


// Get data from campaign
$campaign_data=$money_class->GetCampaignData($campaign_id);

// Extract user owner of campaign
$profile_id=$user_class->GetTwitterIdFromUserId($campaign_data['user_id']);
$access_token = $_SESSION['access_token'];
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
if($user_data==false){
	$user_data=$user_class->GetUSerFullProfileFromTwitter($profile_id);
	$user_data['profile_image_url_https']=$user_data['profile_img'];
	$user_data['friends_count']=$user_data['following_count'];
	$user_data['id']=$user_data['twitter_id'];
	if($user_data['id']=='' && $profile_id){
		//Twitter Query
		$find = $connection->get('users/lookup', array('user_id' => $profile_id));	
		//var_dump($find);
		foreach ($find as $user_data_p) {
				$user_data=get_object_vars($user_data_p);
				if($user_data['id']==''){
					printf("<script>document.location.href='index.php?error=ERR_USER_DONT_EXISTS'</script>;");
					die('ERR_USER_DONT_EXISTS'); //TODO HANDLE ERR
				}
		}
		
	}
}
if($scree_name_profile!=''){
	//Twitter Query
		$find = $connection->get('users/lookup', array('screen_name' => $scree_name_profile));	
		//var_dump($find);
		foreach ($find as $user_data_p) {
				$user_data=get_object_vars($user_data_p);
				if($user_data['id']==''){
					printf("<script>document.location.href='index.php?error=ERR_USER_DONT_EXISTS'</script>;");
					die('ERR_USER_DONT_EXISTS'); 
				}
		}
}

$page='campaign';
?>

<?php
include ('html.index.php');
?>