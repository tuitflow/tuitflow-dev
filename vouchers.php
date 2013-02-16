<?php
session_start();
require_once('config.php');
require_once('classes.php');
$m=New MoneyStuff();
$promo_code=$_GET['promo_code'];
//Validate promo code and user session
$validate=$m->ValidateVoucher($promo_code);
if($validate==false){
	printf("<script>document.location.href='index.php?error=ERR_CODE_NOT_VALID'</script>;");
	die("ERR_CODE_NOT_VALID");
}
$user_logon_data=$_SESSION['user_profile'];
if($user_logon_data['id']==''){
	printf("<script>document.location.href='index.php?error=ERR_NO_SESSION'</script>;");
	die("ERR_NO_SESSION");
}

if($user_logon_data['currency']!=$validate['currency']){
	$amount=round($validate['amount']*$m->CurrencyExchange($user_logon_data['currency'], $validate['currency']),2);
}else{
	$amount=$validate['amount'];
}

$m->SumMoney($user_logon_data['id'], $amount);
$m->InsertPaymentVoucher($user_logon_data['id'], $validate['currency'], $validate['amount']);
$m->RedeemCode($promo_code);
printf("<script>document.location.href='index.php?message=VOUCHER_OK'</script>;");
?>