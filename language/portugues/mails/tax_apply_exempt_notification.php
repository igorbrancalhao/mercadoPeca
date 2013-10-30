<?
## Email File -> apply for tax exempt notification
## called only from the $user->insert() and $user->update() functions!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $this->get_sql_row("SELECT u.* FROM " . DB_PREFIX . "users u 
	WHERE u.user_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Um novo usu�rio solicitou isen��o de taxa.

Detalhes do Usu�rio:

	- usu�rio: %1$s
	- ID do usu�rio: %2$s
	
N�mero de Reg. da Taxa: %3$s

Para verificar a validade do Reg. da Taxa, clique no link abaixo:

%4$s

NOTA: Este link s� se aplica nos EUA.

Voc� precisa ativar o N�mero de Reg. da Taxa na �rea admin, na p�gina do administrador.';

## html message - editable
$html_message = 'Um novo usu�rio solicitou isen��o de taxa. <br>
<br>
Detalhes do Usu�rio: <br>
<ul>
	<li>Usu�rio: <b>%1$s</b></li>
	<li>ID do Usu�rio: <b>%2$s</b></li>
</ul>
N�mero de Reg. da Taxa: <b>%3$s</b> <br>
<br>
Para verificar a validade do Reg. da Taxa, [ <a href="%4$s">clique aqui</a> ]. <br>
<br>
<b>NOTA</b>: Este link s� se aplica nos EUA.	<br>
<br>
Voc� precisa ativar o N�mero de Reg. da Taxa na <b>Area Admin</b> - <b>P�gina do Administrador</b>.';


$vat_verify_link = 'http://europa.eu.int/comm/taxation_customs/vies/en/vieshome.htm';

$text_message = sprintf($text_message, $row_details['username'], $row_details['user_id'], $row_details['tax_reg_number'], $vat_verify_link);
$html_message = sprintf($html_message, $row_details['username'], $row_details['user_id'], $row_details['tax_reg_number'], $vat_verify_link);

send_mail($this->setts['admin_email'], 'Nova isen��o de Taxa Requerida', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
