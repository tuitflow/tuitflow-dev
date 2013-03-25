<?php
session_start();
//var_dump($user_profile);
$switch_lang=$user_profile['languaje'];
if($switch_lang==''){
	$switch_lang=substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}
switch ($switch_lang) {
	case 'es':
		include('lang_es.php');
	break;
	
	default;
	case 'en':
		include('lang_en.php');
	$switch_lang='en';
	break;
}



?>