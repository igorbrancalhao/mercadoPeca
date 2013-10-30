<?
## Email File -> notify user when a message is received
## called only from the messaging() class!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

## will be called only from the messaging() class!
$msg_details = $this->get_sql_row("SELECT u.name, u.email, u.mail_messaging_received FROM " . DB_PREFIX . "messaging m
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=m.receiver_id WHERE 
	m.message_id='" . $mail_input_id . "'");

$send = ($msg_details['mail_messaging_received']) ? true : false;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Existe uma nova mensagem em sua caixa de entrada.

Para visualizar suas mensagens clique no link abaixo:

%2$s

Atenciosamente,
Equipe %3$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Existe uma nova mensagem em sua caixa de entrada. <br>
<br>
<a href="%2$s">Clique aqui</a> para ver suas mensagens. <br>
<br>
Atenciosamente, <br>
Equipe %3$s';

$msg_board_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'messaging', 'section' => 'received'));

$text_message = sprintf($text_message, $msg_details['name'], $msg_board_link, $this->setts['sitename']);
$html_message = sprintf($html_message, $msg_details['name'], $msg_board_link, $this->setts['sitename']);

send_mail($msg_details['email'], 'Mensagem Recebida - ' . $setts['sitename'], $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
