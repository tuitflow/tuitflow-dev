<?php
// code modified from source: https://cms.paypal.com/cms_content/US/en_US/files/developer/nvp_MassPay_php.txt
// documentation: https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/howto_api_masspay
// sample code: https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/library_code

// eMail subject to receivers
$vEmailSubject = 'PayPal payment';

/** MassPay NVP example.
 *
 *  Pay one or more recipients. 
*/

// For testing environment: use 'sandbox' option. Otherwise, use 'live'.
// Go to www.x.com (PayPal Integration center) for more information.
$environment = 'sandbox'; // or 'beta-sandbox' or 'live'.

/**
 * Send HTTP POST Request
 *
 * @param string The API method name
 * @param string The POST Message fields in &name=value pair format
 * @return array Parsed HTTP Response body
 */
function PPHttpPost($methodName_, $nvpStr_)
{
 global $environment;

 // Set up your API credentials, PayPal end point, and API version.
 // How to obtain API credentials:
 // https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_NVPAPIBasics#id084E30I30RO
 
 //SandBox
 $API_UserName = urlencode('rebrok_1210252606_biz_api1.gmail.com');
 $API_Password = urlencode('1210252618');
 $API_Signature = urlencode('A9rfD3WYoUJqVqzSiLlmpeWx9IxiAH14Aq.s-ErUiVfg7cM5IVuFgKn-');
 //
 
 $API_Endpoint = "https://api-3t.paypal.com/nvp";
 if("sandbox" === $environment || "beta-sandbox" === $environment)
 {
  $API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
 }
 $version = urlencode('51.0');

 // Set the curl parameters.
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
 curl_setopt($ch, CURLOPT_VERBOSE, 1);

 // Turn off the server and peer verification (TrustManager Concept).
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, 1);

 // Set the API operation, version, and API signature in the request.
 $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

 // Set the request as a POST FIELD for curl.
 curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

 // Get response from the server.
 $httpResponse = curl_exec($ch);

 if(!$httpResponse)
 {
  exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
 }

 // Extract the response details.
 $httpResponseAr = explode("&", $httpResponse);

 $httpParsedResponseAr = array();
 foreach ($httpResponseAr as $i => $value)
 {
  $tmpAr = explode("=", $value);
  if(sizeof($tmpAr) > 1)
  {
   $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
  }
 }

 if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr))
 {
  exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
 }

 return $httpParsedResponseAr;
}

// Set request-specific fields.
$emailSubject =urlencode($vEmailSubject);
$receiverType = urlencode('EmailAddress');
$currency = urlencode('USD');       // or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')

// Receivers
// Use '0' for a single receiver. In order to add new ones: (0, 1, 2, 3...)
// Here you can modify to obtain array data from database.
$receivers = array(0 => array('receiverEmail' => "muzike_1312566608_per@gmail.com",
         'amount' => "1.00",
         'uniqueID' => "id_001", // 13 chars max
         'note' => " payment of commissions")); // space again at beginning.
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
 $uniqueID = urlencode($receiverData['uniqueID']);
 $note = urlencode($receiverData['note']);
 $nvpStr .= "&L_EMAIL$i=$receiverEmail&L_Amt$i=$amount&L_UNIQUEID$i=$uniqueID&L_NOTE$i=$note";
}


// Execute the API operation; see the PPHttpPost function above.
$httpParsedResponseAr = PPHttpPost('MassPay', $nvpStr);

if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
{
	print($httpParsedResponseAr['ACK']);
 exit('MassPay Completed Successfully: '.print_r($httpParsedResponseAr, true));
}
else
{
 exit('MassPay failed: ' . print_r($httpParsedResponseAr, true));
}

?>