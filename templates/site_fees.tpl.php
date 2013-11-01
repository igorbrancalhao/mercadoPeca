<?
#################################################################
## PHP Pro Bid v6.00															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<?=$site_fees_header_message; ?>

<br>
<table border="0" cellspacing="2" cellpadding="3" align="center" class="border">
   <form action="site_fees.php" method="post">
      <tr class="c2">
         <td><?=MSG_CHOOSE_CATEGORY;?>
            : </td>
         <td><?=$fees_categories_box;?></td>
         <td><input type="submit" name="form_choose_category" value="<?=GMSG_SELECT;?>"></td>
      </tr>
   </form>
</table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
   <? if ($is_setup_fee) { ?>
   <tr>
      <td colspan="2" class="c3"><strong>
         <?=MSG_LISTING_FEES;?>
         </strong></td>
   </tr>
   <tr class="c5">
      <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <tr>
      <td colspan="2"><table width="100%"  border="0" cellspacing="2" cellpadding="2" class="border">
            <?=$listing_fees_table;?>
         </table></td>
   </tr>
   <tr class="c5">
      <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <? } ?>
   <? if ($fee_row['second_cat_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_ADDLCAT_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['second_cat_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['picture_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_IMG_UPL_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['picture_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['hlitem_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_HL_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['hlitem_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['bolditem_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_BOLD_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['bolditem_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['catfeat_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_CATFEAT_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['catfeat_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['hpfeat_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_HPFEAT_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['hpfeat_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['rp_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_RP_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['rp_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['swap_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_SWAP_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['swap_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['buyout_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_BUYOUT_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['buyout_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['makeoffer_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_MAKEOFFER_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['makeoffer_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['custom_start_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_CUSTOM_START_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['custom_start_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['video_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_MEDIA_UPL_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['video_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($fee_row['wanted_ad_fee']>0) { ?>
   <tr class="c2">
      <td align="right" width="50%"><strong>
         <?=GMSG_WA_SETUP_FEE;?>
         </strong></td>
      <td><?=$fees->display_amount($fee_row['wanted_ad_fee']); ?></td>
   </tr>
   <? } ?>
   <? if ($is_stores) { ?>
   <tr>
      <td class="c3" colspan="2"><strong>
         <?=MSG_STORE_ACCOUNT_TYPES;?>
         </strong></td>
   </tr>
   <tr class="c5">
      <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <tr align="center">
      <td colspan="2"><table width="100%"  border="0" cellspacing="2" cellpadding="2" class="border">
            <?=$store_subscriptions_table;?>
         </table></td>
   </tr>
   <? } ?>
   <? if ($is_sale_fee) { ?>
   <tr>
      <td class="c3" colspan="2"><strong>
         <?=GMSG_ENDAUCTION_FEE;?>
         - <? echo (preg_match('/s/i', $fee_row['endauction_fee_applies'])) ? MSG_PAID_BY_SELLER : MSG_PAID_BY_BUYER; ?></strong> </td>
   </tr>
   <tr class="c5">
      <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <tr>
      <td colspan="2" align="center"><table width="100%" border="0" cellspacing="2" cellpadding="2" class="border">
            <?=$sale_fees_table;?>
         </table></td>
   </tr>
   <? } ?>
   <? if ($setts['enable_tax']) { ?>
   <tr>
      <td align="center" colspan="2" class="c1 border"><b>
         <?=$tax_message;?>
         </b></td>
   </tr>
   <? } ?>
</table>
