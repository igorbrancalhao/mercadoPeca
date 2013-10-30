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
      <td class="c7"><b><? echo ($edit_invoice) ? MSG_EDIT_PRODUCT_INVOICE : MSG_SEND_PRODUCT_INVOICE;?></b></td>
   </tr>
   <tr>
      <td class="membmenu"><?=MSG_BUYER_USERNAME;?>
         : <b><?=$user_details['username']; ?></b></td>
   </tr>
   <tr>
      <td class="c4"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
	<? if (!empty($product_invoice_content)) { ?>
   <tr>
      <td align="center"><table width="90%" border="0" cellpadding="3" cellspacing="2" class="border">
            <form action="members_area.php?page=selling&section=sold" method="post">
               <input type="hidden" name="buyer_id" value="<?=$user_details['user_id'];?>">
               <? if (!$edit_invoice) { ?>
               <tr>
                  <td colspan="8"><b><?=MSG_SELECT_PRODUCTS;?></b></td>
               </tr>
               <? } ?>
               <tr class="membmenu">
                  <td></td>
                  <td><?=MSG_AUCTION_ID;?></td>
                  <td><?=MSG_ITEM_TITLE;?></td>
                  <td align="center"><?=MSG_WINNING_BID;?></td>
                  <td align="center"><?=GMSG_QUANTITY;?></td>
                  <td align="center"><?=MSG_POSTAGE;?></td>
                  <td align="center"><?=MSG_INSURANCE;?></td>
               </tr>
               <tr class="c5">
                  <td></td>
                  <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="60" height="1"></td>
                  <td width="100%"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="100%" height="1"></td>
                  <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="80" height="1"></td>
                  <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="80" height="1"></td>
                  <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="120" height="1"></td>
                  <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="120" height="1"></td>
               </tr>
               <?=$product_invoice_content;?>
               <tr class="membmenu">
                  <td colspan="8" align="center" class="contentfont"><input type="submit" name="form_send_invoice" value="<?=GMSG_PROCEED;?>" /></td>
               </tr>
               
            </form>
         </table></td>
   </tr>
	<? } else { ?>
	<tr>
		<td align="center"><?=MSG_NO_ITEMS_INVOICE;?></td>
	</tr>
	<? } ?>
</table>
