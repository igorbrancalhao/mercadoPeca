<?
## Email File -> notify buyer on a successful purchase
## called only from the $item->assign_winner() function!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sale_details = $this->get_sql_row("SELECT w.*, u.name, u.username, u.email, u.mail_item_won, 
	a.name AS item_name, a.currency FROM " . DB_PREFIX . "winners w 
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=w.buyer_id
	LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=w.auction_id
	WHERE w.winner_id='" . $mail_input_id . "'");

$send = ($sale_details['mail_item_won']) ? true : false;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Voc� comprou com sucesso o produto %2$s.

Detalhes da Compra:

	- pre�o: %3$s
	- quantidade comprada: %4$s
	- url do leil�o: %7$s
	
Para mais detalhes sobre a compra, acesse sua p�gina de "Itens Comprados", atrav�s do link abaixo:

%5$s

Depois de ter acessado a p�gina acima, clique no bot�o de link "F�rum" ao lado de cada item ganho.
Este � o seu canal de comunica��o direta com o vendedor. Por favor, utilize este f�rum para dirimir
quaisquer d�vida p�s-venda que possa ter.
Importante: Para ajudar a resolver eventuais lit�gios e assegurar que voc� use o canal de comunica��o para todas as consultas e atualiza��es.

Atenciosamente,
Equipe %6$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Voc� comprou com sucesso o produto %2$s. <br>
<br>
Detalhes da Compra: <br>
<ul>
	<li>Pre�o: <b>%3$s</b> </li>
	<li>Quantidade Comprada: <b>%4$s</b> </li>
	<li>URL do Leil�o: [ <a href="%7$s">Click to View</a> ] </li>
</ul>
Para mais detalhes sobre a compra, por favor acesse sua p�gina de [ <a href="%5$s">Itens Comprados</a> ]. <br>
<br>
Depois de ter acessado a p�gina acima, clique no bot�o de link "F�rum" ao lado de cada item ganho. <br>
Este � o seu canal de comunica��o direta com o vendedor. Por favor, utilize este f�rum para dirimir
quaisquer d�vida p�s-venda que possa ter. <br>
<br>
Importante: Para ajudar a resolver eventuais lit�gios e assegurar que voc� use o canal de comunica��o para todas as consultas e atualiza��es. <br>
<br>
Atenciosamente, <br>
Equipe %6$s';


$items_won_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'bidding', 'section' => 'won_items'));
$auction_link = process_link('auction_details', array('name' => $sale_details['item_name'], 'auction_id' => $sale_details['auction_id']));

$this->fees = new fees();
$this->fees->setts = $this->setts;
$sale_price = $this->fees->display_amount($sale_details['bid_amount'], $sale_details['currency']);

$text_message = sprintf($text_message, $sale_details['name'], $sale_details['item_name'], $sale_price, $sale_details['quantity_offered'], $items_won_link, $this->setts['sitename'], $auction_link);
$html_message = sprintf($html_message, $sale_details['name'], $sale_details['item_name'], $sale_price, $sale_details['quantity_offered'], $items_won_link, $this->setts['sitename'], $auction_link);

send_mail($sale_details['email'], 'ID do Produto: ' . $sale_details['auction_id'] . ' - Produto Comprado com Sucesso', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
