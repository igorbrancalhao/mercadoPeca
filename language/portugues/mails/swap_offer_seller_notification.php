<?
## Email File -> notify seller on a new swap offer placed 
## called only from the $item->place_offer() function!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$offer_details = $this->get_sql_row("SELECT s.*, u.name, u.username, u.email, a.name AS item_name, a.currency FROM " . DB_PREFIX . "swaps s 
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=s.seller_id
	LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=s.auction_id
	WHERE s.swap_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Uma nova oferta de troca foi feita em seu produto, %2$s.

Detalhes da Oferta:

	- quantidade requisitada: %3$s
	
	- item oferecido em troca: %4$s
	
Para ver todas ofertas ativas para este produto, por favor, clique no link abaixo:

%5$s

Atenciosamente,
Equipe %6$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Uma nova oferta de troca foi feita em seu produto, %2$s. <br>
<br>
Detalhes da Oferta: <br>
<ul>
	<li>Quantidade Requisitada: <b>%3$s</b> </li>
	<li>Item Oferecido em Troca: %4$s </li>
</ul>
<br>
[ <a href="%5$s">Clique aqui</a> ] para ver todas ofertas ativas para este produto. <br>
<br>
Atenciosamente, <br>
Equipe %6$s';


$offer_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'selling', 'section' => 'view_offers', 'auction_id' => $offer_details['auction_id']));

$text_message = sprintf($text_message, $offer_details['name'], $offer_details['item_name'], $offer_details['quantity'], $offer_details['description'], $offer_link, $this->setts['sitename']);
$html_message = sprintf($html_message, $offer_details['name'], $offer_details['item_name'], $offer_details['quantity'], $offer_details['description'], $offer_link, $this->setts['sitename']);

send_mail($offer_details['email'], 'Auction ID: ' . $offer_details['auction_id'] . ' - NovaOferta Realizada', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
