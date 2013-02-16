<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
require_once('payment.class.php');
/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];
$money_class=New MoneyStuff();
$user_class=New Users();

$user_logon_data=$_SESSION['user_profile'];
$content=$_SESSION['content'];
$user_prof=get_object_vars($content);
$user_profile=$_SESSION['user_profile'];
if($user_profile==''){
	die('no session cowboy');
}
//Get user account balance
$currency=$user_profile['currency'];
$balance=$user_class->GetBalance($_SESSION['user_profile']['id']);
if($currency=='USD'){
	$conversion=$money_class->CurrencyExchange("USD", "EUR");
	$limit=round(PAYPAL_MIN_GET*$conversion,2);
}else{
	$limit=PAYPAL_MIN_GET;
}
$amount=$_GET['amount'];
$paypal_to=$_GET['to'];


//print($amount." ".$currency." ".$paypal_to);

if($amount>$balance){
	die("ERR_NO_ENOUGH_BALANCE");
}
if($amount<$limit){
	die("ERR_MINIMUN_IS_".$limit.$currency);
}


// Set request-specific fields.
$emailSubject =urlencode(vEmailSubject);
$receiverType = urlencode('EmailAddress');
$currency = urlencode($currency);       // or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')

// Receivers
// Use '0' for a single receiver. In order to add new ones: (0, 1, 2, 3...)
// Here you can modify to obtain array data from database.
$receivers = array(0 => array('receiverEmail' => $paypal_to,
         'amount' => $amount,
         'uniqueID' => "id_001123", // 13 chars max
         'note' => "Tuitflow get my money")); // space again at beginning.
$receiversLenght = count($receivers);

// Add request-specific fields to the request string.
$nvpStr="&EMAILSUBJECT=$emailSubject&RECEIVERTYPE=$receiverType&CURRENCYCODE=$currency";

$receiversArray = array();

for($i = 0; $i < $receiversLenght; $i++) {
 $receiversArray[$i] = $receivers[$i];
}

foreach($receiversArray as $i => $receiverData) {
 $receiverEmail = urlencode($receiverData['receiverEmail']);
 $amount = urlencode($receiverData['amount']);
 $amount_gross=$amount;
 $amount= round($amount*PAYPAL_FARE_PER,2)+PAYPAL_FARE_FIX;
 
 $uniqueID = urlencode($receiverData['uniqueID']);
 $note = urlencode($receiverData['note']);
 $nvpStr .= "&L_EMAIL$i=$receiverEmail&L_Amt$i=$amount_gross&L_UNIQUEID$i=$uniqueID&L_NOTE$i=$note";
}


// Execute the API operation; see the PPHttpPost function above.
$httpParsedResponseAr = PPHttpPost('MassPay', $nvpStr);

//var_dump($nvpStr);


if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
{
 //Payment is ok, now record and substract the money
 $money_class->SubtractMoney($_SESSION['user_profile']['id'], $amount);
 $user_class->Record_user_log($_SESSION['user_profile']['id'], "Refund ".$amount." ".$currency." to paypal ".$paypal_to);
 $status='OK';
 $money_class->RecordPaypalRefund($_SESSION['user_profile']['id'], $amount, $currency, $status, $httpParsedResponseAr['CORRELATIONID']);
 //print($httpParsedResponseAr['ACK']."<br>");
 //print("ok ".$amount." ".$currency." ".$paypal_to);
 //exit('MassPay Completed Successfully: '.print_r($httpParsedResponseAr, true));
 printf("<script>document.location.href='index.php?message=PAYPAL_REFUND_OK&hash=".$hash."'</script>;");
}
else
{
 $status='KO '.$httpParsedResponseAr['L_SHORTMESSAGE0'];
 $money_class->RecordPaypalRefund($_SESSION['user_profile']['id'], $amount, $currency, $status, $httpParsedResponseAr['ACK']['CORRELATIONID']);
	
 //exit('MassPay failed: ' . print_r($httpParsedResponseAr, true));
 print("ERR_PAYPAL_REFUND_CONTACT_SUPPORT");
}
?>