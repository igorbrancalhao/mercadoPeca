<?
## Email File -> abuse report admin notification

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$abuse_details = $db->get_sql_row("SELECT a.*, u.username FROM " . DB_PREFIX . "abuses a
	LEFT JOIN " . DB_PREFIX . "users u ON a.user_id=u.user_id
	WHERE a.abuse_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Uma denúncia de abuso foi feita por %1$s a respeito de %2$s.

Comentários sobre o abuso: %3$s

Por favor verifique a Área Admin -> Configurações de Usuários -> Denúncias de Abusos para ver os detalhes sobre esta denúncia.';

## html message - editable
$html_message = 'Uma denúncia de abuso foi feita por <b>%1$s</b> a respeito de <b>%2$s</b>. <br>
<br>
Abuse report comments: %3$s <br>
<br>
Por favor verifique a <b>Área Admin</b> -> <b>Configurações de Usuários</b> -> <b>Denúncias de Abusos</b> para ver os detalhes sobre esta denúncia.';


$text_message = sprintf($text_message, $abuse_details['username'], $abuse_details['abuser_username'], $abuse_details['comment']);
$html_message = sprintf($html_message, $abuse_details['username'], $abuse_details['abuser_username'], $abuse_details['comment']);

send_mail($setts['admin_email'], 'Denúncia de Abuso Cometido - #' . $abuse_details['abuse_id'], $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
