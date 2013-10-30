<?
## Email File -> notify buyer when the seller has posted bank details for an auction
## called only from the popup_bank_details.php page!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sql_select_auctions = $db->query("SELECT a.auction_id, a.name AS item_name, a.bank_details, 
	u.name AS buyer_name, u.username, u.email FROM " . DB_PREFIX . "winners w
	LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=w.auction_id
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=w.buyer_id
	WHERE w.auction_id='" . $mail_input_id . "'");

$send = true; ## always send

## send to all the winners of the auction for which the bank details have been set/changed
while ($bank_details = $db->fetch_array($sql_select_auctions))
{
	## text message - editable
	$text_message = 'Prezado(a) %1$s,
	
O vendedor do anúncio %2$s, ganho por você postou/alterou detalhes para pagamento.
	
Os detalhes para pagamento são:
	
%3$s
	
Para mais detalhes sobre a compra, por favor, acesse sua página de "Itens Comprados", clicando no link abaixo:
	
%4$s
	
Após acessar a página, clique em "Ver Detalhes sobre Pagamento".
	
Atencisamente,
Equipe %5$s';
	
	## html message - editable
	$html_message = 'Prezado(a) %1$s, <br>
<br>
O vendedor do anúncio <b>%2$s</b>, , ganho por você postou/alterou detalhes para pagamento. <br>
<br>
Os detalhes para pagamento são: <br>
<ul>
	<li>%3$s </li>
</ul>
<br>
Para mais detalhes sobre a compra, por favor, acesse sua página de [ <a href="%4$s">Itens Comprados</a> ] . <br>
<br>
Após acessar a página, clique em "Ver Detalhes sobre Pagamento". <br>
<br>
Atenciosamente, <br>
Equipe %5$s';
	
	
	$items_won_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'bidding', 'section' => 'won_items'));
	//$auction_link = process_link('auction_details', array('name' => $bank_details['item_name'], 'auction_id' => $bank_details['auction_id']));
	
	$text_message = sprintf($text_message, $bank_details['buyer_name'], $bank_details['item_name'], $bank_details['bank_details'], $items_won_link, $setts['sitename']);
	$html_message = sprintf($html_message, $bank_details['buyer_name'], $bank_details['item_name'], $bank_details['bank_details'], $items_won_link, $setts['sitename']);
	
	send_mail($bank_details['email'], 'ID do Anúncio: ' . $bank_details['auction_id'] . ' - Detalhes para Pagamento', $text_message,
		$setts['admin_email'], $html_message, null, $send);
}
?>
