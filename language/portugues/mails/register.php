<?
## Email File -> registration confirmation message
## called only from the register.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

if ($mail_input_id)
{
	$row_details = $db->get_sql_row("SELECT u.user_id, u.name, u.username, u.email FROM " . DB_PREFIX . "users u WHERE 
		u.user_id='" . $mail_input_id . "'");
}
## otherwise row_details is provided from the file calling this email

$send = true; // always sent;

## text message - editable
$text_message = 'Cliente: %1$s,

Sua conta em %2$s foi criada com sucesso.

Seu Login é:

	- usuário: %3$s
	- senha: <senha escolhida>

Para finalizar a ativação de sua conta, por favor, clique no Link abaixo:

%4$s
	
Atenciosamente,
Equipe %2$s';

## html message - editable
$html_message = 'Cliente: %1$s, <br>
<br>
Sua conta em <b>%2$s</b> foi criada com sucesso. <br>
<br>
Seu Login é:<br>
<ul>
	<li>Usuário: <b>%3$s</b></li>
	<li>Senha: <senha escolhida></li>
</ul>
Por favor [ <a href="%4$s">clique Aqui</a> ] para ativar sua conta. <br>
<br>
Atenciosamente, <br>
Equipe %2$s';


$activation_link = SITE_PATH . 'account_activate.php?user_id=' . $row_details['user_id'] . '&username=' . $row_details['username'];

$text_message = sprintf($text_message, $row_details['name'], $setts['sitename'], $row_details['username'], $activation_link);
$html_message = sprintf($html_message, $row_details['name'], $setts['sitename'], $row_details['username'], $activation_link);

send_mail($row_details['email'], $setts['sitename'] . ' - Confirmação de Registro', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
