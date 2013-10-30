<?
## Email File -> notify bidder when he is outbid
## called only from the bid.php page!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sql_select_auctions = $db->query("SELECT a.auction_id, a.name AS item_name,  
	u.name AS buyer_name, u.username, u.email, u.mail_outbid FROM " . DB_PREFIX . "bids b
	LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=b.auction_id
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=b.bidder_id
	WHERE b.auction_id='" . $mail_input_id . "' AND b.bid_out=1 AND b.bid_invalid=0 AND b.email_sent=0");

$send = true; ## always send

## send to all the winners of the auction for which the bank details have been set/changed
while ($bid_details = $db->fetch_array($sql_select_auctions))
{
	## text message - editable
	$text_message = 'Prezado(a) %1$s,
	
Seu lance colocado no %2$s foi superado.
	
Para mais detalhes sobre o leilão, clique na URL abaixo:
	
%3$s
	
Para ver o histórico de lances deste leilão, por favor, siga o seguinte link:
	
%4$s
	
Atenciosamente,
Equipe %5$s';
	
	## html message - editable
	$html_message = 'Prezado(a) %1$s, <br>
<br>
Seu lance colocado no %2$s foi superado. <br>
<br>
[ <a href="%3$s">Clique aqui</a> ] to view the auction details page. <br>
<br>
Para ver o histórico de lances deste leilão, por favor, [ <a href="%4$s">Clique aqui</a> ]. <br>
<br>
Atenciosamente, <br>
Equipe %5$s';
	
	
	$bid_history_link = SITE_PATH . 'login.php?redirect=' . process_link('bid_history', array('auction_id' => $bid_details['auction_id']));
	$auction_link = process_link('auction_details', array('name' => $bid_details['item_name'], 'auction_id' => $bid_details['auction_id']));
	
	$text_message = sprintf($text_message, $bid_details['buyer_name'], $bid_details['item_name'], $auction_link, $bid_history_link, $setts['sitename']);
	$html_message = sprintf($html_message, $bid_details['buyer_name'], $bid_details['item_name'], $auction_link, $bid_history_link, $setts['sitename']);
	
	send_mail($bid_details['email'], 'ID do Leilão: ' . $bid_details['auction_id'] . ' - Oferta Superada', $text_message,
		$setts['admin_email'], $html_message, null, $send);
}
?>
