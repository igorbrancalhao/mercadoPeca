<?
## Email File -> retrieve username
## called only from the retrieve_password.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.name, u.username, u.email FROM " . DB_PREFIX . "users u WHERE u.username='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Sua senha em %2$s foi recuperada com sucesso.

Os detalhes de seu login são:

	- usuário: %3$s
	- senha: %4$s

Atenciosamente,
Equipe %2$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Sua senha em <b>%2$s</b> foi recuperada com sucesso. <br>
<br>
Os detalhes de seu login são:<br>
<ul>
	<li>Usuário: <b>%3$s</b></li>
	<li>Senha: <b>%4$s</b></li>
</ul>
Atenciosamente, <br>
Equipe %2$s';


$text_message = sprintf($text_message, $row_details['name'], $setts['sitename'], $row_details['username'], $new_password);
$html_message = sprintf($html_message, $row_details['name'], $setts['sitename'], $row_details['username'], $new_password);

send_mail($row_details['email'], $setts['sitename'] . ' - Detalhes de Recuperação de Senha', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
