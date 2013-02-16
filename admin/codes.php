<?php
$ver_usuarios=mysql_query("SELECT * FROM vouchers WHERE redeemed = '0';");
while($voucher=mysql_fetch_array($ver_usuarios)){
	print("<strong>".$voucher['promo_code']."</strong> - ".$voucher["amount"]." ".$voucher['currency']." ".$voucher['valid_until']." <br>");
	
	
}

?>