<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
require_once('url_slug.php');
$money_class=New MoneyStuff();
$user_class=New Users();
$various_class=New FunctionsAndVarious();
//var_dump($_POST);

$foto=$_FILES['campaign_imagen'];
$image_name=$various_class->UploadImage($foto);
if($image_name!=''){
		$img_to_insert=UPLOAD_PATH.'/'.$image_name;
	}else{
		$img_to_insert='';
	}
$name=$_POST['campaign_name'];
$friendly_url=url_slug($name);
$desc=$_POST['campaign_desc'];
$needed_money=$_POST['campaign_money_needed'];
$max_money=$_POST['campaign_money_max'];
$currency=$_SESSION['user_profile']['currency'];
$video_url=$_POST['campaign_utube_url'];
$campaign_type=$_POST['campaign_type'];
$user_id=$_SESSION['user_profile']['id'];
$save_campaign=$money_class->SaveNewCampaign($user_id, $name, $desc, $needed_money, $max_money, $currency, $img_to_insert, $video_url, $campaign_type,$friendly_url);
if($save_campaign==true){
	//print($save_campaign);
	printf("<script>document.location.href='campaign.php?id=".$save_campaign."'</script>;");
}else{
	print("FAILED");
}
?>