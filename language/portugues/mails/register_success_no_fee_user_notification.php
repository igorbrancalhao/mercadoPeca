<?
## Email File -> registration success - signup fee disabled
## called only from the register.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.name, u.username, u.email FROM " . DB_PREFIX . "users u WHERE u.user_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Sua conta em %2$s foi criada com sucesso.

Seus detalhes de login são:

	- usuário: %3$s
	- senha: -senha escolhida-

Atenciosamente,
Equipe %2$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Sua conta em <b>%2$s</b> foi criada com sucesso. <br>
<br>
Seu Login é:<br>
<ul>
	<li>Usuário: <b>%3$s</b></li>
	<li>Senha: -senha escolhida por você-</li>
</ul>
Atenciosamente, <br>
Equipe %2$s';


$text_message = sprintf($text_message, $row_details['name'], $setts['sitename'], $row_details['username']);
$html_message = sprintf($html_message, $row_details['name'], $setts['sitename'], $row_details['username']);

send_mail($row_details['email'], $setts['sitename'] . ' - Registro Efetuado', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
