<?
## Email File -> auction approval admin notification
## called only from $item->auction_approval()!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$send = true; // always sent;

## text message - editable
$text_message = 'Um leil�o que requer aprova��o do Administrador foi publicado / editado.

Por favor verifique a �rea Admin -> Gest�o de Leil�es -> Leil�es Pendentes de Aprova��o para maiores detalhes.';

## html message - editable
$html_message = 'Um leil�o que requer aprova��o do Administrador foi publicado / editado. <br>
<br>
Por favor verifique a <b>�rea Admin</b> -> <b>Gest�o de Leil�es</b> -> <b>Leil�es Pendentes de Aprova��o</b> para maiores detalhes.';

send_mail($this->setts['admin_email'], 'Requizi��o de Aprova��o de Leil�o', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
