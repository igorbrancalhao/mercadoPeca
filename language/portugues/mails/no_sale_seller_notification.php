<?
## Email File -> notify seller if an item closed but there was no sale
## called only from the main_cron.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.name, u.username, u.email, u.mail_item_closed, 
	a.name AS item_name, a.currency, a.auction_id FROM " . DB_PREFIX . "auctions a 
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=a.owner_id
	WHERE a.auction_id='" . $mail_input_id . "'");

$send = ($row_details['mail_item_closed']) ? true : false;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Seu anúncio, %2$s, fechou sem vencedores.
Isto aconteceu porque não houve lances ou os mesmos não alcançaram o preço de reserva.

Para ver os detalhes do leilão, siga a URL abaixo:

%3$s

Atenciosamente,
Equipe %4$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Seu anúncio, %2$s, fechou sem vencedores. <br>
Isto aconteceu porque não houve lances ou os mesmos não alcançaram o preço de reserva. <br>
<br>
[ <a href="%3$s">Clique aqui</a> ] para ver os detalhes do leilão. <br>
<br>
Atenciosamente, <br>
Equipe %4$s';


$auction_link = process_link('auction_details', array('name' => $row_details['item_name'], 'auction_id' => $row_details['auction_id']));

$text_message = sprintf($text_message, $row_details['name'], $row_details['item_name'], $auction_link, $setts['sitename']);
$html_message = sprintf($html_message, $row_details['name'], $row_details['item_name'], $auction_link, $setts['sitename']);

send_mail($row_details['email'], 'ID do Leilão: ' . $row_details['auction_id'] . ' - Leilão Encerrado', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
