<?
## Email File -> retrieve username
## called only from the retrieve_password.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.username, u.email FROM " . DB_PREFIX . "users u WHERE u.email='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Prezado(a) Cliente,

Seu usuário para %1$s é: %2$s

Atenciosamente,
Equipe %1$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Seu Usuário para %1$s é: <b>%2$s</b> <br>
<br>
Atenciosamente, <br>
Equipe %1$s';


$text_message = sprintf($text_message, $setts['sitename'], $row_details['username']);
$html_message = sprintf($html_message, $setts['sitename'], $row_details['username']);

send_mail($row_details['email'], $setts['sitename'] . ' - Recuperação de Usuário', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
