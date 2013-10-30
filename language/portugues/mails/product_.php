<?
## File Version -> v6.02
## Email File -> notify a buyer when a seller has created a new product invoice for him
## called only from the $item->send_invoice() function

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $this->get_sql_row("SELECT u.name, u.email, w.invoice_id FROM " . DB_PREFIX . "winners w 
	LEFT JOIN " . DB_PREFIX . "users u on u.user_id=w.buyer_id WHERE 
	w.invoice_id='" . $mail_input_id . "'");
$send = true; ## always send

## text message - editable
$text_message = 'Prezado(a) %1$s,
	
Uma nova fatura foi gerada por um vendedor para um ou mais itens que você comprou dele.
	
Para ver a fatura, por favor, siga a URL abaixo:
	
%2$s
		
Atenciosamente,
Equipe %3$s';
	
## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Uma nova fatura foi gerada por um vendedor para um ou mais itens que você comprou dele. <br>
<br>
Please [ <a href="%2$s">Clique Aqui</a> ] para ver a fatura. <br>
<br>
Atenciosamente, <br>
Equipe %3$s';
	
	
$invoice_link = SITE_PATH . 'login.php?redirect=' . process_link('invoice_print', array('invoice_type' => 'product_invoice', 'invoice_id' => $mail_input_id));
	
$text_message = sprintf($text_message, $row_details['name'], $invoice_link, $this->setts['sitename']);
$html_message = sprintf($html_message, $row_details['name'], $invoice_link, $this->setts['sitename']);

send_mail($row_details['email'], 'Fatura de Produto Recebida - ID da Fatura: ' . $row_details['invoice_id'], $text_message,
	$this->setts['admin_email'], $html_message, null, $send);
?>
