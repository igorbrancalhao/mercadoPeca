<?
## Email File -> auction approval admin notification
## called only from $item->auction_approval()!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$send = true; // always sent;

## text message - editable
$text_message = 'Um leilão que requer aprovação do Administrador foi publicado / editado.

Por favor verifique a Área Admin -> Gestão de Leilões -> Leilões Pendentes de Aprovação para maiores detalhes.';

## html message - editable
$html_message = 'Um leilão que requer aprovação do Administrador foi publicado / editado. <br>
<br>
Por favor verifique a <b>Área Admin</b> -> <b>Gestão de Leilões</b> -> <b>Leilões Pendentes de Aprovação</b> para maiores detalhes.';

send_mail($this->setts['admin_email'], 'Requizição de Aprovação de Leilão', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
