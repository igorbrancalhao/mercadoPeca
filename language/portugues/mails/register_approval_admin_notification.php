<?
## Email File -> registration approval - admin notification
## called only from the register.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.user_id, u.name, u.username, u.email FROM " . DB_PREFIX . "users u WHERE 
	u.user_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Uma nova conta que requer aprovação do administrador foi criada.

Detalhes do Usuário:

	- usuário: %1$s
	- id do usuário: %2$s

Por favor acesse a Área Administrativa -> Página de Gerenciamento de Usuários, a fim de gerir a conta recém-criada.';

## html message - editable
$html_message = 'Uma nova conta que requer aprovação do administrador foi criada. <br>
<br>
Detalhes do Usuário:<br>
<ul>
	<li>Usuário: <b>%1$s</b></li>
	<li>ID do Usuário: <b>%2$s</b></li>
</ul>
Por favor acesse a <b>Área Administrativa</b> -> <b>Página de Gerenciamento de Usuários</b>, a fim de gerir a conta recém-criada.';


$text_message = sprintf($text_message, $row_details['username'], $row_details['user_id']);
$html_message = sprintf($html_message, $row_details['username'], $row_details['user_id']);

send_mail($setts['admin_email'], $setts['sitename'] . ' - Aprovar Registro', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
