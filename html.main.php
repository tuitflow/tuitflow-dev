<?php
include('rosetta.php');
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('classes.php');
$user_class=New Users();
$money_class=New MoneyStuff();
$content_boton = '<a href="./redirect.php"><img border="0" src="button_new_sh_'.$switch_lang.'.png" alt="Sign in with Twitter"/></a>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>tuitflow</title>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<style type='text/css'>
.wrapper{
   width: 100%;
   margin: 0 auto;
}
.header{
   float: left;
   width: 100%;
   background-color: #660066;
  
   padding-top:10px;
   padding-bottom:10px;
   position: relative;
   
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
   /* background-color: #F0E6F0; */
  background:url(fpeq_c.jpg)no-repeat fixed center;
  background-size: cover;
  font-family: 'Source Sans Pro';

        }

.text_big{
	  text-shadow: 0px 0px 1px #660066;
        filter: dropshadow(color=#660066, offx=0, offy=0);
        
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
   	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border-style:solid;
	border-width:1px;
	border-color:rgba(102,0,102, 0.1);
	
}
.right_container{
	
	
	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	/* background-color:#7777CC; */
	line-height: 22px;
	
   	
}
.footer{
   float: left;
   width: 100%;
   padding-left:10px;
   margin-top:20px;
   line-height: 22px;
   	
}

.left_container_ad{

	padding-left:10px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:10px;
	background-color:#fff;
	margin-bottom:10px;
	line-height: 22px;
	   	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border-style:solid;
	border-width:1px;
	border-color:rgba(102,0,102, 0.1);
	text-align:center;
   	
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
.links{
	
	color:#fff;
	text-decoration:none;
	font-size:11px;
	margin-right:20px;
}
.links_font{
	
	color:#000;
	text-decoration:none;
	font-size:11px;
	margin-right:20px;
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
        <a class="font_header" href="index.php" style="color:#fff"><img style="margin-left:10px;width: 150px; height: auto;" src="images/logo_fondo.png" border="0" /></a>
        
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
	         <h2><span class="text_big">tuitflow - <?php print($lang_sendmoneyto);?></span></h2>
	         <div style="margin-bottom: 50px"><a ><?php print($lang_sendmoneytosub);?></a></div>
	         <div style="text-align: left; float:left; margin-right: 20px;height: 75px;margin-top: 20px;"><img style="height: 40px;width: auto; " src="moneditas.png" border="0" /></div>
	         <div style="text-align: justify;margin-top: 30px;">
	         <h3><span class="text_big"><?php print($lang_main_description1); ?></span></h3>	
	         <a><?php print($lang_main_description); ?>
	         	</a>
	         </div>
	         <br>
	         
	         <div style="text-align: right; float:left; margin-right: 20px;margin-top: 70px;height: 200px"><img style="height: 50px;width: auto;" src="pig.png" border="0" /></div>
	         <div style="text-align: justify;margin-top: 40px;margin-right: 20px; ">
	         <h3><span class="text_big"><?php print($lang_main_secure1); ?></span></h3>
	         <a>+ <?php print($lang_main_secure2); ?></a><br>
	         <a>+ <?php print($lang_main_secure3); ?></a><br>
	         <a>+ <?php print($lang_main_secure4); ?></a><br>
	         </div>
	         <br />
	         <div style="text-align: center; margin-top: 30px;display: block;">
	         <strong><span class="text_big"><?php print($lang_logontext); ?></span></strong><br>
	         <?php print($content_boton); ?></div>
	         </div>
	        
	          <div class="footer">
	        <a class="links_font"> tuitflow 2013 </a> <a class="links" href="https://github.com/tuitflow/tuitflow-dev" target="blank"><?php print($lang_license); ?></a>  <a class="links" href="support.php" onclick="return !window.open(this.href, 'Support', 'width=500,height=500')"
    target="_blank"><?php print($lang_support); ?></a> <a class="links" href="how_it_works_<?php print($switch_lang); ?>.php" onclick="return !window.open(this.href, 'hiw', 'width=500,height=500')"
    target="_blank"><?php print($lang_about); ?></a> <a class="links" href="tos.php" onclick="return !window.open(this.href, 'tos', 'width=500,height=500')"><?php print($lang_tos); ?></a> <a class="links" href="http://www.flickr.com/photos/leecullivan/" style="font-size:10px"> background image by leecullivan</a>
	    </div>     
	    </div>
	</div>    
	    <div class="left">
	    	<div class="left_container">
	    	<a class="font_followers"><?php print($lang_tf_tweets); ?></a><br>
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
	         <div class="left_container_ad">
	        <?php
	        print(SQUARE_AD_BANNER); 
	        /*
	        print("<strong>".$lang_ult24."</strong><br>");
	        print($lang_enviado." ".$money_class->GetMoneyManagedTime(24)." EUR<br>");
			
	        print("<br><strong>".$lang_ult48."</strong><br>");
	        print($lang_enviado." ".$money_class->GetMoneyManagedTime(48)." EUR<br>");
			
			print("<br><strong>".$lang_ult7d."</strong><br>");
	        print($lang_enviado." ".$money_class->GetMoneyManagedTime(168)." EUR<br>");
			 * 
			 */
	         ?>	
	         </div>
	    </div> 
	   
</div>
</body>
</html>