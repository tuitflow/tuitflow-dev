<?php
session_start();
require_once('config.php');
require_once('classes.php');
require_once('paypal.class.php');  // include the class file
$m=New MoneyStuff();
$p = new paypal_class;             // initiate an instance of the class
$p->paypal_url = $url_pay;   // testing paypal url
//$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url

// setup a variable for this script (ie: 'http://www.micahcarrick.com/paypal.php')
$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

// if there is not action variable, set the default action of 'process'
if (empty($_GET['action'])) $_GET['action'] = 'process';

switch ($_GET['action']) {

   case 'process':      // Process and order...
       
    

	  //Generate hash
	  $hash=md5($_SESSION['user_profile']['id'].time()."EsEHPayPaLdame1leuro");
	  $secure=md5($hash.PAYPAL_SECRET_HASH);
	  $amount_b=$_GET['amount_c'];
	  $amount=round($_GET['amount_c']*PAYPAL_FARE_PER,2)+PAYPAL_FARE_FIX;
   	  $currency=$_GET['currency'];
	  $to_user_id=$_GET['to_user_id'];
	  $insert_paypal=mysql_query("INSERT INTO  `develop`.`paypal_payments` (`id` ,`hash` ,`amount` ,`user_id` ,`status` ,`date`,`currency`)VALUES (
NULL ,  '".$hash."',  '".$amount_b."',  '".$_SESSION['user_profile']['id']."',  '0', CURRENT_TIMESTAMP,'".$currency."');");
      $p->add_field('business', $account_pay);
      $p->add_field('return', $this_script.'?action=success&secure='.$secure.'&hash='.$hash.'&to_user_id='.$to_user_id);
      $p->add_field('cancel_return', $this_script.'?action=cancel&hash='.$hash.'&to_user_id='.$to_user_id);
      $p->add_field('notify_url', $this_script.'?action=ipn');
      $p->add_field('item_name', 'Add cash to tuitflow account ');
      $p->add_field('currency_code', $currency);
      $p->add_field('amount', $amount);

      $p->submit_paypal_post(); // submit the fields to paypal
      //$p->dump_fields();      // for debugging, output a table of all the fields
      break;

   case 'success':
                


                //Pago correcto

                //Fin

                //Comprobar que no sea la ultima participacion

                //
      $hash=$_GET['hash'];
      $secure=md5($hash.PAYPAL_SECRET_HASH);
      if($secure!=$_GET['secure']){
      	die('ERR_HASH_CHECK_FAILED');
      }
      $get_amount=mysql_query("SELECT amount,user_id FROM `paypal_payments` WHERE `hash` = '".$hash."' AND `status` = '0';");
	  $get_am=mysql_fetch_array($get_amount);
	  $amount=$get_am['amount'];
	  $user_id_sum=$get_am['user_id'];
      $sum=$m->SumMoney($user_id_sum, $amount);
	  $save_trans=mysql_query("UPDATE `paypal_payments` SET `status` = '1' WHERE `hash` = '".$hash."';");
	  $to_user_id=$_GET['to_user_id'];
	  //Sum money to user account balance
      echo "<html><head></head><body><h3>processing...</h3>";
	  if($to_user_id==''){
	  	 printf("<script>document.location.href='index.php?message=PAYPAL_REFILL_OK'</script>;");
	  }else{
	  	 printf("<script>document.location.href='send_money.php?from_user_id=".$user_id_sum."&to_user_id=".$to_user_id."'</script>;");
	  }
		
    //  foreach ($_POST as $key => $value) { echo "$key: $value<br>"; }
      echo "</body></html>";


      break;

   case 'cancel':       // Order was canceled...

      $hash=$_GET['hash'];
	  $cancel_trans=mysql_query("UPDATE `paypal_payments` SET `status` = '2' WHERE `hash` = '".$hash."';");
      echo "<html><head></head><body><h3>cancelling...</h3>";
      echo "</body></html>";
          //echo($username);
      printf("<script>document.location.href='index.php?status=PAY_KO&hash=".$hash."'</script>;");
      break;

   case 'ipn':

      if ($p->validate_ipn()) {

         // Payment has been recieved and IPN is verified.  This is where you
         // update your database to activate or process the order, or setup
         // the database with the user's order details, email an administrator,
         // etc.  You can access a slew of information via the ipn_data() array.

         // Check the paypal documentation for specifics on what information
         // is available in the IPN POST variables.  Basically, all the POST vars
         // which paypal sends, which we send back for validation, are now stored
         // in the ipn_data() array.

         // For this example, we'll just email ourselves ALL the data.
         $subject = 'Instant Payment Notification - Recieved Payment';
         $to = 'YOUR EMAIL ADDRESS HERE';    //  your email
         $body =  "An instant payment notification was successfully recieved\n";
         $body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
         $body .= " at ".date('g:i A')."\n\nDetails:\n";

         foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
         //mail($to, $subject, $body);
      }
      break;
 }

 
?>