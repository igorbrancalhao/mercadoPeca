<?
## Email File -> notify seller on a successful sale
## called only from the $item->assign_winner() function!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sale_details = $this->get_sql_row("SELECT w.*, u.name, u.username, u.email, u.mail_item_sold, 
	a.name AS item_name, a.currency FROM " . DB_PREFIX . "winners w 
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=w.seller_id
	LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=w.auction_id
	WHERE w.winner_id='" . $mail_input_id . "'");

$send = ($sale_details['mail_item_sold']) ? true : false;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Seu produto, %2$s, foi vendido com sucesso.

Detalhes da Venda:

	- preço: %3$s
	- quantidade vendida: %4$s
	- url do leilão: %7$s
	
Para mais detalhes sobre a venda, acesse sua página de "Itens Vendidos", através do link abaixo:

%5$s

Depois de ter acessado a página acima, clique no botão de link "Fórum" ao lado de cada item vendido.
Este é o seu canal de comunicação direta com o comprador. Por favor, utilize este fórum para dirimir
quaisquer dúvida pós-venda que ele possa ter.
Importante: Para ajudar a resolver eventuais litígios e assegurar que você use o canal de comunicação para todas as consultas e atualizações.

Atenciosamente,
Equipe %6$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Seu produto, %2$s, foi vendido com sucesso. <br>
<br>
Detalhes da Venda: <br>
<ul>
	<li>Preço: <b>%3$s</b> </li>
	<li>Quantidade Vendida: <b>%4$s</b> </li>
	<li>URL do Leilão: [ <a href="%7$s">Clique para Ver</a> ] </li>
</ul>
Para mais detalhes sobre a venda, por favor, acesse sua página de [ <a href="%5$s">Itens Vendidos</a> ]e. <br>
<br>
Depois de ter acessado a página acima, clique no botão de link "Fórum" ao lado de cada item vendido. <br>
Este é o seu canal de comunicação direta com o comprador. Por favor, utilize este fórum para dirimir
quaisquer dúvida pós-venda que ele possa ter. <br>
<br>
Importante: Para ajudar a resolver eventuais litígios e assegurar que você use o canal de comunicação para todas as consultas e atualizações. <br>
<br>
Atenciosamente, <br>
Equipe %6$s';


$items_sold_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'selling', 'section' => 'sold'));
$auction_link = process_link('auction_details', array('name' => $sale_details['item_name'], 'auction_id' => $sale_details['auction_id']));

$this->fees = new fees();
$this->fees->setts = $this->setts;
$sale_price = $this->fees->display_amount($sale_details['bid_amount'], $sale_details['currency']);

$text_message = sprintf($text_message, $sale_details['name'], $sale_details['item_name'], $sale_price, $sale_details['quantity_offered'], $items_sold_link, $this->setts['sitename'], $auction_link);
$html_message = sprintf($html_message, $sale_details['name'], $sale_details['item_name'], $sale_price, $sale_details['quantity_offered'], $items_sold_link, $this->setts['sitename'], $auction_link);

send_mail($sale_details['email'], 'Produto com ID: ' . $sale_details['auction_id'] . ' - Vendido com Sucesso', $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
