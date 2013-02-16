<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

//var_dump($_SESSION['user_profile']);
$find_user=$_GET['find'];
$money_class=New MoneyStuff();
//try to find it in local DB


//if no result, try to find in twitter

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
//var_dump($connection);
//var_dump($access_token);
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
$user_class=New Users();
$money_class=New MoneyStuff();
/* If method is set change API call made. Test is called by default. */
//$content = $connection->get('account/verify_credentials');
$find = $connection->get('users/search', array('q' => $find_user));
$user_profile=$_SESSION['user_profile'];
//var_dump($find);
/*
foreach ($find as $user_object) {
	$user_result=get_object_vars($user_object);
	//print_r($user_result);
	$user_id_for_session=intval($user_result['id']);
	$_SESSION['user'][$user_id_for_session]=$user_result;
	//var_dump($_SESSION['user']);
	print("<a href='profile.php?id=".$user_result['id']."' >".$user_result['name']." @".$user_result['screen_name']."</a> ".$money_class->GenerateSendMoneyButton($_SESSION['user_profile']['id'], $user_result['id'])."<br>");
	print("<img src='".$user_result['profile_image_url_https']."' />"."<br>");
	print("twitts: ".$user_result['statuses_count']."<br>");
	print("followers: ".$user_result['followers_count']."<br>");
	print("following: ".$user_result['friends_count']."<br>");
	print("description: ".$user_result['description']."<br>");
	$status=get_object_vars($user_result['status']);
	print("Last tweet: <br>".$status['text']);
	echo "<br><br>";
}
 */
  
/*
foreach ($user_result as $user_result_single) {
	print_r($user_result_single);
	echo "<br><br>";
}
 * */
$page='finder';
include('html.index.php');
?>