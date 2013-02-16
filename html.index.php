<?php
include('rosetta.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>tuitflow</title>
<link href='https://fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<style type='text/css'>
.wrapper{
   width: 100%;
   margin: 0 auto;
}
.header{
   float: left;
   width: 99%;
   background-color: #660066;
   padding-left:10px;
   padding-top:10px;
   padding-bottom:10px;
   
}
.wrapright{
   float: left;
   width: 100%;
   
}
.right{
   margin-left: 248px;
   height: 200px;
   
   padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px
}
.left{
   float: left;
   width: 245px;
   margin-left: -100%;
   height: 200px;
   padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px
}

body {
   padding: 0px;
   margin: 0px;
   background-color: #F0E6F0;
   font-family: 'Pontano Sans','sans-serif';
   
}

a:link{
	color:#0000FF;
}
a:visited{
	color:#0000FF;
}
.font_header{
	font-family: 'Pontano Sans';
	font-size: 38px;
	color: #fff;
	text-decoration: none;
}
/*
@font-face {
    font-family: 'HattoriHanzoLight';
    src: url('Hattori_Hanzo-webfont.eot');
    src: url('Hattori_Hanzo-webfont.eot?#iefix') format('embedded-opentype'),
         url('Hattori_Hanzo-webfont.woff') format('woff'),
         url('Hattori_Hanzo-webfont.ttf') format('truetype'),
         url('Hattori_Hanzo-webfont.svg#HattoriHanzoLight') format('svg');
    font-weight: normal;
    font-style: normal;
    

}
*/
.left_container{
	height:220px;
	width:90%;
	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	background-color:#fff;
	margin-bottom:10px;
	line-height: 22px;
   	
}
.right_container{
	
	
	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	background-color:#fff;
	line-height: 22px;
   	
}
.footer{
   float: left;
   width: 100%;
   padding-left:10px;
   margin-top:20px;
   margin-bottom:20px;
   line-height: 22px;
   	
}
.search_form{
	float: right;
	margin-right: 20px;
	margin-top:7px;
}
/*
 * To finder elements
 */

.leftfinder{
   float: left;
   width: 9.00%;
}
.rightfinder{
   float: right;
   width: 91.00%;
}
.footerfinder{
   float: left;
   width: 100.00%;
}
.finder_body{
	display: inline-block;
	margin-bottom: 20px;
	width: 100%
}
.font_description{
	font-size: 11px;
	color: #999;
	line-height: 10px;
}
.font_followers{
	font-size: 12px;
	color: #333;
	text-decoration:none;
	
}
/*
 * 
 */
.slider-range-max{
 width:40%;	

}
.info_message{
	border-color: #ccc;
	border-style: solid;
	border-width: 1px;
	padding: 5px;
	background-color: #F0E6F0;
	margin-bottom: 10px;
	font-weight: bold;
	text-align: center;
}
.err_message{
	border-color: #ccc;
	border-style: solid;
	border-width: 1px;
	padding: 5px;
	background-color: #F0E6F0;
	margin-bottom: 10px;
	font-weight: bold;
	text-align: center;
}
/*
 * To index activity elements
 */

		
.wrapper_index{
	display: inline-block;
	margin-bottom: 20px;
	width: 100%;
	
}
.left_index{
   position: relative;
   float: left;
   left: 0.00%;
   width: 70.00%;
   
}
.right_index{
   position: relative;
   float: right;
   right: 0.00%;
   width: 30.00%;
   
}
.mydiv {width:400px; height: 75px;margin-bottom: 10px;}

.myimage {float:left; width:50px; height:50px; margin:5px;}

.text_peq{
	font-size: 11px;
	line-height:15px;
}

/*
 * to balance table
 * 
 */

.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
.datagrid {width:80%; background: #fff; overflow: hidden; border: 1px solid #CCCCCC; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
.datagrid table td, .datagrid table th { padding: 3px 10px; }
.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #F0E6F0), color-stop(1, #F0E6F0) );background:-moz-linear-gradient( center top, #F0E6F0 5%, #F0E6F0 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#F0E6F0', endColorstr='#F0E6F0');background-color:#F0E6F0; color:#292929; font-size: 15px; font-weight: bold; border-left: 1px solid #F0E6F0; } 
.datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #000305; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; }
.datagrid table tbody 
.alt td { background: #F0E6F0; color: #000000; }
.datagrid table tbody td:first-child { border-left: none; }
.datagrid table tbody tr:last-child td { border-bottom: none; }
.no_alt td { background: #fff; color: #000000; }

.info_box{
	border-color: #999;
	color:#666;
	border-style:solid;
	border-width:1px;
	background-color: #FFFFB3;
	width:250px;
	text-align:center;
	padding:3px;
	margin-bottom:10px;
	
	
}
.box_title {
	
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #F0E6F0), color-stop(1, #F0E6F0) );
	background:-moz-linear-gradient( center top, #F0E6F0 5%, #F0E6F0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#F0E6F0', endColorstr='#F0E6F0');
	background-color:#F0E6F0; color:#292929; 
	border-left:1px solid #F0E6F0;
	padding-top:7px;
	padding-bottom:7px;
	padding-left:7px;
	padding-right: 7px;
	margin-bottom:10px;
	display:table;
	border: 1px solid #CCCCCC; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; 
	}
</style>

 <link rel="stylesheet" href="jquery/jquery-ui.css" />
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38254551-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
 
  <script src="jquery/jquery-1.8.3.js"></script>
  <script src="jquery/jquery-ui.js"></script>
  <script src="js/vibrate.js"></script>
  <script>
  $(function() {
    $( "#slider-range-max" ).slider({
      range: "max",
      min: 0.10,
      max: 1.00,
      value: 0.60,
      step: 0.10,
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
      }
    });
    $( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
  });
  </script>
 <?php
 if($page=='paypal_refund'){ ?> 
    <script>
  $(function() {
    $( "#slider-refund" ).slider({
      range: "max",
      min: <?php print($limit); ?>,
      max: <?php print($balance); ?>,
      value: 5.00,
      step: 1.00,
      slide: function( event, ui ) {
        $( "#amount_to" ).val( ui.value );
      }
    });
    $( "#amount_to" ).val( $( "#slider-refund" ).slider( "value" ) );
  });
  </script>
 <?php } ?> 
  <script type="text/javascript" src="widgets.js"></script>
  <script>
  	function ChangeLanguaje(){
  		var change_info_d = document.getElementById('change_info');
  		var select_lan = document.getElementById('lang_selector').value;
  		$('#change_info').load('ajax_load.php?task=CHANGE_LANG&lang='+select_lan, function() {
		  //alert('Load was performed.');
		  change_info.style.display='block';
		});
  	}
  	
  	function ChangeCurrency(){
  		var change_info_d = document.getElementById('change_info');
  		var select_lan = document.getElementById('curr_selector').value;
  		$('#change_info').load('ajax_load.php?task=CHANGE_CURR&curr='+select_lan, function() {
		  //alert('Load was performed.');
		  change_info.style.display='block';
		});
  	}
  	function vibrate(){
  		jQuery('#send_money_button').vibrate();
  		
  	}
  	
  </script>
</head>
<body onload="javascript:vibrate();">
<div class="wrapper">
    <div class="header">
        <a class="font_header" href="index.php" style="color:#fff"><img style="width: 150px; height: auto;" src="images/logo_fondo.png" border="0" /></a>
        <img onclick="document.location.href='index.php#settings';" style="cursor:pointer;height: 25px; width: auto; padding-top: 10px; float: right; margin-right: 10px;" src='<?php print $user_prof[profile_image_url_https]; ?>' />
        <form method="GET" action="finder.php" class="search_form">
        
		<input type="text" style="border: 1px #F0E6F0 solid;padding: 3px; " name="find" placeholder="@<?php print($lang_placeholder); ?>"/>	
		</form>
    </div>
    <div class="wrapright">
        <div class="right">
            <div class="right_container">
            	<?php
            	switch ($_GET['message']) {
						case 'NO_MONEY':
							print("<div class='info_message'> ".$lang_nomoney."</div>");
						break;
				}
            	switch ($page) {
					case 'index':
					switch ($_GET['message']) {
						case 'VOUCHER_OK':
							print("<div class='info_message'> ".$voucher_ok."</div>");
						break;
						case 'PAYPAL_REFILL_OK':
							print("<div class='info_message'> ".$paypal_ok."</div>");
						break;
						case 'PAYPAL_REFUND_OK':
							print("<div class='info_message'> ".$paypal_refund_ok."</div>");
						break;			
						default:
										
						break;
					}
					switch ($_GET['error']) {
						case 'ERR_CODE_NOT_VALID':
							print("<div class='err_message'> ".$voucher_code_ko."</div>");
						break;
						case 'ERR_NO_SESSION':
							print("<div class='err_message'>ERR_NO_SESSION</div>");
						break;
						
						default:
										
						break;
					}
					//End switch messages
					?>
					<div class="wrapper_index">
	        <div class="left_index">
	            <?php
	            print("<div class='box_title'><a style='font-size:18px;'><strong>".$user_prof[name]."'s tuitflow</strong></a></div>");
				print("<a><strong>".$lang_recent_act."</strong></a><br>");
				$my_activity=$user_class->GetMyActivity($user_profile['id'], $user_prof[id]);
				//var_dump($user_profile[id]);var_dump($user_prof[id]);
				
			if($my_activity!=''){
	            foreach ($my_activity as $activity) {
					
				if($activity['from_user_id']==$user_profile['id']){
					//you sents
					$prof_img_url=$activity['dest_profile_img'];
					$twitter_id_ac=$activity['dest_twitter_id'];
					$screen_name_ac=$activity['dest_screen_name'];
					$sent_recieve_text=$lang_receives;
					$thanks='';
				}else{
					//you recieves
					$prof_img_url=$activity['profile_img'];
					$twitter_id_ac=$activity['twitter_id'];
					$screen_name_ac=$activity['screen_name'];
					$sent_recieve_text=$lang_sent;
					$thanks="<br><a class='text_peq' href='https://twitter.com/intent/tweet?text=".$lang_thanks_long." @".$screen_name_ac."&via=tuitflow'>".$lang_thanks."</a>";
				}
				print(" <div class='mydiv'>");
	           
				print("<img class='myimage' src='".$prof_img_url."' /><a class='font_followers'>".$activity['date']."</a><br> <a href='profile.php?id=".$twitter_id_ac."'>@".$screen_name_ac."</a> ".$sent_recieve_text." ".$activity['amount']." ".$activity['currency']."");

				 print($thanks);	
				print("<br><br>");
				print("</div>");
				}	
			}else{
				print($lang_no_activity."<br><br>");
				
			}
				print("<a><strong>".$lang_last_funds."</strong></a><br>");
				?>
				<div class="datagrid"><table>
<thead><tr><th><?php print($lang_date); ?></th><th><?php print($lang_source); ?></th><th><?php print($lang_amount); ?></th><th><?php print($lang_currency); ?></th></tr></thead>
<tbody>
<?php
				$movements=$money_class->GetBalanceMovements($user_profile['id']);
				$movements_trans=$money_class->GetMyMovements($user_profile['id'], $user_prof[id]);
				//var_dump($movements_trans);
				if($movements && $movements_trans){
				$move=array_merge($movements,$movements_trans);
				}else{
					if($movements){
						$move=$movements;
					}else{
						$move=$movements_trans;
					}
				}
				//print_r($move);
				if($move!=''){
					$a=0;//for pair class style
					

					foreach ($move as $movement) {
						if($a % 2==0){
							//pair
							$table_class="class='no_alt'";
						}else{
							$table_class="class='alt'";
						}
						//Know if is paypal refill or user gift
						if($movement['to_twitter_user_id']!='' && ($movement['from_user_id']!=$user_profile['id'])){
								if($movement['anonymous']=='0'){
									$source="@".$user_class->GetUSerScreenName($movement['from_user_id']);
								}else{
									$source="Anonymous";
								}
							//print($source." ".$movement['date']." ".$movement['amount']." ".$movement['currency']."<br>");
							print("<tr ".$table_class."><td>".$movement['date']."</td><td>".$source."</td><td>".$movement['amount']."</td><td>".$user_class->GetUSerCurrency($user_profile['id'])."</td></tr>");
						}else{
							if($movement['hash']=='INITIAL_PAYMENT' || $movement['hash']=='VOUCHER_CODE'){
							$source="@tuitflow";	
							}else{
							$source=$lang_paypalpayment;
							}
							print("<tr ".$table_class."><td>".$movement['date']."</td><td>".$source."</td><td>".$movement['amount']."</td><td>".$movement['currency']."</td></tr>");
							
						}
						
						
					$a++;		
					}
					
				}
?>
</tbody>
</table>
</div>
<?php print(BIG_AD_BANNER); ?>

				<?php
				
				print("<a name='settings'></a>");
				print("<br><a><strong>".$lang_account_settings."</strong></a><br><br>");	
				?>
				<div id="change_info" class="info_box" style="display: none;"></div>
				<?php
				$entropy=$user_class->GetUserEntropy($user_profile['id']);
				if($entropy<=ENTROPY_TOO_LOW){
					$entropy_comment=$lang_entropy_too_low;
				}
				if($entropy>ENTROPY_TOO_LOW && $entropy<=ENTROPY_NORMAL){
					$entropy_comment=$lang_entropy_normal;
				}
				if($entropy>ENTROPY_NORMAL){
					$entropy_comment=$lang_entropy_very_high;
				}
				//print($lang_entropy." ".$entropy."% <a href="support.php" onclick="return !window.open(this.href, 'Support', 'width=500,height=500')"><img id='img_help' src='images/help.png' border='0' style='cursor:pointer;' title='hola'/></a> <a class='font_followers'>".$entropy_comment."</a><br>");
				//print("<a>".$lang_currency_upper." </a>");
				?>
				<?php print($lang_entropy); ?> <?php print($entropy); ?>% <a href="entropy_help.php" onclick="return !window.open(this.href, 'Support', 'width=500,height=500')"><img id='img_help' src='images/help.png' border='0' style='cursor:pointer;' /></a> <a class='font_followers'><?php print($entropy_comment); ?></a><br>
				<?php print("<a>".$lang_currency_upper." </a>"); ?>
				<select onchange="javascript:ChangeCurrency();" id="curr_selector">
				  <option value="EUR" <?php if($user_profile['currency']=='EUR') { print("selected");} ?>>EUR</option>
				  <option value="USD" <?php if($user_profile['currency']=='USD') { print("selected");} ?>>USD</option>
				</select>
				<br>
				<?php
				print("<a>".$lang_languaje." </a>");
				//var_dump($user_profile);
				?>
				
				<select onchange="javascript:ChangeLanguaje();" id="lang_selector">
				  <option value="ES" <?php if($user_profile['languaje']=='es') { print("selected");} ?>>Español</option>
				  <option value="EN" <?php if($user_profile['languaje']=='en') { print("selected");} ?>>English</option>
				</select>
				<br><br>
				<input type="checkbox" name="always_anonymous" value="always_anonymous"><?php print($lang_sendnotif); ?><br>
				<input type="checkbox" name="never_notifs" value="never_notifs"><?php print($lang_notwitter_ment); ?><br><br>
				<?php
				print("<a href='clearsessions.php'>".$lang_logout."</a><br>");
				print("<a href='delete_account.php'>".$lang_deleteaccount."</a><br>");
	            ?>
	        </div>
	        <div class="right_index">
	            <?php
	            print("<div style='float:right; margin-bottom:10px; height:30px;'><a href='?tab=highlights'>".$lang_highlights."</a> <a href='?tab=friends'>".$lang_friends."</a> <a href='?tab=all'>".$lang_all."</a></div>");
						switch ($_GET['tab']) {
							default;
							case 'Highlights':

								print("<div class='box_title'><strong>".$lang_highlights."</strong></div><hr NOSHADE width='100%' align='left' size='1'><br>");
								$highlights=$user_class->GetDescatadosActivity();
								foreach ($highlights as $highlight_trans) {
								print("<a class='font_followers' style='margin-left:10px'>".$highlight_trans['date']."</a><br>");	
								if($highlight_trans['anonymous']=='0'){
									print("<a href='profile.php?id=".$highlight_trans['twitter_id']."'>@".$highlight_trans['screen_name']."</a> ".$lang_sent." ".$highlight_trans['amount']." ".$highlight_trans['currency']."  ".$lang_to." <a href='profile.php?id=".$highlight_trans['dest_twitter_id']."'>@".$highlight_trans['dest_screen_name']."</a><br>");
									print("<img src='".$highlight_trans['profile_img']."' /> <img src='images/arrow-right.png' style='margin-left:40px; margin-bottom:15px;' /> <img style='margin-left:40px;' src='".$highlight_trans['dest_profile_img']."' /><br>");
									print('<a href="https://twitter.com/intent/tweet?text=@'.$highlight_trans['screen_name'].' '.$lang_sent.' '.$highlight_trans['amount'].' '.$highlight_trans['currency'].' '.$lang_to.' @'.$highlight_trans['dest_screen_name'].'" class="twitter-hashtag-button" data-lang="'.$user_profile['languaje'].'" data-via="tuitflow">Tweet</a><br><br>');
								}else{
									//Trans is anonymous
									print("<a>@anonymous</a> ".$lang_sent." ".$highlight_trans['amount']." ".$highlight_trans['currency']."  ".$lang_to." <a href='profile.php?id=".$highlight_trans['dest_twitter_id']."'>@".$highlight_trans['dest_screen_name']."</a><br>");
									print("<img width='48' height='48' src='".anonymous_profile_img."' /> <img src='images/arrow-right.png' style='margin-left:40px; margin-bottom:15px;' /> <img style='margin-left:40px;' src='".$highlight_trans['dest_profile_img']."' /><br>");
									print('<a href="https://twitter.com/intent/tweet?text=@anonymous '.$lang_sent.' '.$highlight_trans['amount'].' '.$highlight_trans['currency'].' '.$lang_to.' @'.$highlight_trans['dest_screen_name'].'" class="twitter-hashtag-button" data-lang="'.$user_profile['languaje'].'" data-via="tuitflow">Tweet</a><br><br>');
									
								}
								
									
								}
								//print_r($highlights);
							break;
								
							case 'friends':
								print("<div class='box_title'><strong>".$lang_friends."</strong></div><hr NOSHADE width='100%' align='left' size='1'><br>");
								$friends=$user_class->GetFriendsActivity($user_profile['id']);
								foreach ($friends as $friend_trans) {
									if($friend_trans['anonymous']=='0'){
										print("<a class='font_followers' style='margin-left:10px'>".$friend_trans['date']."</a><br>");	
										print("<a href='profile.php?id=".$friend_trans['twitter_id']."'>@".$friend_trans['screen_name']."</a> ".$lang_sent." ".$friend_trans['amount']." ".$friend_trans['currency']."  ".$lang_to." <a href='profile.php?id=".$friend_trans['dest_twitter_id']."'>@".$friend_trans['dest_screen_name']."</a><br>");
										print("<img src='".$friend_trans['profile_img']."' /> <img src='images/arrow-right.png' style='margin-left:40px; margin-bottom:15px;' /> <img style='margin-left:40px;' src='".$friend_trans['dest_profile_img']."' /><br>");
										print('<a href="https://twitter.com/intent/tweet?text=@'.$friend_trans['screen_name'].' '.$lang_sent.' '.$friend_trans['amount'].' '.$friend_trans['currency'].' '.$lang_to.' @'.$friend_trans['dest_screen_name'].'" class="twitter-hashtag-button" data-lang="'.$user_profile['languaje'].'" data-via="tuitflow">Tweet</a><br><br>');
									}else{
										//Anonymous trans
										print("<a class='font_followers' style='margin-left:10px'>".$friend_trans['date']."</a><br>");	
										print("<a>@anonymous</a> ".$lang_sent." ".$friend_trans['amount']." ".$friend_trans['currency']."  ".$lang_to." <a href='profile.php?id=".$friend_trans['dest_twitter_id']."'>@".$friend_trans['dest_screen_name']."</a><br>");
										print("<img width='48' height='48' src='".anonymous_profile_img."' /> <img src='images/arrow-right.png' style='margin-left:40px; margin-bottom:15px;' /> <img style='margin-left:40px;' src='".$friend_trans['dest_profile_img']."' /><br>");
										print('<a href="https://twitter.com/intent/tweet?text=@anonymous '.$lang_sent.' '.$friend_trans['amount'].' '.$friend_trans['currency'].' '.$lang_to.' @'.$friend_trans['dest_screen_name'].'" class="twitter-hashtag-button" data-lang="'.$user_profile['languaje'].'" data-via="tuitflow">Tweet</a><br><br>');
									}
									}
							break;
							break;
							
							case 'all':
								print("<div class='box_title'><strong>".$lang_all_act."</strong></div><hr NOSHADE width='80%' align='left' size='1'><br>");
								$highlightsall=$user_class->GetAllActivity();
								foreach ($highlightsall as $highlight_trans) {
									if($highlight_trans['anonymous']=='0'){
										print("<a class='font_followers' style='margin-left:10px'>".$highlight_trans['date']."</a><br>");	
										print("<a href='profile.php?id=".$highlight_trans['twitter_id']."'>@".$highlight_trans['screen_name']."</a> ".$lang_sent." ".$highlight_trans['amount']." ".$highlight_trans['currency']."  ".$lang_to." <a href='profile.php?id=".$highlight_trans['dest_twitter_id']."'>@".$highlight_trans['dest_screen_name']."</a><br>");
										print("<img src='".$highlight_trans['profile_img']."' /> <img src='images/arrow-right.png' style='margin-left:40px; margin-bottom:15px;' /> <img style='margin-left:40px;' src='".$highlight_trans['dest_profile_img']."' /><br>");
										print('<a href="https://twitter.com/intent/tweet?text=@'.$highlight_trans['screen_name'].' '.$lang_sent.' '.$highlight_trans['amount'].' '.$highlight_trans['currency'].' '.$lang_to.' @'.$highlight_trans['dest_screen_name'].'" class="twitter-hashtag-button" data-lang="'.$user_profile['languaje'].'" data-via="tuitflow">Tweet</a><br><br>');
									}else{
										//Anonymous trans
										print("<a class='font_followers' style='margin-left:10px'>".$highlight_trans['date']."</a><br>");	
										print("<a>@anonymous</a> ".$lang_sent." ".$highlight_trans['amount']." ".$highlight_trans['currency']."  ".$lang_to." <a href='profile.php?id=".$highlight_trans['dest_twitter_id']."'>@".$highlight_trans['dest_screen_name']."</a><br>");
										print("<img width='48' height='48' src='".anonymous_profile_img."' /> <img src='images/arrow-right.png' style='margin-left:40px; margin-bottom:15px;' /> <img style='margin-left:40px;' src='".$highlight_trans['dest_profile_img']."' /><br>");
										print('<a href="https://twitter.com/intent/tweet?text=@anonymous '.$lang_sent.' '.$highlight_trans['amount'].' '.$highlight_trans['currency'].' '.$lang_to.' @'.$highlight_trans['dest_screen_name'].'" class="twitter-hashtag-button" data-lang="'.$user_profile['languaje'].'" data-via="tuitflow">Tweet</a><br><br>');
									}
									}
							break;
							
							
						}
	            
	            
	            
	            ?>
	        </div>  	       
	    </div>
					<?php
					break;
					case 'finder':
						foreach ($find as $user_object) {
							$user_result=get_object_vars($user_object);
							//print_r($user_result);
							$user_id_for_session=intval($user_result['id']);
							$_SESSION['user'][$user_id_for_session]=$user_result;
							//var_dump($_SESSION['user']);
							
							//print("<img src='".$user_result['profile_image_url_https']."' />"."<br>");
							
							$status=get_object_vars($user_result['status']);
							//print("Last tweet: <br>".$status['text']);
							//echo "<br><br>";
							?>
							<div class="finder_body" >
						        <div class="leftfinder">
						            <?php print("<img height='48px' style='height=48px;width=auto;' src='".$user_result['profile_image_url_https']."' />"); ?>
						        </div>
						        <div class="rightfinder">
						            <?php print("<a href='profile.php?id=".$user_result['id']."' >".$user_result['name']." @".$user_result['screen_name']."</a> ".$money_class->GenerateSendMoneyButton($_SESSION['user_profile']['id'], $user_result['id'])."<br>"); ?>
						            <?php print("<a class='font_description'>".$user_result['description']."</a><br>"); ?>
						            <?php print("".$status['text']); ?>
						        </div>  
						        <div class="footerfinder">
						       		<span class="font_followers">
							        <?php
							        print($lang_twitts.": <strong>".$user_result['statuses_count']."</strong> ");
									print($lang_followers.": <strong>".$user_result['followers_count']."</strong> ");
									print($lang_following.": <strong>".$user_result['friends_count']."</strong> ");
									
							?>
									</span>
							    </div>	       
						    </div>
							<?php
						}
						break;
						
						case 'profile':
							//print("Here the user activity!!!");
							//var_dump($user_data);
							print("<div class='box_title' style='display:inline'><a style='font-size:18px'><strong>".$user_data[screen_name]."'s tuitflow</strong></a></div>");
							print("<div style='display:inline-block; margin-bottom:20px; margin-left:20px;'>".$money_class->GenerateSendMoneyButton($_SESSION['user_profile']['id'], $user_data['id'])."<a href='send_money.php?from_user_id=".$_SESSION['user_profile']['id']."&to_user_id=".$user_data['id']."' class='font_followers'> ".$lang_send_money." ".$lang_to." ".$user_data[screen_name]."</a></div><br>");
							print("<div><a><strong>".$lang_recent_act."</strong></a></div><br>");
							//check if user is in app
							$user_check=$user_class->check_user_exists($user_data[screen_name],$user_data[id]);
							if($user_check==false){
								//USer is not in app
								print("".$user_data[screen_name]." ".$lang_noregistered." <a href='https://twitter.com/intent/tweet?text=".$lang_invitale_long." @".$user_data[screen_name]."&via=tuitflow'>".$lang_invitale."</a><br><br>");
							}else{
									$profile_activity=$user_class->GetMyActivity($user_check['id'], $user_data[id]);
								
									if($profile_activity!=''){
							            foreach ($profile_activity as $activity_prof) {
											
										if($activity_prof['from_user_id']==$user_check['id']){
											//user sents
											$prof_img_url=$activity_prof['dest_profile_img'];
											$twitter_id_ac=$activity_prof['dest_twitter_id'];
											$screen_name_ac=$activity_prof['dest_screen_name'];
											$sent_recieve_text=$lang_receives_s;
										}else{
											//user recieves
											$prof_img_url=$activity_prof['profile_img'];
											$twitter_id_ac=$activity_prof['twitter_id'];
											$screen_name_ac=$activity_prof['screen_name'];
											$sent_recieve_text=$lang_sent_s;
										}
										print(" <div class='mydiv'>");
							           
										print("<img class='myimage' src='".$prof_img_url."' /><a class='font_followers'>".$activity_prof['date']."</a><br> <a href='profile.php?id=".$twitter_id_ac."'>@".$screen_name_ac."</a> ".$sent_recieve_text." ".$activity_prof['amount']." ".$activity_prof['currency']."");
						
										 print($thanks);	
										print("<br><br>");
										print("</div>");
									}	
								}
							}

							print("<a><strong>".$lang_recent_tw."</strong></a><br>");
							$last_tweets=$connection->get('statuses/user_timeline' , array("screen_name" => $user_data[screen_name],"count" => "5"));
							if($_GET['debug']){
								var_dump($last_tweets);
							}
							foreach ($last_tweets as $tweet) {
								$tweet_arr=get_object_vars($tweet);
								$tweet_usr=get_object_vars($tweet_arr['user']);
								$tweet_text=ereg_replace("http://([a-zA-Z0-9./-]+)$", "<a target='blank' href=\"\\0\">\\0</a>", $tweet_arr['text']);
								$tweet_date=date("d/M/Y \- H:i",strtotime($tweet_arr['created_at']));
								print("<a target='blank' href='https://www.twitter.com/".$user_data[screen_name]."/status/".$tweet_arr['id_str']."'><img border='0' src='".$tweet_usr['profile_image_url_https']."' style='height: 25px; width: auto;' /></a> <a style='text-decoration:none;color:#000;' target='blank' href='https://www.twitter.com/".$user_data[screen_name]."/status/".$tweet_arr['id_str']."'>".$tweet_text."</a> <a class='font_followers'>".$tweet_date."</a><br>");
							}
							//var_dump($last_tweets);
						
						break;
						
						case 'send_money':
						//Check entropy
						$user_entropy=$user_class->GetUserEntropy($user_logon_data['id']);
						$user_trans=$user_class->GetUserTrans($user_logon_data['id']);
						
						//If entropy level is too low, check if users already made a transaction
						if($user_entropy<MIN_ENTROPY_THRESHOLD && $user_trans>=ENTROPY_MIN_SENDS){
							$users_already_sents=$user_class->KnowIfUsersAlreadyTrans($user_logon_data['id'],$user_data[id]);
							if($users_already_sents==true){
								print("<h3>".$lang_send_money." - ".$user_data[name]."</h3>");
								print($lang_too_low_entropy);
							}
							
						}
						if($users_already_sents!=true){
						//User can sent
						
								print($lang_your_account." ".$user_class->GetBalance($user_logon_data['id'])." ".$user_class->GetCurrencyLogo($user_logon_data['currency'])."<br><br>");
								
								print("<strong>".$user_data[name]." (@".$user_data[screen_name].") ".$lang_will_receive."</strong> <br>");
								?>
								<form method="POST" action="save_transaction.php?to_user_id=<?php print($to_user_id); ?>" >
								
								<input type="checkbox" name="nonotify" id="nonotify" value="nonotifynonotify"> <?php print($lang_dont_send_mention); ?> <br>	
								<input type="checkbox" name="anon" id="anon" value="anonymous"> <?php print($lang_anonymous);?> (<?php print($user_data['name']); ?> <?php print($lang_will_not_know); ?>) <br>
								
								
								
								 <br>
								  <label for="amount"><?php print($lang_amount_upper); ?></label> 
								  <input type="text" id="amount" name="amount" style="border: 0; width: 30px; font-weight: bold" /><?php print($user_class->GetCurrencyLogo($_SESSION['user_profile']['currency'])); ?>
								  <br>
								 <br>
								<div id="slider-range-max" class="slider-range-max"></div>
								 <br>
								<input type="submit" value="<?php print($lang_send_money); ?>" />
								
								</form>
								<?php
						}
						break;
						case 'save_transaction':
							if($status=='ok'){
								print($lang_money_ok."<br><br>");
								if($nonotify){
									//Text to nonotify
									print($lang_send_link." <a href='".$link."'>".$link."</a> ".$lang_to." @".$user_data[screen_name]." ".$lang_to_redeem);
								}else{
									print($lang_t_mention_sent." @".$user_data[screen_name]."");
								}
								
							}
						break;
						
						case 'sum_balance':
						?>
						<div class='box_title'><a style="font-size:18px;"><strong><?php print($lang_add_money); ?></strong></a></div>
						<br>
						<strong><?php print($lang_from_paypal); ?></strong><br>
						<img src="https://www.paypalobjects.com/webstatic/mktg/logo-center/logotipo_paypal_tarjetas.jpg"/>
						<form method="GET" action="paypal.php">
							<input type="radio" name="amount_c" value="2.00"> 2 <?php print($user_logon_data['currency']); ?> 
							<input type="radio" name="amount_c" value="5.00" checked="true"> 5 <?php print($user_logon_data['currency']); ?> 
							<input type="radio" name="amount_c" value="10.00"> 10 <?php print($user_logon_data['currency']); ?>
							<input type="radio" name="amount_c" value="20.00"> 20 <?php print($user_logon_data['currency']); ?>
							<input type="radio" name="amount_c" value="50.00"> 50 <?php print($user_logon_data['currency']); ?><br>
							<input type="text" name="currency" id="currency" style="visibility: hidden" value="<?php print($user_logon_data['currency']); ?>" /><br>
							<a>(<?php print($lang_paypalfare1);?> 3,4% + 0,35 <?php print($user_logon_data['currency']); ?> <?php print($lang_paypalfare2);?>)</a><br><br>
							<input type="submit" value="<?php print($lang_goto_paypal); ?>" />
						</form>
						<br><br>
						<strong><?php print($lang_voucher); ?></strong><br><br>
						<form method="GET" action="vouchers.php">
						<input type="text" name="promo_code" id="promo_code" value="" placeholder="<?php print($lang_voucher_here); ?>" style="border-style: solid; border-width: 1px; border-color:#666; padding:3px;" /><br>
						<input type="submit" value="<?php print($lang_voucher_go); ?>" />	
					  </form>
						<?php
						//Ad
						print(BIG_AD_BANNER);
					
						break;
						

						case 'paypal_refund_conf':
						print("<h3>".$lang_refund_1."</h3>");
						print("<br>".$lang_please_check." <br><br>");
						print("<strong>".$lang_amount_upper."</strong> ".$amount." ".$currency."<br>");
						print("<strong>".$lang_dest_paypal."</strong> ".$paypal_to."<br><br>");
						?>			
						<input type="button" onclick="document.location.href='do_payment.php?amount=<?php print($amount); ?>&currency=<?php print($currency); ?>&to=<?php print($paypal_to); ?>'" value="<?php print($lang_ok); ?>" /> <input type="button" onclick="document.location.href='get_money.php'" value="<?php print($lang_edit); ?>" />  	
						<?php
						break;
						case 'paypal_refund':
					?>
					<div class="box_title"><a style="font-size: 18px;"><strong><?php print($lang_refund_money); ?></strong></a></div>
					<?php
					if($balance<$limit){
						print($lang_enough." ".$limit." ".$currency."<br>");
						
						
					}else{
					
					
					?>
					<form method="POST" action="payment.php">
					<?php print($lang_paypal_acc); ?> <a class="font_followers">(<?php print($lang_dont_store); ?>)</a> 
					<br><input placeholder="<?php print($lang_paypal_placeholder); ?>" name="paypal_to" type="text" style="border: 1px; border-style:solid; border-color: #666; padding: 3px;" /> 
					<br><br>
					<?php print($lang_amount_up2); ?> (<?php print($lang_in); ?> <?php print($currency); ?>):
					
					<input name="amount_to" id="amount_to" type="text" value="0.00" style="border: 0; width: 50px; font-weight: bold" /> 
						 <br>
						<div id="slider-refund" class="slider-range-max" style="margin-left: 10px;"></div>
						 <br>
					<input name="currency_to" style="display: none;" value="<?php print($currency); ?>" /><br>
					<a>(<?php print($lang_paypalfare1); ?> 3,4% + 0,35 <?php print($user_logon_data['currency']); ?> <?php print($lang_paypalfare2); ?></a><br><br>
					<input type="submit" value="<?php print($lang_gimmethamoney); ?>" />
					
					</form>		
							
							
					<?php
					}
					
					
					break;
					
						case 'delete_account':
						print("<h3>".$lang_delete_acc."</h3>");
						print($lang_delete_acc_sure."<br><br>");
						//Check if user has money
						?>
						<form method="post" action="delete_account_proccess.php">
						<?php
						
						if($user_class->GetBalance($user_logon_data['id'])>0){
							?>
							<?php print($lang_paypal_acc); ?> <a class="font_followers">(<?php print($lang_dont_store); ?>)</a> 
							<br><input placeholder="<?php print($lang_paypal_placeholder); ?>" name="paypal_to" type="text" style="border: 1px; border-style:solid; border-color: #666; padding: 3px;" /> 
							
							<?php
						}
						?>
						<br><br><input type="submit" value="<?php print($lang_delete_acc_button); ?>" />	
						</form>					
						<?php
					break;
					
					
					case 'redeem_money_user':
								$user_to_twitter_id=$user_class->GetTwitterIdFromUserId($_SESSION['user_profile']['id']);
								if($transaction['to_twitter_user_id']!=$user_to_twitter_id){
									//This transaction is not for you!!!
									printf("<script>document.location.href='connect.php?error=ERR_NOT_FOR_YOU'</script>;");
									die('ERR_NOT_FOR_YOU');
								}
								if($transaction['anonymous']=='1'){
									$from_profile="Anonymous";
									print("<a>".$lang_anonymous."</a> <br>");
									print("<img src='".$from_profile['profile_img']."' />"."<br>");
									$currency=$user_class->GetUSerCurrency($transaction['from_user_id']);
								}else{
									$from_profile=$user_class->GetUSerFullProfile($transaction['from_user_id']);
									print("<a href='profile.php?id=".$from_profile['twitter_id']."' >".$from_profile['name']." @".$from_profile['screen_name']."</a> ".$money_class->GenerateSendMoneyButton($_SESSION['user_profile']['id'], $from_profile['twitter_id'])."<br>");
									print("<img src='".$from_profile['profile_img']."' />"."<br>");
									print($lang_followers.": ".$from_profile['followers_count']."<br>");
									print($lang_following.": ".$from_profile['following_count']."<br>");
									$currency=$from_profile['currency'];
									
								}
									//If user is in app, money is already redeemed
								if($transaction['redeemed']=='1'){
									
									$redeem_notes=$lang_your_balance_update;
								}else{
									//If user is new, do redeem
									$money_class->RedeemTransaction($hash);
									
									$money_class->SumMoney($user_to_id, $transaction['amount']);
									$redeem_notes=$lang_your_balance_update_now;
								}	
								$thanks="<a class='text_peq' href='https://twitter.com/intent/tweet?text=".$lang_thanks_long." @".$screen_name_ac."&via=tuitflow'>".$lang_thanks."</a>";
								print($lang_sent.": <strong>".$transaction['amount']." ".$currency."</strong> ".$thanks."<br><br>"	);
								print($redeem_notes."<br>");
					break;
				}
            	
            	
            	?>
            	
            </div>
      	          <div class="footer">
	        tuitflow 2013 - <?php print($lang_license); ?> -  <a href="support.php" onclick="return !window.open(this.href, 'Support', 'width=500,height=500')"
    target="_blank"><?php print($lang_support); ?></a> - <a href="how_it_works_<?php print($switch_lang); ?>.php" onclick="return !window.open(this.href, 'hiw', 'width=500,height=500')"
    target="_blank"><?php print($lang_about); ?></a> - <a href="tos.php" onclick="return !window.open(this.href, 'tos', 'width=500,height=500')"><?php print($lang_tos); ?></a>
	    </div> 
        </div>
    </div>
    <div class="left">
            <div class="left_container">
            	<?php
            	switch ($page) {
            		case 'redeem_money_user';
            		case 'delete_account';
            		case 'paypal_refund_conf';
            		case 'paypal_refund';
					case 'sum_balance';
					case 'finder';
					case 'index':
						print("<div style='display:inline;'><strong>".$user_prof[name]." @".$user_prof[screen_name]."</strong></div> <br>");
						print("<img src='".$user_prof[profile_image_url_https]."' /> <div style='display:inline;margin-left:5px;'><a href='https://twitter.com/intent/tweet?text=".$lang_text_button_rnd."' class='twitter-hashtag-button' data-lang='".$user_profile['languaje']."' data-via='tuitflow'>Tweet</a> <a class='font_followers' style='margin-left:-25px'>(".$lang_be_original.")</a></div><br>");
						print(ucwords($lang_followers).": ".$user_prof[followers_count]."<br>");
						print(ucwords($lang_following).": ".$user_prof[friends_count]."<br>");
						print($lang_money_rec.": ".$money_class->GetMoneyRecieved($user_prof[id])." ".$user_class->GetCurrencyLogo($user_profile['currency'])."<br>");
						print($lang_money_sent.": ".$money_class->GetMoneySent($user_profile['id'])." ".$user_class->GetCurrencyLogo($user_profile['currency'])."<br>");
						print($lang_acc_bal.": ".$user_class->GetBalance($user_profile['id'])." ".$user_class->GetCurrencyLogo($user_profile['currency'])." <a href='get_money.php'>".$lang_refund."<a/><br>");
						print("<br><a href='sum_balance.php'>".$lang_add_money."</a>");
					break;
					case 'save_transaction';
					case 'send_money';
					case 'profile':
						
						print("<strong>".$user_data[name]." @".$user_data[screen_name]."</strong> <div style='display:inline;'>".$money_class->GenerateSendMoneyButton($_SESSION['user_profile']['id'], $user_data['id'])."</div><br>");
						print("<img src='".$user_data[profile_image_url_https]."' /><br>");
						print(ucwords($lang_followers).": ".$user_data[followers_count]."<br>");
						print(ucwords($lang_following).": ".$user_data[friends_count]."<br>");
						print($lang_money_rec.": ".$money_class->GetMoneyRecieved($user_data[id])." ".$user_class->GetCurrencyLogo($_SESSION['user_profile']['currency'])."<br>");
						//print("Money sent: ".$money_class->GetMoneySent($user_profile['id'])."<br>");
						//print("Account balance: ".$user_class->GetBalance($user_profile['id'])." ".$user_class->GetCurrencyLogo($user_profile['currency'])." <a href='get_money.php'>Get<a/><br>");
						//print("<br><a href='sum_balance.php'>Add money to account</a>");
						/*
						print("<a href='profile.php?id=".$user_data['id']."' >".$user_data['name']." @".$user_data['screen_name']."</a> ".$money_class->GenerateSendMoneyButton($_SESSION['user_profile']['id'], $user_data['id'])."<br>");
						print("<img src='".$user_data['profile_image_url_https']."' />"."<br>");
						print("twitts: ".$user_data['statuses_count']."<br>");
						print("followers: ".$user_data['followers_count']."<br>");
						print("following: ".$user_data['friends_count']."<br>");
						 * 
						 */
						$description=substr($user_data['description'], 0,100);
						print("<br>".$description."<br>");
						//$status=get_object_vars($user_data['status']);
						//print("Last tweet: <br>".$status['text']);
						
					break;
					
				}
            	
				//print("Languaje: ".$user_profile['languaje']);
				            	
            	
            	?>
            	
            </div>
            
            <div class="left_container">
            	<?php
            	switch ($page) {
					default;
					case 'redeem_money_user';
					case 'delete_account';
					case 'paypal_refund_conf';
					case 'paypal_refund';
					case 'sum_balance';
					case 'finder';
					case 'index':
					
				?>
            	<div class='box_title'><strong><?php print($lang_your_followers); ?> </strong> <a class="font_followers">(<?php print($lang_received); ?>)</a></div>
            	<table border=0>
				  <tbody>
            	<?php
            	$followers_top=$user_class->FollowersTopByAmount($user_profile['id']);
				//print_r($followers_top);
				if($followers_top!=false){
					foreach ($followers_top as $fop) {
						?>
						 <tr>
					      <td><?php print("<img style='width:20px;height:auto;' src='".$fop['profile_img']."' />"); ?></td>
					      <td><?php print("<a href='profile.php?id=".$fop['twitter_id']."'>@".$fop['screen_name']."</a>"); ?></td>
					      <td><?php print($fop['total_amount']." ".$fop['currency']); ?></td>
					    </tr>
						<?php
						//print("<img style='width:20px;height:auto;' src='".$fop['profile_img']."' /> @".$fop['screen_name']." ".$fop['total_amount']." ".$fop['currency']."<br>");
					}
				}else{
					//no followers top
				}
				?>
				</tbody>
				</table>
				<?php
				break;
				
					case 'profile':
					?>
						<strong>@<?php print($user_data[screen_name]); ?> <?php print($lang_followers_top); ?></strong> <a class="font_followers">(<?php print($lang_received); ?>)</a><br>
		            	<table border=0>
						  <tbody>
		            	<?php
		            	//var_dump($user_data[id]);
						$app_id=$user_class->GetUSerIdFromTwitterId($user_data[id]);
		            	$followers_top=$user_class->FollowersTopByAmount($app_id);
						//print_r($followers_top);
						foreach ($followers_top as $fop) {
							?>
							 <tr>
						      <td><?php print("<img style='width:20px;height:auto;' src='".$fop['profile_img']."' />"); ?></td>
						      <td><?php print("<a href='profile.php?id=".$fop['twitter_id']."'>@".$fop['screen_name']."</a>"); ?></td>
						      <td><?php print($fop['total_amount']." ".$fop['currency']); ?></td>
						    </tr>
							<?php
							//print("<img style='width:20px;height:auto;' src='".$fop['profile_img']."' /> @".$fop['screen_name']." ".$fop['total_amount']." ".$fop['currency']."<br>");
						}
						?>
						</tbody>
						</table>
					
					<?php	
					break;
					
					
					
					}
				?>
				
				
            </div>
            
             <div class="left_container">
             	<?php
            	switch ($page) {
					default;
					case 'redeem_money_user';
					case 'delete_account';
					case 'paypal_refund_conf';
					case 'paypal_refund';
					case 'sum_balance';
					case 'finder';
					case 'index':
					
				?>
            	<div class='box_title'><strong><?php print($lang_followings_top); ?> </strong>  <a class="font_followers">(<?php print($lang_received); ?>)</a></div>
            	<table border=0>
				  <tbody>
            	<?php
            	
            	$followings_top=$user_class->FollowingsTopByAmount($user_profile['id']);
				if($followings_top!=false){
					foreach ($followings_top as $fiop) {
						?>
						 <tr>
					      <td><?php print("<img style='width:20px;height:auto;' src='".$fiop['profile_img']."' />"); ?></td>
					      <td><?php print("<a href='profile.php?id=".$fiop['twitter_id']."'>@".$fiop['screen_name']."</a>"); ?></td>
					      <td><?php print($fiop['total_amount']." ".$fiop['currency']); ?></td>
					    </tr>
						<?php
						//print("<img style='width:20px;height:auto;' src='".$fop['profile_img']."' /> @".$fop['screen_name']." ".$fop['total_amount']." ".$fop['currency']."<br>");
					}
				}else{
					//No followingstop	
				}
				?>
            	</tbody>
				</table>
				
				<?php
				break;
				
					case 'profile':
					?>
					<strong>@<?php print($user_data[screen_name]); ?> <?php print($lang_followings_t); ?></strong> <a class="font_followers">(<?php print($lang_received); ?>)</a><br>
            	<table border=0>
				  <tbody>
            	<?php
            	
            $followings_top=$user_class->FollowingsTopByAmount($app_id);
				if($followings_top!=false){
					foreach ($followings_top as $fiop) {
						?>
						 <tr>
					      <td><?php print("<img style='width:20px;height:auto;' src='".$fiop['profile_img']."' />"); ?></td>
					      <td><?php print("<a href='profile.php?id=".$fiop['twitter_id']."'>@".$fiop['screen_name']."</a>"); ?></td>
					      <td><?php print($fiop['total_amount']." ".$fiop['currency']); ?></td>
					    </tr>
						<?php
						//print("<img style='width:20px;height:auto;' src='".$fop['profile_img']."' /> @".$fop['screen_name']." ".$fop['total_amount']." ".$fop['currency']."<br>");
					}
				}else{
					//no followings top
				}
				?>
            	</tbody>
				</table>
					
					
					<?php
					break;
				}
					?>
            </div>
            
            <div class="left_container" style="text-align: center; vertical-align: center;">
            	
<?php print(SQUARE_AD_BANNER); ?>
            </div>
    </div> 
    
</div>
<div id="ajax_loader"></div>
</body>
</html>