<?
## Email File -> confirm posting to the seller
## called only from the sell_item.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT a.*, u.name AS user_name, u.email, u.mail_confirm_to_seller FROM " . DB_PREFIX . "auctions a
	LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=a.owner_id WHERE a.auction_id='" . $mail_input_id . "'");

$send = ($row_details['mail_confirm_to_seller']) ? true : false;

## text message - editable
$text_message = 'Cliente: %1$s,

Você postou o seguinte produto no site %2$s:

	- nome do produto: %3$s
	- tipo de leilão: %4$s
	- quantidade ofertada: %5$s

	- categoria: %6$s
	- categoria adicional: %7$s

	- preço inicial: %8$s
	- preço para compra imediata: %9$s
	- preço de reserva: %10$s

	- data de encerramento: %11$s

Para ver maiores detalhes sobre o leilão, clique no link abaixo:

%12$s

Obrigado por anunciar em nosso site.

Atenciosamente,
Equipe %13$s';

## html message - editable
$html_message = 'Dear %1$s, <br>
<br>
Você postou o seguinte produto no site <b>%2$s</b>: <br>
<ul>
	<li>nome do produto: <b>%3$s</b> </li>
	<li>tipo de leilão: <b>%4$s</b> </li>
	<li>quantidade oferecida: <b>%5$s</b> </li>
</ul>
<ul>
	<li>categoria: <b>%6$s</b> </li>
	<li>categoria adicional: <b>%7$s</b> </li>
</ul>
<ul>
	<li>preço inicial: <b>%8$s</b> </li>
	<li>preço para compra imediata: <b>%9$s</b> </li>
	<li>preço de reserva: <b>%10$s</b> </li>
</ul>
<ul>
	<li>data de encerramento: <b>%11$s</b> </li>
</ul>
[ <a href="%12$s">Clique aqui</a> ] para ver maiores detalhes sobre seu leilão. <br>
<br>
Obrigado por anunciar em nosso site. <br>
<br>
Atenciosamente, <br>
Equipe %13$s';


$main_category = category_navigator($row_details['category_id'], false, true, null, null, GMSG_NONE_CAT);
$addl_category = category_navigator($row_details['addl_category_id'], false, true, null, null, GMSG_NONE_CAT);

$start_price = $fees->display_amount($row_details['start_price'], $row_details['currency']);
$buyout_price = $fees->display_amount($row_details['buyout_price'], $row_details['currency']);
$reserve_price = $fees->display_amount($row_details['reserve_price'], $row_details['currency']);

$closing_date = show_date($row_details['end_time']);

$auction_link = process_link('auction_details', array('name' => $row_details['name'], 'auction_id' => $row_details['auction_id']));


$text_message = sprintf($text_message, $row_details['user_name'], $setts['sitename'], $row_details['name'], $row_details['auction_type'], 
	$row_details['quantity'], $main_category, $addl_category, $start_price, $buyout_price, $reserve_price, $closing_date, $auction_link, 
	$setts['sitename']);
	
$html_message = sprintf($html_message, $row_details['user_name'], $setts['sitename'], $row_details['name'], $row_details['auction_type'], 
	$row_details['quantity'], $main_category, $addl_category, $start_price, $buyout_price, $reserve_price, $closing_date, $auction_link, 
	$setts['sitename']);
	
send_mail($row_details['email'], 'Detalhes de Venda de Produto', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
