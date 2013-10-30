<?
#################################################################
## PHP Pro Bid v6.04															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<!-- these two javascript calls need to be present everywhere where the calendar function is required -->
<SCRIPT LANGUAGE="JavaScript" SRC="includes/calendar.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">document.write(getCalendarStyles());</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
function submit_form(form_name, file_type) {
	form_name.box_submit.value = "1";
	form_name.file_upload_type.value = file_type;
	form_name.submit();
}

function delete_media(form_name, file_type, file_id) {
	form_name.box_submit.value = "1";
	form_name.file_upload_type.value = file_type;
	form_name.file_upload_id.value = file_id;
	form_name.submit();
}
</SCRIPT>

<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
   <tr class="c4">
      <td colspan="3"><?=MSG_ITEM_SETTINGS;?></td>
   </tr>
   <tr class="c5">
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="150" height="1"></td>
      <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_AUCTION_TYPE;?></td>
      <td colspan="2"><select name="auction_type" onChange = "submit_form(ad_create_form, '');">
	  			<option value="standard" selected><?=GMSG_STANDARD;?></option>
	  			<option value="dutch" <? echo ($item_details['auction_type']=='dutch') ? 'selected' : ''; ?>><?=GMSG_DUTCH;?></option>
	  		</select></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_AUCTION_TYPE_EXPL;?></td>
   </tr>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_CURRENCY;?></td>
      <td colspan="2"><?=$currency_drop_down;?></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_CURRENCY_EXPL;?></td>
   </tr>
   <tr class="c1">
      <td width="150" align="right"><?=GMSG_QUANTITY;?></td>
      <td colspan="2"><input type="text" name="quantity" value="<? echo ($item_details['quantity']>0 && $item_details['auction_type'] == 'dutch') ? $item_details['quantity'] : 1;?>" <? echo ($item_details['auction_type'] == 'dutch') ? '' : 'readonly'; ?> size="8"></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_QUANTITY_EXPL;?></td>
   </tr>
   <? if (!$setts['enable_store_only_mode'] && $item_details['listing_type'] != 'buy_out') { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_AUCTION_STARTS_AT;?></td>
      <td colspan="2"><?=$item_details['currency'];?>
         <input type="text" name="start_price" value="<?=$item_details['start_price'];?>" size="8"></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_AUCTION_STARTS_AT_EXPL;?></td>
   </tr>
   <? } ?>
   <? if ($item_details['auction_type'] != 'dutch') { ?>
   <? if (!$setts['enable_store_only_mode'] && $item_details['listing_type'] != 'buy_out') { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_ENABLE_RES_PRICE;?></td>
      <td colspan="2"><input type="checkbox" name="is_reserve" value="1" <? echo ($item_details['is_reserve']==1) ? 'checked' : ''; ?>/></td>
   </tr>
   <tr class="c2">
      <td width="150" align="right"><?=MSG_RES_PRICE;?></td>
      <td><?=$item_details['currency'];?>
         <input type="text" name="reserve_price" value="<?=$item_details['reserve_price'];?>" size="8"></td>
      <td><?=$rp_fee_expl_message;?></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_RES_PRICE_EXPL;?></td>
   </tr>
   <? } ?>
   <? } ?>
   <? if ($layout['enable_buyout']) { ?>
   <? if ($setts['buyout_process'] == 1) { ?>
   <? if ($item_details['listing_type'] != 'buy_out') { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_INSTANT_PURCHASE;?></td>
      <td colspan="2"><input type="checkbox" name="is_buy_out" value="1" <? echo ($item_details['is_buy_out']==1) ? 'checked' : ''; ?>/></td>
   </tr>
   <? } ?>
   <tr class="c2">
      <td width="150" align="right"><?=MSG_BUYOUT_PRICE;?></td>
      <td><?=$item_details['currency'];?>
         <input type="text" name="buyout_price" value="<?=$item_details['buyout_price'];?>" size="8"></td>
      <td><?=$buyout_fee_expl_message;?></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><? echo ($item_details['listing_type'] == 'buy_out') ? MSG_INSTANT_PURCHASE_ONLY_EXPL : MSG_INSTANT_PURCHASE_EXPL;?></td>
   </tr>
   <? } ?>
   <? if ($setts['makeoffer_process'] == 1) { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_OFFER_RANGE;?></td>
      <td colspan="2"><input type="checkbox" name="is_offer" value="1" <? echo ($item_details['is_offer']==1) ? 'checked' : ''; ?> /></td>
   </tr>
   <tr>
      <td>&nbsp;</td>
      <td class="c2"><?=$item_details['currency'];?>
         <input type="text" name="offer_min" value="<?=$item_details['offer_min'];?>" size="8">
         -
         <?=$item_details['currency'];?>
         <input type="text" name="offer_max" value="<?=$item_details['offer_max'];?>" size="8"></td>
      <td class="c2"><?=$makeoffer_fee_expl_message;?></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_OFFER_RANGE_EXPL;?></td>
   </tr>
   <? } ?>
   <? } ?>
   <? if ($item_details['listing_type'] != 'quick') { ?>
   <? if (!$setts['enable_store_only_mode'] && $item_details['listing_type'] != 'buy_out') { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_BID_INCREMENT;?></td>
      <td colspan="2"><input type="radio" name="is_bid_increment" value="0" checked/> <?=MSG_STANDARD_BID_INCREMENT;?></td>
   </tr>
   <tr>
      <td width="150" align="right"></td>
      <td class="c2"><input type="radio" name="is_bid_increment" value="1" <? echo ($item_details['is_bid_increment'] == 1) ? 'checked' : ''; ?>/> <?=MSG_CUSTOM_BID_INCREMENT;?>
      <td class="c2"><?=$item_details['currency'];?>
         <input type="text" name="bid_increment_amount" value="<?=$item_details['bid_increment_amount'];?>" size="8"></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_BID_INCREMENT_EXPL;?></td>
   </tr>
   <? } ?>
   <? } ?>
   <? if ($can_add_tax) { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_ADD_TAX;?></td>
      <td colspan="2"><input type="checkbox" name="apply_tax" value="1" <? echo ($item_details['apply_tax']==1) ? 'checked' : ''; ?>/></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_ADD_TAX_EXPL;?></td>
   </tr>
   <? } ?>
   <? if ($item_details['listing_type'] != 'quick') { ?>
   <? if ($item_details['list_in'] != 'store') { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_AD_FEATURING;?></td>
      <td nowrap><input type="checkbox" name="hpfeat" value="1" <? echo ($item_details['hpfeat']==1) ? 'checked' : ''; ?> />
         <?=MSG_HP_FEATURED;?></td>
      <td width="100%"><?=$hpfeat_fee_expl_message;?></td>
   </tr>
   <tr>
      <td>&nbsp;</td>
      <td class="c2" nowrap><input type="checkbox" name="catfeat" value="1" <? echo ($item_details['catfeat']==1) ? 'checked' : ''; ?> />
         <?=MSG_CAT_FEATURED;?></td>
      <td class="c2"><?=$catfeat_fee_expl_message;?></td>
   </tr>
   <? } ?>
   <tr>
      <td>&nbsp;</td>
      <td class="c1" nowrap><input type="checkbox" name="hl" value="1" <? echo ($item_details['hl']==1) ? 'checked' : ''; ?> />
         <?=MSG_HL_AD;?></td>
      <td class="c1"><?=$hl_fee_expl_message;?></td>
   </tr>
   <tr>
      <td>&nbsp;</td>
      <td class="c2" nowrap><input type="checkbox" name="bold" value="1" <? echo ($item_details['bold']==1) ? 'checked' : ''; ?> />
         <?=MSG_BOLD_AD;?></td>
      <td class="c2"><?=$bold_fee_expl_message;?></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_FEATURING_EXPL;?></td>
   </tr>
   <? } ?>
   <? if ($item_details['start_time'] > CURRENT_TIME || $auction_edit != 1) { ?>
   <tr class="c1">
      <td width="150" align="right"><?=GMSG_START_TIME;?>
      </td>
      <td colspan="2"><input name="start_time_type" type="radio" value="now" checked />
         <?=GMSG_NOW;?>
      </td>
   </tr>
   <? if ($item_details['listing_type'] != 'quick') { ?>
   <tr>
      <td>&nbsp;</td>
      <td class="c2" nowrap><input name="start_time_type" type="radio" value="custom" <? echo ($item_details['start_time_type'] == 'custom') ? 'checked' : ''; ?> />
         <?=GMSG_CUSTOM;?> <?=$custom_start_fee_expl_message;?></td>
      <td class="c2"><?=$start_date_box;?></td>
   </tr>
   <? } ?>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_START_TIME_EXPL;?></td>
   </tr>
   <? } ?>
   <tr class="c1">
      <td width="150" align="right"><?=GMSG_END_TIME;?></td>
      <td><input name="end_time_type" type="radio" value="duration" checked />
         <?=GMSG_DURATION;?>
      </td>
      <td><?=$duration_drop_down;?></td>
   </tr>
   <? if ($item_details['listing_type'] != 'quick') { ?>
   <tr>
      <td>&nbsp;</td>
      <td class="c2" nowrap><input name="end_time_type" type="radio" value="custom" <? echo ($item_details['end_time_type'] == 'custom') ? 'checked' : ''; ?> />
         <?=GMSG_CUSTOM;?>
      </td>
      <td class="c2"><?=$end_date_box;?></td>
   </tr>
   <? } ?>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_END_TIME_EXPL;?></td>
   </tr>
   <? if ($item_details['listing_type'] != 'quick') { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_PRIVATE_AUCTION;?></td>
      <td colspan="2"><input type="checkbox" name="hidden_bidding" value="1" <? echo ($item_details['hidden_bidding']==1) ? 'checked' : ''; ?>/></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_PRIVATE_AUCTION_EXPL;?></td>
   </tr>
   <? if ($setts['enable_swaps']) { ?>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_ACCEPT_SWAP;?></td>
      <td colspan="2"><input type="checkbox" name="enable_swap" value="1" <? echo ($item_details['enable_swap']==1) ? 'checked' : ''; ?>/></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_ACCEPT_SWAP_EXPL;?></td>
   </tr>
   <? } ?>
   <? } ?>
   <?=$custom_sections_table;?>

	<? echo ($setts['max_images'] > 0) ? $image_upload_manager : ''; ?>
	<? echo ($setts['max_media'] > 0) ? $video_upload_manager : ''; ?>

	<? if ($item_details['listing_type'] != 'quick' && $setts['enable_auto_relist']) { ?>
   <tr class="c4">
      <td colspan="3"><?=MSG_AUTO_RELIST;?></td>
   </tr>
   <tr class="c5">
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="150" height="1"></td>
      <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_ENABLE_AUTO_RELIST;?> </td>
      <td colspan="2"><input type="checkbox" name="is_auto_relist" value="1" <? echo ($item_details['is_auto_relist']==1) ? 'checked' : ''; ?>/></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_ENABLE_AUTO_RELIST_EXPL;?> </td>
   </tr>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_AUTO_RELIST_SOLD;?> </td>
      <td colspan="2"><input type="checkbox" name="auto_relist_bids" value="1" <? echo ($item_details['auto_relist_bids']==1) ? 'checked' : ''; ?>/></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_AUTO_RELIST_SOLD_EXPL;?> </td>
   </tr>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_NB_AUTO_RELISTS;?> </td>
      <td colspan="2"><input type="text" name="auto_relist_nb" value="<?=$item_details['auto_relist_nb'];?>" size="8" maxlength="2" /></td>
   </tr>
   <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?=MSG_NB_AUTO_RELISTS_EXPL;?> </td>
   </tr>
   <? } ?>
   <tr class="c4">
      <td colspan="3"><?=MSG_LOCATION;?></td>
   </tr>
   <tr class="c5">
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="150" height="1"></td>
      <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_COUNTRY;?> </td>
      <td colspan="2"><?=$country_dropdown;?></td>
   </tr>
   <tr class="c2">
      <td width="150" align="right"><?=MSG_STATE;?> </td>
      <td colspan="2"><?=$state_box;?></td>
   </tr>
   <tr class="c1">
      <td width="150" align="right"><?=MSG_ZIP_CODE;?> </td>
      <td colspan="2"><input type="text" name="zip_code" value="<?=$item_details['zip_code'];?>" size="25" /></td>
   </tr>
	<? if ($auction_edit != 1) { ?>
   <tr class="c5">
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
      <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <tr>
      <td></td>
      <td colspan="2"><?=nav_btns_position();?></td>
   </tr>
   <? } ?>
</table>
<br>
