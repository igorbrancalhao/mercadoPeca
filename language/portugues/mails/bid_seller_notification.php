<?
## File Version -> v6.02
## Email File -> notify seller when a bid is placed
## called only from the bid.php page!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$bid_details = $db->get_sql_row("SELECT a.*, u.name AS seller_name, u.username, u.email, u.default_bid_placed_email 
	FROM " . DB_PREFIX . "auctions a 
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=a.owner_id
	WHERE a.auction_id='" . $mail_input_id . "'");

$send = ($bid_details['default_bid_placed_email']) ? true : false;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Uma nova proposta foi feita em um de seus leilões, %2$s.

Para ver os detalhes desta transação, por favor, clique no link abaixo:

%3$s
	
Atenciosamente, <br>
Equipe %4$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Uma nova proposta foi feita em um de seus leilões, %2$s. <br>
<br>
[ <a href="%3$s">Clique aqui</a> ] para ver os detalhes da proposta. <br>
<br>
Atenciosamente, <br>
Equipe %4$s';


$auction_link = process_link('auction_details', array('name' => $bid_details['name'], 'auction_id' => $bid_details['auction_id']));

$text_message = sprintf($text_message, $bid_details['seller_name'], $bid_details['name'], $auction_link, $setts['sitename']);
$html_message = sprintf($html_message, $bid_details['seller_name'], $bid_details['name'], $auction_link, $setts['sitename']);

send_mail($bid_details['email'], 'ID do Anúncio: ' . $bid_details['auction_id'] . ' - Nova Proposta Realizada', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
