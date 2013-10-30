<?
## Email File -> registration approval - admin notification
## called only from the register.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.user_id, u.name, u.username, u.email FROM " . DB_PREFIX . "users u WHERE 
	u.user_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Uma nova conta que requer aprova��o do administrador foi criada.

Detalhes do Usu�rio:

	- usu�rio: %1$s
	- id do usu�rio: %2$s

Por favor acesse a �rea Administrativa -> P�gina de Gerenciamento de Usu�rios, a fim de gerir a conta rec�m-criada.';

## html message - editable
$html_message = 'Uma nova conta que requer aprova��o do administrador foi criada. <br>
<br>
Detalhes do Usu�rio:<br>
<ul>
	<li>Usu�rio: <b>%1$s</b></li>
	<li>ID do Usu�rio: <b>%2$s</b></li>
</ul>
Por favor acesse a <b>�rea Administrativa</b> -> <b>P�gina de Gerenciamento de Usu�rios</b>, a fim de gerir a conta rec�m-criada.';


$text_message = sprintf($text_message, $row_details['username'], $row_details['user_id']);
$html_message = sprintf($html_message, $row_details['username'], $row_details['user_id']);

send_mail($setts['admin_email'], $setts['sitename'] . ' - Aprovar Registro', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
