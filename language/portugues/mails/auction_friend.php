<?
## Email File -> email an auction to a friend
## called only from the $item->auction_friend() function!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$sender_details = $this->get_sql_row("SELECT u.name, u.email FROM " . DB_PREFIX . "users u WHERE u.user_id='" . $user_id . "'");

$send = true; // always sent;

## text message - editable
$text_message = 'Prezado(a) %1$s,

Seu amigo(a), %2$s, lhe enviou este anúncio postado em %3$s para que você veja.

Para ver os detalhes do anúncio, por favor clique na URL abaixo:

%4$s

Comentários adicionais: %5%s
Atenciosamente,
Equipe %6$s';

## html message - editable
$html_message = 'Prezado(a) %1$s, <br>
<br>
Seu amigo(a), %2$s, lhe enviou este anúncio postado em %3$s para que você veja. <br>
<br>
[ <a href="%4$s">Clique aqui</a> ] para ver o anúncio. <br>
<br>
Comentários adicionais: %5$s <br>
<br>
Atenciosamente,
Equipe %6$s';

$auction_link = process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));

$text_message = sprintf($text_message, $friend_name, $sender_details['name'], $this->setts['sitename'], $auction_link, $comments, $this->setts['sitename']);
$html_message = sprintf($html_message, $friend_name, $sender_details['name'], $this->setts['sitename'], $auction_link, $comments, $this->setts['sitename']);

send_mail($friend_email, 'Veja este Anúncio', $text_message,
	$sender_details['email'], $html_message, $sender_details['name'], $send);
?>
