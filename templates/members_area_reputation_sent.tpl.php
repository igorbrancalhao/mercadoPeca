<?
#################################################################
## PHP Pro Bid v6.00															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
	<tr>
      <td colspan="5" class="c7"><b><?=MSG_MM_LEAVE_COMMENTS;?></b> (<?=$nb_items;?> <?=MSG_ITEMS;?>)
      </td>
   </tr>
   <tr>
      <td class="membmenu" align="center"><?=MSG_USERNAME;?></td>
      <td class="membmenu" align="center"><?=MSG_AUCTION_ID;?></td>
      <td class="membmenu"><?=MSG_ITEM_TITLE;?></td>
      <td class="membmenu" align="center" class="contentfont"><?=MSG_TYPE;?></td>
      <td class="membmenu" align="center"><?=GMSG_OPTIONS;?></td>
   </tr>
   <tr class="c5">
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="130" height="1"></td>
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="80" height="1"></td>
      <td width="100%"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="100%" height="1"></td>
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="80" height="1"></td>
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="80" height="1"></td>
   </tr>
   <?=$reputation_sent_content;?>
   <? if ($nb_items>0) { ?>
   <tr>
      <td colspan="5" align="center" class="contentfont"><?=$pagination;?></td>
   </tr>
	<? } ?>
</table>

