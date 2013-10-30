<?
#################################################################
## PHP Pro Bid v6.05															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
   <tr>
      <td colspan="8" class="c7"><b><?=MSG_MM_SENT_MESSAGES;?></b> (<?=$nb_messages;?> <?=MSG_MESSAGES;?>)
      </td>
   </tr>
   <tr>
      <td class="membmenu" nowrap><?=MSG_TO;?> <?=$page_order_receiver_username;?></td>
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
   <?=$sent_messages_content;?>
   <? if ($nb_messages>0) { ?>
   <tr>
      <td colspan="8" align="center" class="contentfont"><?=$pagination;?></td>
   </tr>
	<? } ?>
</table>

