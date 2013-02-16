<?php
session_start();
include('config.php');
include('classes.php');
$user_class=New Users();
$money_class=New MoneyStuff();
$task=$_GET['task'];


switch ($task) {
	case 'CHANGE_LANG':
		$user_logon_data=$_SESSION['user_profile'];
		if($user_logon_data!=''){
			$lang=$_GET['lang'];
			$lang=strtolower($lang);
			$process_change=$user_class->ChangeLang($lang,$user_logon_data['id']);
			print("Languaje changed!");
		}
	break;
	
	case 'CHANGE_CURR':
		$curr=$_GET['curr'];
		$user_logon_data=$_SESSION['user_profile'];
		if($user_logon_data!=''){
			if($curr!=$user_logon_data['currency']){
				$process_change=$user_class->ChangeCurr($curr,$user_logon_data['id']);
				$change_balance=$money_class->UpdateBalanceChangeCurr($user_logon_data['id'], $curr , $user_logon_data['currency']);
				//var_dump($change_balance);die();
				$record=$user_class->Record_user_log($user_logon_data['id'], "User changed currency from ".$user_logon_data['currency']." to ".$curr);
				print("Currency changed!");
			}
		}
	break;
	default:
		
	break;
}
?>
