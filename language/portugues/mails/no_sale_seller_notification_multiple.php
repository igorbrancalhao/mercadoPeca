<?
## Email File -> notify seller if multiple items closed but there was no sale
## called only from the main_cron.php page

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$row_details = $db->get_sql_row("SELECT u.name, u.username, u.email, u.mail_item_closed 
	FROM " . DB_PREFIX . "users u WHERE u.user_id='" . $mail_input_id . "'");

$send = ($row_details['mail_item_closed']) ? true : false;

## text message - editable
$text_message = 'Prezado(a) %1$s,

V�rios leil�es postados por voc� fecharam sem vencedores.
Isto aconteceu porque n�o houve lances ou os mesmos n�o alcan�aram o pre�o de reserva.

Para ver mais detalhes sobre os Leil�es encerrados, siga a URL abaixo:

%2$s

Atenciosamente,
Equipe %3$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
V�rios leil�es postados por voc� fecharam sem vencedores. <br>
Isto aconteceu porque n�o houve lances ou os mesmos n�o alcan�aram o pre�o de reserva. <br>
<br>
[ <a href="%2$s">Clique aqui</a> ] para ver mais detalhes sobre os Leil�es encerrados. <br>
<br>
Atenciosamente, <br>
Equipe %3$s';


$items_closed_link = SITE_PATH . 'login.php?redirect=' . process_link('members_area', array('page' => 'selling', 'section' => 'closed'));

$text_message = sprintf($text_message, $row_details['name'], $items_closed_link, $setts['sitename']);
$html_message = sprintf($html_message, $row_details['name'], $items_closed_link, $setts['sitename']);

send_mail($row_details['email'], 'V�rios Leil�es Encerrados', $text_message,
	$setts['admin_email'], $html_message, null, $send);
?>
