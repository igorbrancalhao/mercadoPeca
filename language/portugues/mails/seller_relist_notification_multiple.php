<?
## File version -> v6.01
## Email File -> notify seller if multiple items have been relisted (manually or automatically)
## called only from the main_cron.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sql_select_auctions = $db->query("SELECT u.name, u.username, u.email, u.mail_confirm_to_seller FROM " . DB_PREFIX . "auctions a 
	LEFT JOIN " . DB_PREFIX . "users u ON a.owner_id=u.user_id WHERE 
	a.is_relisted_item=1 AND a.notif_item_relisted=0 GROUP BY a.owner_id");

while ($row_details = $db->fetch_array($sql_select_auctions))
{
	$send = ($row_details['mail_confirm_to_seller']) ? true : false;

	## text message - editable
	$text_message = 'Prezado(a) %1$s,

Um ou mais produtos postados por você em %2$s foram relistados.

Para mais detalhes sobre os produtos relistados, por favor, clique na URL abaixo:

%3$s

Atenciosamente,
Equipe %2$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Um ou mais produtos postados por você em %2$s foram relistados. <br>
<br>
[ <a href="%3$s">Clique aqui</a> ] para mais detalhes sobre os produtos relistados. <br>
<br>
Atenciosamente, <br>
Equipe %2$s';


	$items_open_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'selling', 'section' => 'open'));
	
	$text_message = sprintf($text_message, $row_details['name'], $setts['sitename'], $items_open_link);
	$html_message = sprintf($html_message, $row_details['name'], $setts['sitename'], $items_open_link);
	
	send_mail($row_details['email'], 'Produto(s) Relistados', $text_message,
		$setts['admin_email'], $html_message, null, $send);
}
?>
