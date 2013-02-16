<?php
include('config.php');
function CoinRate($curr){
	$ver_c=mysql_query("SELECT * FROM `currencies` WHERE `orig` LIKE 'EUR' AND `dest` LIKE '$curr' ");	
	$ver_cc=mysql_fetch_array($ver_c);
	$curr=$ver_cc['conversion'];
	return $curr;
}
    function StartElement($parser, $name, $attrs) { 
        if (!empty($attrs['RATE'])) {
			if($attrs['CURRENCY']=='USD' || $attrs['CURRENCY']=='GBP'){
            echo "1&euro;=".$attrs['RATE']." ".$attrs['CURRENCY']."<br />"; 
			mysql_query("UPDATE `currencies` SET `conversion` = '".$attrs['RATE']."' , `timestamp` = CURRENT_TIMESTAMP WHERE `currencies`.`orig` ='EUR' AND `currencies`.`dest` ='".$attrs['CURRENCY']."';");
			
			}
        }
    }
    $xml_parser= xml_parser_create();
    xml_set_element_handler($xml_parser, "StartElement", "");
    // for the following command you will need file_get_contents (PHP >= 4.3.0) 
    // and the config option allow_url_fopen=On (default)
    xml_parse($xml_parser, file_get_contents ("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml"));
    xml_parser_free($xml_parser);
	
	
		//USD to EUR
	
	$usd=CoinRate('USD');
	$eur=1;
	$rate=round($eur/$usd,5);
		mysql_query("UPDATE `currencies` SET `conversion` = '".$rate."' , `timestamp` = CURRENT_TIMESTAMP WHERE `currencies`.`orig` ='USD' AND `currencies`.`dest` ='EUR';");

	print('USD to EUR '.$rate.'<br />');
	
	
?>