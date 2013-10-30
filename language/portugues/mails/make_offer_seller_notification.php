<?
## Email File -> notify seller on a new offer placed 
## called only from the $item->place_offer() function!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$offer_details = $this->get_sql_row("SELECT o.*, u.name, u.username, u.email, a.name AS item_name, a.currency FROM " . DB_PREFIX . "auction_offers o 
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=o.seller_id
	LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=o.auction_id
	WHERE o.offer_id='" . $mail_input_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Uma nova proposta foi feita em seu anúncio, %2$s.

Detalhes da Proposta:

	- preço: %3$s
	- quantidade requerida: %4$s
	
Para ver todas propostas feitas para este leilão, por favor, clique no link abaixo:

%5$s

Atenciosamente, <br>
Equipe %6$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Uma nova proposta foi feita em seu anúncio, %2$s. <br>
<br>
Detalhes da Proposta: <br>
<ul>
	<li>Preço: <b>%3$s</b> </li>
	<li>Quantidade Requerida: <b>%4$s</b> </li>
</ul>
<br>
[ <a href="%5$s">Clique aqui</a> ] para ver todas propostas feitas para este leilão. <br>
<br>
Atenciosamente, <br>
Equipe %6$s';


$offer_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'selling', 'section' => 'view_offers', 'auction_id' => $offer_details['auction_id']));

$this->fees = new fees();
$this->fees->setts = $this->setts;
$offer_price = $this->fees->display_amount($offer_details['amount'], $offer_details['currency']);

$text_message = sprintf($text_message, $offer_details['name'], $offer_details['item_name'], $offer_price, $offer_details['quantity'], $offer_link, $this->setts['sitename']);
$html_message = sprintf($html_message, $offer_details['name'], $offer_details['item_name'], $offer_price, $offer_details['quantity'], $offer_link, $this->setts['sitename']);

send_mail($offer_details['email'], 'ID do Anúncio: ' . $offer_details['auction_id'] . ' - Nova Proposta Realizada', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
