<?
## Email File -> notify user when a bid is placed on an auction on his watch list
## called only from the bid.php page!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sql_select_auctions = $db->query("SELECT a.auction_id, a.name AS item_name,  
	u.name AS buyer_name, u.username, u.email FROM " . DB_PREFIX . "auction_watch aw
	LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=aw.auction_id
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=aw.user_id
	WHERE aw.auction_id='" . $mail_input_id . "'");

$send = true; ## always send

## send to all the winners of the auction for which the bank details have been set/changed
while ($watch_details = $db->fetch_array($sql_select_auctions))
{
	## text message - editable
	$text_message = 'Prezado(a) %1$s,
	
Uma nova proposta foi feita em um leilão da sua lista, %2$s.
	
Para ver os detalhes do Leilão, por favor clique na URL abaixo:
	
%3$s
	
Para ver o histórico de propostas para este Leilão, por favor, siga o seguinte link:
	
%4$s
	
Atenciosamente,
Equipe %5$s';
	## html message - editable
	$html_message = 'Prezado(a) %1$s, <br>
<br>
Uma nova proposta foi feita em um leilão da sua lista, %2$s. <br>
<br>
[ <a href="%3$s">Clique aqui</a> ] para ver mais detalhes. <br>
<br>
Para ver o histórico de propostas para este Leilão, por favor, [ <a href="%4$s">clique aqui</a> ]. <br>
<br>
Atenciosamente,
Equipe %5$s';
	
	
	$bid_history_link = SITE_PATH . 'login.php?redirect=' . process_link('bid_history', array('auction_id' => $watch_details['auction_id']));
	$auction_link = process_link('auction_details', array('name' => $watch_details['item_name'], 'auction_id' => $watch_details['auction_id']));
	
	$text_message = sprintf($text_message, $watch_details['buyer_name'], $watch_details['item_name'], $auction_link, $bid_history_link, $setts['sitename']);
	$html_message = sprintf($html_message, $watch_details['buyer_name'], $watch_details['item_name'], $auction_link, $bid_history_link, $setts['sitename']);
	
	send_mail($watch_details['email'], 'ID do Leilão: ' . $watch_details['auction_id'] . ' - Proposta Realizada', $text_message,
		$setts['admin_email'], $html_message, null, $send);
}
?>
