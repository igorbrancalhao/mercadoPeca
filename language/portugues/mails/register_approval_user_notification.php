<?
## Email File -> registration approval - user notification
## called only from the register.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.user_id, u.name, u.username, u.email FROM " . DB_PREFIX . "users u WHERE 
	u.user_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Sua conta em %2$s foi cria da com sucesso.

Seu login é:

	- usuário: %3$s
	- senha: -sua senha escolhida-

Sua conta será manualmente ativada pelo adminstrador do site.
Você será notificado quando isto acontecer.
	
Atenciosamente,
Equipe %2$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Sua conta em <b>%2$s</b> foi cria da com sucesso. <br>
<br>
Os detalhes de seu login são:<br>
<ul>
	<li>Usuário: <b>%3$s</b></li>
	<li>Senha: -sua senha escolhida-</li>
</ul>
Sua conta será manualmente ativada pelo adminstrador do site.<br>
Você será notificado quando isto acontecer.<br>
<br>
Atenciosamente, <br>
Equipe %2$s';


$text_message = sprintf($text_message, $row_details['name'], $setts['sitename'], $row_details['username']);
$html_message = sprintf($html_message, $row_details['name'], $setts['sitename'], $row_details['username']);

send_mail($row_details['email'], $setts['sitename'] . ' - Confirmaçaõ de Registro', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
