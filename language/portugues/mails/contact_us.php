<?
## Email File -> send contact form to site admin
## called only from the content_pages.php page!

if ( !defined('INCLUDED') ) { die("Access Denied"); }

$send = true; // always sent;

## text message - editable
$text_message = 'Nova mensagem enviada pelo formulário de contato.

Detalhes do Usuário:

	- nome: %1$s
	- email: %2$s
	- usuário (opicional): %3$s
	
Pergunta/Consulta:

%4$s';

## html message - editable
$html_message = 'Nova mensagem enviada pelo formulário de contato.<br>
<br>
Detalhes do Usuário: <br>
<ul>
	<li>Nome: <b>%1$s</b></li>
	<li>Email: <b>%2$s</b></li>
	<li>Usuário (opicional): <b>%3$s</b></li>
</ul>
Pergunta/Consulta:<br>
<br>
%4$s';


$text_message = sprintf($text_message, $user_details['name'], $user_details['email'], $user_details['username'], $user_details['question_content']);
$html_message = sprintf($html_message, $user_details['name'], $user_details['email'], $user_details['username'], $user_details['question_content']);

send_mail($setts['admin_email'], $setts['sitename'] . ' - New Contact Message', $text_message, 
	$setts['admin_email'], $html_message, null, $send);
?>
