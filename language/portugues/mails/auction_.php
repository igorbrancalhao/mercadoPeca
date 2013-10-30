<?
## File Version -> v6.02
## Email File -> notify user when his auction is approved by the admin
## called only from admin/list_auctions.php

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT a.*, u.name AS user_name, u.username, u.email FROM " . DB_PREFIX . "auctions a
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=a.owner_id
	WHERE a.auction_id='" . $mail_input_id . "'");

$send = true; ## always sent

## text message - editable
$text_message = 'Prezado(a) %1$s,

Seu anúncio, %2$s, foi aprovado.

Para ver os detalhes do anúncio, por favor clique na URL abaixo:
	
%3$s

Atenciosamente,
Equipe %4$s';

## html message - editable
$html_message = 'Preazado(a) %1$s, <br>
<br>
Seu anúncio, %2$s, foi aprovado. <br>
<br>
[ <a href="%3$s">Clique aqui</a> ] para ver os detalhes do anúncio.  <br>
<br>
Atenciosamente, <br>
Equipe %4$s';


$auction_link = process_link('auction_details', array('name' => $row_details['name'], 'auction_id' => $row_details['auction_id']));

$text_message = sprintf($text_message, $row_details['user_name'], $row_details['name'], $auction_link, $setts['sitename']);
$html_message = sprintf($html_message, $row_details['user_name'], $row_details['name'], $auction_link, $setts['sitename']);

send_mail($row_details['email'], 'ID do Anúncio: ' . $row_details['auction_id'] . ' - Anúncio Aprovado', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
