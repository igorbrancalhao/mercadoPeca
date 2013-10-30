<?
## File Version -> v6.02
## Email File -> invoice users periodically if site is in account mode and 
## called only from the invoice_cron.php page!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.name AS buyer_name, u.username, u.email, u.balance FROM " . DB_PREFIX . "users u WHERE 
	u.user_id='" . $mail_input_id . "'");

$send = true; ## always send

## text message - editable
$text_message = 'Prezado(a) %1$s,
	
Esta � uma fatura para para ser quitada em nosso site,
%2$s.

Seu saldo �: %3$s

Por favor, clique no link abaixo para acessar a p�gina de pagamentos:
	
%4$s
	
Voc� ter� que logar-se primeiro.
	
Atenciosamente,
Equipe %2$s';
	
## html message - editable
$html_message = 'Prezado(a) %1$s,<br>
<br>
Esta � uma fatura para para ser quitada em nosso site, <br>
%2$s.<br>
<br>
Seu saldo �: <b>%3$s</b> <br>
<br>
Por favor, [ <a href="%4$s">clique aqui</a> ] para acessar nossa p�gina de pagamentos. <br>
<br>
Voc� ter� que logar-se primeiro. <br>
<br>
Atenciosamente, <br>
Equipe %2$s';
	
	
$payment_link = SITE_PATH . 'login.php?redirect=' . process_link('fee_payment', array('do' => 'clear_balance'));
$balance_amount = $fees->display_amount($row_details['balance'], $setts['currency']);
	
$text_message = sprintf($text_message, $row_details['buyer_name'], $setts['sitename'], $balance_amount, $payment_link);
$html_message = sprintf($html_message, $row_details['buyer_name'], $setts['sitename'], $balance_amount, $payment_link);
	
send_mail($row_details['email'], $setts['sitename'] . ' Cobran�a', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
