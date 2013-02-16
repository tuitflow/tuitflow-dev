<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$money_class=New MoneyStuff();
$user_class=New Users();
$from_user_id=$_GET['from_user_id']; // Logged user
$to_user_id=intval($_GET['to_user_id']); // This user will be recieve the money
$user_data=$_SESSION['user'][$to_user_id];
$access_token = $_SESSION['access_token'];
$user_profile=$_SESSION['user_profile'];
//var_dump($access_token);

//die();
if($user_data==''){
	
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$find_u=$connection->get('users/lookup', array('user_id' => $to_user_id));
	foreach ($find_u as $user_datad) {
	$user_data=get_object_vars($user_datad);
	}
	//var_dump($user_data);
	$_SESSION['user'][$to_user_id]=$user_data;
}
//var_dump($to_user_id);
//Check if from user is logged id
$user_logon_data=$_SESSION['user_profile'];
if($user_logon_data['id']!=$from_user_id){
	die('ERR');
}
$content=$_SESSION['content'];
$user_prof=get_object_vars($content);
//var_dump($user_data);
/*
print("This user will be recieve the payment: <br>");
print("<a href='profile.php?id=".$user_data['id']."' >".$user_data['name']." @".$user_data['screen_name']."</a><br>");
	print("<img src='".$user_data['profile_image_url_https']."' />"."<br>");
	print("twitts: ".$user_data['statuses_count']."<br>");
	print("followers: ".$user_data['followers_count']."<br>");
	print("following: ".$user_data['friends_count']."<br>");
	print("description: ".$user_data['description']."<br>");
	$status=get_object_vars($user_data['status']);
	print("Last tweet: <br>".$status['text']);
	echo "<br><br>";
*/
	
$page='send_money';
include ('html.index.php');
?>
