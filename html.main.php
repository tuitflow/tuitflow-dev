<?php
include('rosetta.php');
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$user_class=New Users();
$money_class=New MoneyStuff();
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
   height: 260px;
   padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px
}

body {
   padding: 0px;
   margin: 0px;
   background-color: #F0E6F0;
   font-family: 'Pontano Sans';
   
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
	height:260px;
	width:90%;
	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	background-color:#fff;
	margin-bottom:10px;
	line-height: 22px;
	overflow: hidden;
   	
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
   line-height: 22px;
   	
}
.left_container{
	height:250px;
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
.font_followers{
	font-size: 12px;
	color: #333;
	
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
</style>
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
</head>
<body>
	<div class="wrapper">
    <div class="header">
        <a class="font_header" href="index.php" style="color:#fff"><img style="width: 150px; height: auto;" src="images/logo_fondo.png" border="0" /></a>
        
        <form method="GET" action="finder.php" class="search_form">
        
			
		</form>
    </div> 
    <div class="wrapright"> 	  
	    <div class="right">
	         <div class="right_container">
	         <?php
	         switch ($_GET['error']) {
						case 'LOCKED_USER':
							print("<div class='err_message'> ".$lang_account_blocked."</div>");
						break;
						case 'ERR_NOT_FOR_YOU':
							print("<div class='err_message'>".$lang_err_not_for_you."</div>");
						break;	
							
						
						default:
										
						break;
					}
	          switch ($_GET['message']) {
						case 'INIT_SESSION':
							print("<div class='err_message'> ".$lang_init_session."</div>");
						break;
						case 'USER_DELETED':
							print("<div class='err_message'>".$lang_user_deleted."</div>");
						break;
							
						default:
										
						break;
					}
	         
	         ?>
	         <h2>tuitflow</h2>
	         <h3><?php print($lang_sendmoneyto);?> <img src="<?php print(coin_icon); ?>" /></h3>
	         <div style="text-align: justify;">
	         <a><?php print($lang_main_description); ?>
	         	</a>
	         </div>
	         <br>
	         <div style="text-align: center; margin-top: 40px;">
	         <?php print($lang_logontext); ?><br>
	         <?php print($content_boton); ?></div>
	         </div>
	          <div class="footer">
	        tuitflow 2013 - <a href="https://github.com/tuitflow/tuitflow-dev" target="blank"><?php print($lang_license); ?></a> -  <a href="support.php" onclick="return !window.open(this.href, 'Support', 'width=500,height=500')"
    target="_blank"><?php print($lang_support); ?></a> - <a href="how_it_works_<?php print($switch_lang); ?>.php" onclick="return !window.open(this.href, 'hiw', 'width=500,height=500')"
    target="_blank"><?php print($lang_about); ?></a> - <a href="tos.php" onclick="return !window.open(this.href, 'tos', 'width=500,height=500')"><?php print($lang_tos); ?></a>
	    </div>     
	    </div>
	</div>    
	    <div class="left">
	    	<div class="left_container">
	    	<a class="font_followers"><strong><?php print($lang_tf_tweets); ?></strong></a><br>
	        <?php
	        $connection_own = new TwitterOAuth(OWN_CONSUMER_KEY, OWN_CONSUMER_SECRET, OWN_KEY, OWN_SECRET);
	        $ver_tuit=$connection_own->get('search/tweets',array("q"=>"#tuitflow","count" =>"3")); //TODO add "lang" => $switch_lang to get more fine results in the future
			$tuits_arr=get_object_vars($ver_tuit);
			foreach ($tuits_arr['statuses'] as $tuit) {
				$tuit_arr=get_object_vars($tuit);
				$tuit_img=get_object_vars($tuit_arr['user']);
			//print_r($tuit_arr['text']);
				print("<img src='".$tuit_img['profile_image_url_https']."' style='height:20px;width:auto;' /> <a class='font_followers'><strong>@".$tuit_img['screen_name']."</strong> ".$tuit_arr['text']."</a><br>");
			}
			//var_dump($tuits_arr);
	        ?>
	         </div>
	         <div class="left_container">
	        <?php
	        print("<strong>".$lang_ult24."</strong><br>");
	        print($lang_enviado." ".$money_class->GetMoneyManagedTime(24)." EUR<br>");
			
	        print("<br><strong>".$lang_ult48."</strong><br>");
	        print($lang_enviado." ".$money_class->GetMoneyManagedTime(48)." EUR<br>");
			
			print("<br><strong>".$lang_ult7d."</strong><br>");
	        print($lang_enviado." ".$money_class->GetMoneyManagedTime(168)." EUR<br>");
	         ?>	
	         </div>
	    </div> 
	   
</div>
</body>
</html>