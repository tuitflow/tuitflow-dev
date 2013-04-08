<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$user_class=New Users();
$money_class=New MoneyStuff();
$profile_id=intval($_GET['id']);
$scree_name_profile=$_GET['screen_name'];
$user_data=$_SESSION['user'][$profile_id];
//var_dump($_SESSION['user'][$profile_id]);
$content=$_SESSION['content'];
$user_prof=get_object_vars($content);
//TODO If $user_data dont exists, query from db and then from twitter



/* Create a TwitterOauth object with consumer/user tokens. */
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
$user_profile=$_SESSION['user_profile'];
//var_dump($user_data);
//This is the Profile page

/*
 * We recieve data from searched user with a $_SESSION. 
 * Now, must to check if is in app
 */


$user_exists=$user_class->check_user_exists($user_data['screen_name'], $user_data['id']);

//var_dump($user_exists);


/*
print("<a href='profile.php?id=".$user_data['id']."' >".$user_data['name']." @".$user_data['screen_name']."</a> ".$money_class->GenerateSendMoneyButton($_SESSION['user_profile']['id'], $user_data['id'])."<br>");
	print("<img src='".$user_data['profile_image_url_https']."' />"."<br>");
	print("twitts: ".$user_data['statuses_count']."<br>");
	print("followers: ".$user_data['followers_count']."<br>");
	print("following: ".$user_data['friends_count']."<br>");
	print("description: ".$user_data['description']."<br>");
	$status=get_object_vars($user_data['status']);
	print("Last tweet: <br>".$status['text']);
	echo "<br><br>";
*/
$page='profile';

include('html.index.php');
?>