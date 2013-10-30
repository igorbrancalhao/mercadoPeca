<?
## Email File -> notify user that his account has been suspended because the debit limit was exceeded.
## called only from the suspend_debit_users() function

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.name AS buyer_name, u.username, u.email, u.balance FROM " . DB_PREFIX . "users u WHERE
	u.user_id=" . $mail_input_id);

$send = true; ## always send

## text message - editable
$text_message = 'Prezado(a) %1$s,
	
Sua conta em %2$s foi suspensa por falta de pagamento.

Seu saldo é: %3$s

Caso queira reativar sua conta, você terá que atualizar seu débito.
Por favor, clique no link abaixo para acessar nossa página de pagamentos:
	
%4$s
	
Você terá que logar-se primeiro.
	
Atenciosamente, <br>
Equipe %2$s';

## html message - editable
$html_message = 'Prezado(a) %1$s,<br>
<br>
Sua conta em %2$s foi suspensa por falta de pagamento.<br>
<br>
Seu saldo é: <b>%3$s</b> <br>
<br>
Caso queira reativar sua conta, você terá que atualizar seu débito. <br>
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

send_mail($row_details['email'], $setts['sitename'] . ' - Conta Suspensa', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
