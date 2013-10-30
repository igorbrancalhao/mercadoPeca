<?
#################################################################
## PHP Pro Bid v6.04															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
   <tr>
      <td colspan="8" class="c7"><b><? echo ($page == 'summary') ? MSG_UNREAD_MESSAGES : MSG_MM_RECEIVED_MESSAGES;?></b> (<?=$nb_messages;?> <?=MSG_MESSAGES;?><? echo ($nb_unread_messages && $page != 'summary') ? ' - ' . $nb_unread_messages . ' ' . MSG_UNREAD : '';?>)
      </td>
   </tr>
   <tr>
      <td class="membmenu" nowrap><?=MSG_FROM;?> <?=$page_order_sender_username;?></td>
      <td class="membmenu"><?=MSG_SUBJECT;?></td>
      <td class="membmenu" align="center" nowrap><?=GMSG_DATE;?> <?=$page_order_reg_date;?></td>
      <td class="membmenu" align="center" nowrap><?=GMSG_OPTIONS;?></td>
   </tr>
   <tr class="c5">
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
      <td width="100%"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <?=$received_messages_content;?>
   <? if ($nb_messages>0) { ?>
   <tr>
      <td colspan="8" align="center" class="contentfont"><?=$pagination;?></td>
   </tr>
	<? } ?>
</table>

