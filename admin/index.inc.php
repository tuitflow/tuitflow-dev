<?php

//Estadisticas

//Ver usuarios registrados
$ver_usuarios=mysql_query("SELECT id FROM users;");
$num_users=mysql_num_rows($ver_usuarios);
print("<strong>Usuarios</strong><br>");
print("Usuarios registrados: ".$num_users."<br>");
$ver_usuarios=mysql_query("SELECT id FROM users WHERE active = '1';");
$num_users=mysql_num_rows($ver_usuarios);
print("Usuarios activos: ".$num_users."<br>");


print("<br><strong>Fondos</strong><br>");
$ver_usuarios=mysql_query("SELECT sum(amount) FROM paypal_payments WHERE status = '1' AND hash != 'INITIAL_PAYMENT' AND hash != 'VOUCHER_CODE';");
$ver_pasta=mysql_fetch_array($ver_usuarios);
print("Total fondos añadidos a paypal: ".$ver_pasta['sum(amount)']."<br>");

$ver_usuarios=mysql_query("SELECT sum(amount) FROM paypal_refunds WHERE status = 'OK';");
$ver_pastab=mysql_fetch_array($ver_usuarios);
print("Total fondos retirados desde paypal: ".$ver_pastab['sum(amount)']."<br>");

$teorico_paypal=$ver_pasta['sum(amount)']-$ver_pastab['sum(amount)'];
print("Total fondos teoricos en paypal: ".$teorico_paypal."<br>");


$ver_usuarios=mysql_query("SELECT sum(balance) FROM account_balance;");
$ver_pastab=mysql_fetch_array($ver_usuarios);
print("Total en cuentas de usuarios: ".$ver_pastab['sum(balance)']."<br>");
$percent_core=round(($teorico_paypal/$ver_pastab['sum(balance)'])*100,2);
print("Core capital: ".$percent_core."%<br>");

print("<br><br><strong>Usuarios</strong><br>");
print("Ultimos usuarios registrados: <br>");
$ver_ususarios=mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 30;");
while($user=mysql_fetch_array($ver_ususarios)){
	print($user['screen_name']." - ".$user['created']."<br>");
}

print("<br><br>Ultimas transacciones: <br>");
$ver_trans=mysql_query("SELECT * FROM transactions ORDER BY id DESC LIMIT 30;");
while($trans=mysql_fetch_array($ver_trans)){
	print($trans['from_user_id']." -> ".$trans['to_twitter_user_id']." - ".$trans['amount']." - ".$trans['date']."<br>");
}
?>