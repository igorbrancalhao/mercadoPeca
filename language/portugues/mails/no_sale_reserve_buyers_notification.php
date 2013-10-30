<?
## Email File -> notify user when a bid is placed on an auction on his watch list
## called only from the $item->assign_winner() function

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sql_select_auctions = $this->query("SELECT a.auction_id, a.name AS item_name,  
	u.name AS buyer_name, u.username, u.email, u.mail_item_won FROM " . DB_PREFIX . "bids b
	LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=b.auction_id
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=b.bidder_id
	WHERE b.auction_id='" . $mail_input_id . "' AND b.bid_out=0 AND b.bid_invalid=0");


## send to all the high bidder of the auction
while ($row_details = $this->fetch_array($sql_select_auctions))
{
	$send = ($row_details['mail_item_won']) ? true : false;
	## text message - editable
	$text_message = 'Prezado(a) %1$s,
	
O leilão %$2s, em que você deu o maior lance foi encerrado.
Não houve vencedores porque o preço de reserva para o leilão não foi alcançado.
	
Para ver os detalhes do leilão, por favor, clique na URL abaixo:
	
%3$s
	
Para ver o histórico de lances deste leilão, por favor, siga este link:
	
%4$s
	
Atenciosamente,
Equipe %5$s';
	
	## html message - editable
	$html_message = 'Prezado(a) %1$s, <br>
<br>
O leilão %$2s, em que você deu o maior lance foi encerrado. <br>
Não houve vencedores porque o preço de reserva para o leilão não foi alcançado. <br>
<br>
[ <a href="%3$s">Clique aqui</a> ] ara ver os detalhes do leilão <br>
<br>
Para ver o histórico de lances deste leilão, por favor, [ <a href="%4$s">Clique aqui</a> ]. <br>
<br>
Atenciosamente, <br>
Equipe %5$s';
	
	
	$bid_history_link = SITE_PATH . 'login.php?redirect=' . process_link('bid_history', array('auction_id' => $row_details['auction_id']));
	$auction_link = process_link('auction_details', array('name' => $row_details['item_name'], 'auction_id' => $row_details['auction_id']));
	
	$text_message = sprintf($text_message, $row_details['buyer_name'], $row_details['item_name'], $auction_link, $bid_history_link, $this->setts['sitename']);
	$html_message = sprintf($html_message, $watch_details['buyer_name'], $watch_details['item_name'], $auction_link, $bid_history_link, $this->setts['sitename']);
	
	send_mail($row_details['email'], 'Auction ID: ' . $row_details['auction_id'] . ' - Leilão Encerrado', $text_message,
		$this->setts['admin_email'], $html_message, null, $send);
}
?>
