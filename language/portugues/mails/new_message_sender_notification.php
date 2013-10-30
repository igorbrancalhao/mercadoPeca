<?
## Email File -> notify user when a message is sent
## called only from the messaging() class!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

## will be called only from the messaging() class!
$msg_details = $this->get_sql_row("SELECT u.name, u.email, u.mail_messaging_sent FROM " . DB_PREFIX . "messaging m
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=m.sender_id WHERE 
	m.message_id='" . $mail_input_id . "'");

$send = ($msg_details['mail_messaging_sent']) ? true : false;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Você postou uma nova mensagem usando a caixa de mensagens do site.

Para ver as mensaens enviadas por você clique no link abaixo:

%2$s

Atenciosamente,
Equipe %3$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Você postou uma nova mensagem usando a caixa de mensagens do site. <br>
<br>
<a href="%2$s">Clique aqui</a> para ver as mensaens enviadas por você. <br>
<br>
Atenciosamente, <br>
Equipe %3$s';

$msg_board_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'messaging', 'section' => 'sent'));

$text_message = sprintf($text_message, $msg_details['name'], $msg_board_link, $this->setts['sitename']);
$html_message = sprintf($html_message, $msg_details['name'], $msg_board_link, $this->setts['sitename']);

send_mail($msg_details['email'], 'Message Sent - ' . $this->setts['sitename'], $text_message, 
	$this->setts['admin_email'], $html_message, null, $send);
?>
