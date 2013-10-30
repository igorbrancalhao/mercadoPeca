<?
## Email File -> registration success - signup fee enabled
## called only from the $fees->callback_procees() function

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $this->get_sql_row("SELECT u.name, u.username, u.email FROM " . DB_PREFIX . "users u WHERE u.user_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Sua conta em %2$s foi ativada com sucesso.

Os detalhes de seu login s�o:

	- usu�rio: %3$s
	- senha: -senha escolhida por voc�-

Atenciosamente,
Equipe %2$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Sua conta em <b>%2$s</b> foi criada com sucesso. <br>
<br>
Seus detalhes de login s�o:<br>
<ul>
	<li>Usu�rio: <b>%3$s</b></li>
	<li>Senha: -senha escolhida por voc�-</li>
</ul>
Atenciosamente, <br>
Equipe %2$s';


$text_message = sprintf($text_message, $row_details['name'], $this->setts['sitename'], $row_details['username']);
$html_message = sprintf($html_message, $row_details['name'], $this->setts['sitename'], $row_details['username']);

send_mail($row_details['email'], $this->setts['sitename'] . ' - Confirma��o de Registro', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
