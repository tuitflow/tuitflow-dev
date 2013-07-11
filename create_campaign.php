<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$money_class=New MoneyStuff();
$user_class=New Users();
$from_user_id=$_GET['user_id']; // Logged user
$access_token = $_SESSION['access_token'];
$user_profile=$_SESSION['user_profile'];

//var_dump($to_user_id);
//Check if from user is logged id
$user_logon_data=$_SESSION['user_profile'];

$content=$_SESSION['content'];
$user_prof=get_object_vars($content);


$page='create_campaign';
?>

<?php
include ('html.index.php');
?>
