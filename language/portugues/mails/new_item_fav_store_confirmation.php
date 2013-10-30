<?
## File Version -> v6.02
## Email File -> confirm posting to the seller
## called only from the sell_item.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sql_select_fav_stores = $db->query("SELECT a.*, u.name AS user_name, u.email FROM " . DB_PREFIX . "favourite_stores fs,
	" . DB_PREFIX . "auctions a, " . DB_PREFIX . "users u WHERE 
	a.auction_id='" . $mail_input_id . "' AND a.owner_id=fs.store_id AND u.user_id=fs.user_id" );

$send = true; // always sent

while ($row_details = $db->fetch_array($sql_select_fav_stores))
{
	## text message - editable
	$text_message = 'Prezado(a) %1$s,

Um novo anúncio foi postado em uma de suas lojas favoritas:

	- nome do anúncio: %3$s
	- tipo de anúncio: %4$s
	- quantidade oferecida: %5$s

	- preço incial: %6$s
	- preço de compra rápida: %7$s
	- preço de reserva: %8$s

	- encerra em: %9$s

Para ver os detalhes do anúncio, por favor, clique no link abaixo:

%10$s

Atenciosamente, <br>
Equipe %11$s';

	## html message - editable
	$html_message = 'Prezado(a) %1$s, <br>
<br>
Um novo anúncio foi postado em uma de suas lojas favoritas: <br>
<ul>
	<li>nome do anúncio: <b>%3$s</b> </li>
	<li>tipo de anúncio: <b>%4$s</b> </li>
	<li>quantidade oferecida: <b>%5$s</b> </li>
</ul>
<ul>
	<li>preço inicial: <b>%6$s</b> </li>
	<li>preço de compra répida: <b>%7$s</b> </li>
	<li>preço de reserva: <b>%8$s</b> </li>
</ul>
<ul>
	<li>encerra em: <b>%9$s</b> </li>
</ul>
[ <a href="%10$s">Clique aqui</a> ] para ver mais detalhes sobre o anúncio. <br>
<br>
Atenciosamente, <br>
Equipe %11$s';


	$start_price = $fees->display_amount($row_details['start_price'], $row_details['currency']);
	$buyout_price = $fees->display_amount($row_details['buyout_price'], $row_details['currency']);
	$reserve_price = $fees->display_amount($row_details['reserve_price'], $row_details['currency']);

	$closing_date = show_date($row_details['end_time']);

	$auction_link = process_link('auction_details', array('name' => $row_details['name'], 'auction_id' => $row_details['auction_id']));


	$text_message = sprintf($text_message, $row_details['user_name'], $setts['sitename'], $row_details['name'], $row_details['auction_type'], 
		$row_details['quantity'], $start_price, $buyout_price, $reserve_price, $closing_date, $auction_link, 
		$setts['sitename']);
	
	$html_message = sprintf($html_message, $row_details['user_name'], $setts['sitename'], $row_details['name'], $row_details['auction_type'], 
		$row_details['quantity'], $start_price, $buyout_price, $reserve_price, $closing_date, $auction_link, 
		$setts['sitename']);
	
	send_mail($row_details['email'], 'Loja Favorita - Novo Anúncio Postado', $text_message,
		$setts['admin_email'], $html_message, null, $send);
}
?>
