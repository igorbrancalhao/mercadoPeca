<?
## Email File -> invoice users periodically if site is in account mode and 
## called only from the invoice_cron.php page!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sql_select_users = $db->query("SELECT u.name AS buyer_name, u.username, u.email, u.balance FROM " . DB_PREFIX . "users u WHERE 
	u.balance>" . $setts['min_invoice_value']);

$send = true; ## always send

## send to all the winners of the auction for which the bank details have been set/changed
while ($row_details = $db->fetch_array($sql_select_users))
{
	## text message - editable
	$text_message = 'Prezado(a) %1$s,
	
Existe uma fatura a ser saldada no site,
%2$s.

Seu saldo é: %3$s

Por favor, clique no link abaixo para acessar nossa página de pagamento:
	
%4$s
	
Você terá que logar-se primeiro.
	
Atenciosamente, <br>
Equipe %2$s';
	
	## html message - editable
	$html_message = 'Prezado(a) %1$s,<br>
<br>
Existe uma fatura a ser saldada no site, <br>
%2$s.<br>
<br>
Seu saldo é: <b>%3$s</b> <br>
<br>
Por favor, [ <a href="%4$s">clique aqui</a> ] para acessar nossa página de pagamentos. <br>
<br>
Você terá que logar-se primeiro. <br>
<br>
Atenciosamente, <br>
Equipe %2$s';
	
	
	$payment_link = SITE_PATH . 'login.php?redirect=' . process_link('fee_payment', array('do' => 'clear_balance'));
	$balance_amount = $fees->display_amount($row_details['balance'], $setts['currency']);
	
	$text_message = sprintf($text_message, $row_details['buyer_name'], $setts['sitename'], $balance_amount, $payment_link);
	$html_message = sprintf($html_message, $row_details['buyer_name'], $setts['sitename'], $balance_amount, $payment_link);
	
	send_mail($row_details['email'], $setts['sitename'] . ' Cobrança', $text_message,
		$setts['admin_email'], $html_message, null, $send);
}
?>
