<?
## Email File -> apply for tax exempt notification
## called only from the $user->insert() and $user->update() functions!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $this->get_sql_row("SELECT u.* FROM " . DB_PREFIX . "users u 
	WHERE u.user_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Um novo usuário solicitou isenção de taxa.

Detalhes do Usuário:

	- usuário: %1$s
	- ID do usuário: %2$s
	
Número de Reg. da Taxa: %3$s

Para verificar a validade do Reg. da Taxa, clique no link abaixo:

%4$s

NOTA: Este link só se aplica nos EUA.

Você precisa ativar o Número de Reg. da Taxa na área admin, na página do administrador.';

## html message - editable
$html_message = 'Um novo usuário solicitou isenção de taxa. <br>
<br>
Detalhes do Usuário: <br>
<ul>
	<li>Usuário: <b>%1$s</b></li>
	<li>ID do Usuário: <b>%2$s</b></li>
</ul>
Número de Reg. da Taxa: <b>%3$s</b> <br>
<br>
Para verificar a validade do Reg. da Taxa, [ <a href="%4$s">clique aqui</a> ]. <br>
<br>
<b>NOTA</b>: Este link só se aplica nos EUA.	<br>
<br>
Você precisa ativar o Número de Reg. da Taxa na <b>Area Admin</b> - <b>Página do Administrador</b>.';


$vat_verify_link = 'http://europa.eu.int/comm/taxation_customs/vies/en/vieshome.htm';

$text_message = sprintf($text_message, $row_details['username'], $row_details['user_id'], $row_details['tax_reg_number'], $vat_verify_link);
$html_message = sprintf($html_message, $row_details['username'], $row_details['user_id'], $row_details['tax_reg_number'], $vat_verify_link);

send_mail($this->setts['admin_email'], 'Nova isenção de Taxa Requerida', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
