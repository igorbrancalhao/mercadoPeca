<?
## Email File -> abuse report admin notification

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$abuse_details = $db->get_sql_row("SELECT a.*, u.username FROM " . DB_PREFIX . "abuses a
	LEFT JOIN " . DB_PREFIX . "users u ON a.user_id=u.user_id
	WHERE a.abuse_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Uma den�ncia de abuso foi feita por %1$s a respeito de %2$s.

Coment�rios sobre o abuso: %3$s

Por favor verifique a �rea Admin -> Configura��es de Usu�rios -> Den�ncias de Abusos para ver os detalhes sobre esta den�ncia.';

## html message - editable
$html_message = 'Uma den�ncia de abuso foi feita por <b>%1$s</b> a respeito de <b>%2$s</b>. <br>
<br>
Abuse report comments: %3$s <br>
<br>
Por favor verifique a <b>�rea Admin</b> -> <b>Configura��es de Usu�rios</b> -> <b>Den�ncias de Abusos</b> para ver os detalhes sobre esta den�ncia.';


$text_message = sprintf($text_message, $abuse_details['username'], $abuse_details['abuser_username'], $abuse_details['comment']);
$html_message = sprintf($html_message, $abuse_details['username'], $abuse_details['abuser_username'], $abuse_details['comment']);

send_mail($setts['admin_email'], 'Den�ncia de Abuso Cometido - #' . $abuse_details['abuse_id'], $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
