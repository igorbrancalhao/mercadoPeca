<?
#################################################################
## PHP Pro Bid v6.06															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<?=$auction_print_header;?>
<SCRIPT LANGUAGE="JavaScript"><!--
myPopup = '';

function openPopup(url) {
	myPopup = window.open(url,'popupWindow','width=640,height=150,status=yes');
   if (!myPopup.opener) myPopup.opener = self;
}
//-->
</SCRIPT>
<SCRIPT LANGUAGE = "JavaScript">
	function converter_open(url) {
		output = window.open(url,"popDialog","height=220,width=700,toolbar=no,resizable=yes,scrollbars=yes,left=10,top=10");
	}
</SCRIPT>
<script type="text/javascript" src="themes/<?=$setts['default_theme'];?>/tabber.js"></script>
<link rel="stylesheet" href="themes/<?=$setts['default_theme'];?>/example.css" TYPE="text/css" MEDIA="screen">

<script type="text/javascript">
document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>

<? if ($ad_display == 'live') { ?>

<form name="hidden_form" action="auction_details.php" method="get" style="margin:0px;">
   <input type="hidden" name="option" />
   <input type="hidden" name="auction_id" />
   <input type="hidden" name="message_content" />
   <input type="hidden" name="question_id" />
</form>
<? } ?>






<table width="100%" border="0" cellpadding="0" cellspacing="0">
   <tr>
      <? if ($ad_display == 'live') { ?>
      <td class="contentfont" nowrap style="padding-right: 10px;"><img src="themes/<?=$setts['default_theme'];?>/img/system/home.gif" align="absmiddle" border="0" hspace="5"> <a href="<?=process_link('index');?>">
         <?=MSG_BACK_TO_HP;?>
         </a></td>
		<? if (!empty($search_url)) { ?>
		<td class="contentfont" nowrap style="padding-right: 10px;">| <a href="<?=$search_url;?>"><?=MSG_BACK_TO_SEARCH_PAGE;?></a></td>
		<? } ?>
      <? } ?>
      <td width="100%"><table width="100%" border="0" cellpadding="3" cellspacing="3" class="errormessage">
            <tr>
               <td width="150" align="right"><b>
                  <?=MSG_MAIN_CATEGORY;?>
                  :</b></td>
               <td class="contentfont"><?=$main_category_display;?></td>
            </tr>
            <? if ($item_details['addl_category_id']) { ?>
            <tr>
               <td width="150" align="right"><b>
                  <?=MSG_ADDL_CATEGORY;?>
                  :</b></td>
               <td class="contentfont"><?=$addl_category_display;?></td>
            </tr>
            <? } ?>
         </table></td>
   </tr>
</table>


<? if ($print_button == 'show') { ?>
<table align="center" border="0" cellpadding="3" cellspacing="3" class="errormessage">
   <tr>
      <td class="contentfont"><a href="#" onclick="javascript:window.print(this);"><?=GMSG_PRINT_THIS_PAGE;?></a></td>
   </tr>
</table>
<? } ?>



<? if ($ad_display == 'live') { ?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" >
   
  
   <? if (!empty($direct_payment_box)) { ?>
  
   <tr height="21">
      <td colspan="5"><?=header6(MSG_DIRECT_PAYMENT);?></strong></td>
   </tr>
   <? foreach ($direct_payment_box as $dp_box) { ?>
   
   <tr>
      <td colspan="5" ><?=$dp_box;?></td>
   </tr>
   <? } ?>
   <? } ?>
</table>
<br>
<? } ?>
<?=$auction_friend_form;?>
<?=$msg_changes_saved;?>
<?=$block_reason_msg;?>


<table width="707" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="707" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="themes/<?=$setts['default_theme'];?>/images/bar_bg.gif">
                  <tr>
                    <td width="2%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/bar_subleftround.gif" width="9" height="40" /></td>
                    <td width="60%" align="left" valign="middle" class="memb_heading"><?=$item_details['name'];?></td>
                    <td width="38%" align="right" valign="middle" class="view"><?=MSG_AUCTION_ID;?>: <b><?=$item_details['auction_id'];?></td>
                  </tr>
                </table>
                 <? if (item::count_contents($item_details['ad_dd'])) { ?>
                <table width="100%" class="errormessage"><tr><td><img align="absmiddle" src="themes/<?=$setts['default_theme'];?>/img/system/zip.png" /> <strong><?=MSG_DIGITAL_MEDIA_ATTACHED;?></strong></td></tr></table>
                <? }?>
                
                <table width="100%" class="errormessage"><tr><td><strong><a href="<?=process_link('auction_details', array('auction_id' => $item_details['auction_id'], 'option' => 'item_watch'));?>"><?=MSG_WATCH_ITEM;?></a>&nbsp;|&nbsp;<a href="javascript:popUp('<?=process_link('auction_print', array('auction_id' => $item_details['auction_id']));?>');"><?=MSG_PRINT_VIEW;?></a>&nbsp;|&nbsp;<a href="<?=process_link('auction_details', array('auction_id' => $item_details['auction_id'], 'option' => 'auction_friend'));?>"><?=MSG_SEND_TO_FRIEND;?></a> 
                
                
                     <? if ($ad_display == 'live' && $session->value('user_id')) { ?>

				  <? if ($item_details['owner_id'] == $session->value('user_id')) { ?>
                  | <a href="<?=process_link('sell_item', array('option' => 'sell_similar', 'auction_id' => $item_details['auction_id']));?>"><?=MSG_SELL_SIMILAR;?></a>
      <? if (!$item->under_time($item_details))	{ ?>
                  <? if ($item_details['nb_bids']==0 && $item_details['active']==1)	{ ?>
                  | <a href="edit_item.php?auction_id=<?=$item_details['auction_id'];?>&edit_option=new"><?=MSG_EDIT_AUCTION;?></a> | <a href="members_area.php?do=delete_auction&auction_id=<?=$item_details['auction_id'];?>&page=selling&section=open" onclick="return confirm('<?=MSG_DELETE_CONFIRM;?>');">
                  <?=MSG_DELETE;?>
                  </a>
      <? } else if ($item_details['nb_bids']>0 && $item_details['active']==1) { ?>
                  | <a href="edit_description.php?auction_id=<?=$item_details['auction_id'];?>">
                  <?=MSG_EDIT_DESCRIPTION;?>
                  </a> 
      <? } ?>
                  <? } ?>
						<? if ($item->can_close_manually($item_details, $session->value('user_id'))) { ?>
						| <a href="members_area.php?do=close_auction&auction_id=<?=$item_details['auction_id'];?>&page=selling&section=open" onclick="return confirm('<?=MSG_CLOSE_AUCTION_CONFIRM;?>');"><?=MSG_CLOSE_AUCTION;?></a> 
<? } ?>                  
						<? } else if ($session->value('user_id')) { ?>
							| <a href="<?=process_link('members_area', array('page' => 'account', 'section' => 'abuse_report', 'auction_id' => $item_details['auction_id']));?>"><?=MSG_REPORT_AUCTION;?></a>
						<? } ?>
             
               <? }?>
                
                
                
                </strong> </td></tr></table>
                </td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="43%" align="left" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border_right">
                      <tr>
                        <td align="center" valign="top"><? if (!empty($item_details['ad_image'][0])) { ?>
                          <img src="<?=SITE_PATH;?>thumbnail.php?pic=<?=$item_details['ad_image'][0];?>&w=250&sq=Y&b=N" border="0" alt="<?=$item_details['name'];?>">
                        <? }?>                        </td>
                      </tr>
                      <tr>
                        <td align="center" valign="top"><!--<table width="270" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                           <td align="center"  nowrap width="22%">
                           <img src="themes/<?=$setts['default_theme'];?>/img/system/print_printer.png" /><br />
                           <a href="javascript:popUp('<?=process_link('auction_print', array('auction_id' => $item_details['auction_id']));?>');"><?=MSG_PRINT_VIEW;?></a> | </td>
                           <td align="center"  nowrap width="22%"><a href="<?=process_link('auction_details', array('auction_id' => $item_details['auction_id'], 'option' => 'item_watch'));?>"><?=MSG_WATCH_ITEM;?></a> | </td>
  <td align="center"  nowrap width="22%"><a href="<?=process_link('auction_details', array('auction_id' => $item_details['auction_id'], 'option' => 'auction_friend'));?>"><?=MSG_SEND_TO_FRIEND;?></a></td>
                             </tr>
                        </table>--></td>
                      </tr>
                      
                       <? if ($ad_display == 'live') { ?>
                      <tr>
                        <td height="30" align="center" valign="middle" style="padding-right:10px;" class="placebid"><?=MSG_ITEM_VIEWED;?>
                  <?=($item_details['nb_clicks']+1); ?>
                  <?=GMSG_TIMES;?></td>
                      </tr>
                      <? }?>
                      <tr>
                        <td align="right" valign="top" class="review">                        </td>
                      </tr>
					   <tr>
                        <td height="30" align="right" valign="top" >&nbsp;</td>
                      </tr>
                    </table></td>
                    <td width="57%" align="right" valign="top"><table width="383" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                         
                        
                        </table></td>
                      </tr>
                      
                      <tr>
                        <td align="left" valign="top"><table width="94%" border="0" cellspacing="1" cellpadding="6">
                         
                           <? if (!$buyout_only) { ?>
                          <tr>
                            <td width="38%" height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_START_BID;?></td>
                            <td width="62%" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$fees->display_amount($item_details['start_price'], $item_details['currency']); ?> 
							<? if ($ad_display == 'live') { ?>
                  <span class="contentfont">[ <a href="javascript:void(0);" onClick="converter_open('currency_converter.php?currency=<?=$item_details['currency'];?>&amount=<?=$item_details['start_price'];?>');">
                  <?=MSG_CONVERT;?>
                  </a> ]</span>
                  <? } ?></td>
                          </tr>
                          
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_CURRENT_BID;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$fees->display_amount((($item_details['auction_type'] == 'first_bidder') ? $item_details['fb_current_bid'] : $item_details['max_bid']), $item_details['currency']); ?></td>
                          </tr>
                          <? if ($your_bid>0) { ?>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_YOUR_BID;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><strong><?=$fees->display_amount($your_bid, $item_details['currency']); ?></strong></td>
                          </tr>
                          <? }?>
                          
                           <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#CCCCCC" class="black_auc"><?=MSG_YOUR_MAXIMUM_BID;?></td>
                            <td align="left" valign="middle" bgcolor="#CCCCCC" class="black_auc1">
                            
                            
                            <? if ($item_can_bid['result']) { ?>
                         
                          
                           <table width="100%" border="0" cellpadding="1" cellspacing="8">
                              <form action="bid.php" method="post">
                                 <input type="hidden" name="auction_id" value="<?=$item_details['auction_id'];?>">
                                 <input type="hidden" name="action" value="bid_confirm">
                                 <tr>
                                    <td><? if ($item_can_bid['show_box']) { ?>
                                    	<? if ($item_details['auction_type'] != 'first_bidder') { ?>
                                       <? if ($item_details['auction_type']=='dutch') { ?>
                                       <div style="padding-bottom: 10px;">
                                          <?=GMSG_QUANTITY;?>
                                          <input name="quantity" type="text" id="quantity" value="1" size="8">
                                       </div>
                                       <? } ?>
                                       
                                       
                                       <input name="max_bid" type="text" id="max_bid" size="7" />
                                       <div class="redfont" style="font-size: 10px;">
                                          <?=MSG_MINIMUM_BID;?>
                                          : <b><? echo $fees->display_amount($item->min_bid_amount($item_details), $item_details['currency']);?></b></div>
													<? } ?>
                                    <td><input class="placebid" name="form_place_bid" type="submit" id="form_place_bid" value="<?=MSG_PLACE_BID;?>" <? echo (!$item_can_bid['result'] || $blocked_user) ? 'disabled' : ''; ?>>
                                       <? } ?>
                                    </td>
                                 </tr>
                              </form>
                           </table>
                           
                           <? } ?>
                           <? if (!empty($item_can_bid['display'])) { ?>
                           <div class="errormessage">
                              <?=$item_can_bid['display'];?>
                           </div>
                         
                           <? } ?>
                            
                            </td>
                          </tr>
						  <? }?>
                          <? if ($show_buyout) { ?>
                          <tr><td height="22" align="left" valign="middle" bgcolor="#CCCCCC" class="black_auc"><?=MSG_PRICE;?></td>
                          <td height="22" align="left" valign="middle" bgcolor="#CCCCCC" class="black_auc" nowrap="nowrap"><?
						  
						  echo '<b class="buyout">' . $fees->display_amount($item_details['buyout_price'], $item_details['currency']) . '</b> &nbsp;&nbsp;&nbsp;&nbsp;';
																					
			                           if ($ad_display == 'preview' || $session->value('user_id') == $item_details['owner_id'] || $blocked_user)
			                           {?>
			                           <input class="placebid" name="form_place_bid" type="submit"  value="<?=GMSG_BUYOUT;?>" <? echo (!$item_can_bid['result'] || $blocked_user) ? 'disabled' : ''; ?>>
			                          <? }
			                           else
			                           {?>
			                           <?echo '<a href="buy_out.php?auction_id=' . $item_details['auction_id'] . '"><img src="themes/' . $setts['default_theme'] . '/img/buyout.gif" border="0" style="margin-bottom: 5px;"></a>';?>
                                        <input  onClick="location.href='buy_out.php?auction_id=<?=$item_details['auction_id'];?>'" class="placebid" name="form_place_bid" type="submit" id="form_place_bid" value="<?=GMSG_BUYOUT;?>" <? echo (!$item_can_bid['result'] || $blocked_user) ? 'disabled' : ''; ?>>
			                           <? }
			                           
												?></td>
                          </tr>
                          <? }?>
                         <? if ($ad_display != 'preview' && $session->value('user_id') != $item_details['owner_id'])
               	{?>
                          <tr><td bgcolor="#CCCCCC" class="black_auc"></td><td bgcolor="#CCCCCC" class="black_auc"><a href="<?=process_link('auction_details', array('auction_id' => $item_details['auction_id'], 'option' => 'item_watch'));?>"><?=MSG_WATCH_ITEM;?></a></td></tr><? }?>
             
            <? if ($item_details['auction_type'] == 'first_bidder' || ($ad_display == 'preview' && $item_details['is_reserve'] && !$buyout_only)) { ?>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_RES_PRICE;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$fees->display_amount($item_details['reserve_price'], $item_details['currency']); ?></td>
                          </tr>
           <? } ?>
           <? if ($item_details['quantity']>1) { ?>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"> <?=GMSG_QUANTITY;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$item_details['quantity'];?></td>
                          </tr>
                          <? }?>
                          <? if ($ad_display == 'live' && !$buyout_only && $item_details['auction_type'] != 'first_bidder') { ?>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_NR_BIDS;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$item_details['nb_bids'];?>
                  <? if ($item_details['nb_bids']) { ?>
                  [ <a href="<?=process_link('bid_history', array('auction_id' => $item_details['auction_id']));?>">
                  <?=MSG_VIEW_HISTORY;?>
                  </a> ]
                  <? } ?></td>
                          </tr>
                          <? }?>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"> <?=MSG_LOCATION;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$auction_location;?></td>
                          </tr>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_COUNTRY;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="open"><?=$auction_country;?></td>
                          </tr>
                            <? if ($ad_display == 'live' && $item_details['start_time'] <= CURRENT_TIME && $item_details['auction_type'] != 'first_bidder') { // dont show if the auction is not started ?>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_TIME_LEFT;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=time_left($item_details['end_time']); ?></td>
                          </tr>
                          <? }?>
                          
                           <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=GMSG_START_TIME;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><? echo ($ad_display == 'live' || $item_details['start_time_type'] == 'custom') ? show_date($item_details['start_time']) : GMSG_NOW; ?></td>
                          </tr>
                          
                           <? if ($item_details['auction_type'] == 'first_bidder') { ?>
                           <tr class="c5">
              				 <td colspan="2"></td>
         				   </tr>
                           <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_FB_DECREMENT;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?
               	$fb_decrement = $item->convert_fb_decrement($item_details, 'NTS');
               	
               	echo $fees->display_amount($item_details['fb_decrement_amount'], $item_details['currency']) . ' ' . $fb_decrement['display']; ?></td>
                          </tr>
                           <? if ($ad_display == 'live' && $item_details['closed'] == 0) { ?>
                           <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_NEXT_DECREMENT;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=show_date($item_details['fb_next_decrement']); ?></td>
                          </tr>
                          <? }?>
                          <tr class="c5">
               <td colspan="2"></td>
            </tr>
                        <? } else { ?>
            <? if ($ad_display == 'live' || $item_details['end_time_type'] == 'custom') { ?>

                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=GMSG_END_TIME;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=show_date($item_details['end_time']); ?></td>
                          </tr>
                                      <? } else { ?>

                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=GMSG_DURATION;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><? echo $item_details['duration'] . ' ' . GMSG_DAYS; ?></td>
                          </tr>
                          <? } ?>
				<? } ?>
                 <? if ($ad_display == 'live') { ?>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_STATUS;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=item::item_status($item_details['closed']); ?></td>
                          </tr>
                          <? }?>
                          <tr class="c5">
               <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
               <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
            </tr>
                          <? if ($item_details['is_offer'] && $setts['makeoffer_process'] == 1) { ?>
                          <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=GMSG_MAKE_OFFER;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?
               	if ($ad_display == 'preview' || $session->value('user_id') == $item_details['owner_id'] || $blocked_user)
               	{
               		echo '<img src="themes/' . $setts['default_theme'] . '/img/system/makeoffer25.gif" border="0">';
               	}
               	else
               	{
               		echo '<a href="make_offer.php?auction_id=' . $item_details['auction_id'] . '"><img src="themes/' . $setts['default_theme'] . '/img/system/makeoffer25.gif" border="0"></a>';
               	}
               ?></td>
                          </tr>
                           <? if ($ad_display != 'live' || $setts['makeoffer_private']) { ?>
                           <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_OFFER_RANGE;?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$item->offer_range($item_details);?></td>
                          </tr>
                           <? } ?>
                           <tr class="c5">
               <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
               <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
            </tr>
            <? }?>
            <? if ($ad_display == 'live' && $item_details['reserve_price']>0 && $item_details['auction_type'] != 'first_bidder') { ?>
                           <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc" colspan="2"><? echo ($item_details['reserve_price']>$item_details['max_bid']) ? '<span class="redfont">' . MSG_RESERVE_NOT_MET . '</span>' : '<span class="greenfont">' . MSG_RESERVE_MET . '</span>'; ?></td>
                           
                          </tr>
                           <tr class="c5">
               <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
            </tr>
            <? }?>
             <? if ($item_details['enable_swap'] && !$item_details['closed']) { ?>
                           <tr>
                            <td colspan="2" height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_SWAP_OFFERS_ACCEPTED;?> <? echo ($ad_display == 'live' && !$blocked_user) ? $swap_offer_link : '';?></td>
                           
                          </tr>
                          <tr class="c5">
               <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
            </tr>
            <? }?>
            <? if ($ad_display == 'live' && !$buyout_only && !$item_details['closed'] && $item_details['auction_type'] != 'first_bidder') { ?>
                           <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=MSG_HIGH_BID; ?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$high_bidders_content;?></td>
                          </tr>
               <? } ?>
            <? if ($ad_display == 'live' && !empty($winners_content)) { ?>
                           <tr>
                            <td height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"> <?=MSG_WINNER_S; ?></td>
                            <td align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc1"><?=$winners_content;?></td>
                          </tr>
                          <? }?>
                           <? if ($item_details['apply_tax']) { ?>
                           <tr>
                            <td colspan="2" height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=$auction_tax['display'];?></td>
                          </tr>
                          <tr class="c5">
               <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
            </tr>
                         <? if ($auction_tax['display_buyer']) { ?>
                           <tr>
                            <td colspan="2" height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=$auction_tax['display_buyer'];?></td>
                           
                          </tr>
                           <tr class="c5">
               <td colspan="2"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
            </tr>
            <? } ?>
            <? } ?>
                  <?=$winners_message_board;?>
                   <? if (!empty($item_watch_text)) { ?>        
                          <tr>
                            <td colspan="2" height="22" align="left" valign="middle" bgcolor="#EEEEEE" class="black_auc"><?=$item_watch_text;?></td>
                         
                          </tr>
                        <? }?>  
                          
                         
                          
                         
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">
			<div class="tabber">

     <div class="tabbertab">
	  <h2><?=GMSG_DESCRIPTION;?></h2>
	  <?=database::add_special_chars($item_details['description']);?>
      <table><tr><td><?=$custom_sections_table;?></td></tr></table>
     </div>
     
     
     <? if (item::count_contents($item_details['ad_image'])) { ?>
     <div class="tabbertab ">
	  <h2><?=MSG_AUCTION_IMAGES;?></h2>
	  <table width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr align="center">
               <td valign="top" class="picselect"><table cellpadding="3" cellspacing="1" border="0">
                     <tr align="center">
                        <td><b>
                           <?=MSG_SELECT_PICTURE;?>
                           </b></td>
                     </tr>
                     <tr align="center">
                        <td><?=$ad_image_thumbnails;?></td>
                     </tr>
                  </table></td>
               <td width="100%" class="picselectmain" align="center"><img name="main_ad_image" src="<?=SITE_PATH;?>thumbnail.php?pic=<?=$item_details['ad_image'][0];?>&w=500&sq=Y&b=Y" border="0" alt="<?=$item_details['name'];?>"></td>
            </tr>
         </table>
     </div>
     <? }?>

<? if (item::count_contents($item_details['ad_video'])) { ?>
     <div class="tabbertab">
	  <h2><?=MSG_AUCTION_MEDIA;?></h2>
	    <table width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr align="center">
               <td valign="top" class="picselect"><table cellpadding="3" cellspacing="1" border="0">
                     <tr align="center">
                        <td><b>
                           <?=MSG_SELECT_VIDEO;?>
                           </b></td>
                     </tr>
                     <tr align="center">
                        <td><?=$ad_video_thumbnails; ?></td>
                     </tr>
                  </table></td>
               <td width="100%" class="picselectmain"align="center"><?=$ad_video_main_box; ?></td>
            </tr>
         </table>
     </div>
 <? }?>
	 
	 <div class="tabbertab">
	  <h2><?=MSG_SELLER_INFORMATION;?></h2>
	
 <table width="100%" border="0" cellspacing="2" cellpadding="3">
            <tr>
               <td><b><?=$user_details['username'];?></b><?=user_pics($user_details['user_id']);?></td>
            </tr>
            <tr class="c1">
               <td><?=MSG_REGISTERED_SINCE;?><b><?=show_date($user_details['reg_date'], false);?></b><br><? echo GMSG_IN . ' <b>' . $seller_country . '</b>'; ?></td>
            </tr>
            <? if ($ad_display == 'live') { ?>
            <tr class="c1">
               <td class="contentfont"><a href="<?=process_link('other_items', array('owner_id' => $item_details['owner_id']));?>">
                  <?=MSG_OTHER_ITEMS_FROM_SELLER;?>
                  </a></td>
            </tr>
            <? if ($user_details['shop_active']) { ?>
            <tr class="c1">
               <td class="contentfont"><a href="<?=process_link('shop', array('user_id' => $item_details['owner_id']));?>">
                  <?=MSG_VIEW_STORE;?>
                  </a></td>
            </tr>
            <? } ?>
            <? } ?>
            <tr class="c5">
               <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
            </tr>
         </table>
         <?=$reputation_table_small;?>

</div>

 <div class="tabbertab">
	  <h2><?=MSG_SHIPPING_PAYMENTS;?></h2>
	  <table width="100%" border="0" cellspacing="2" cellpadding="3" class="border">
           
          
            <tr class="c1">
               <td width="150" align="right"><?=MSG_SHIPPING_CONDITIONS;?></td>
               <td><? echo ($item_details['shipping_method'] == 1) ? MSG_BUYER_PAYS_SHIPPING : MSG_SELLER_PAYS_SHIPPING; ?></td>
            </tr>
            <? if ($item_details['shipping_int'] == 1) { ?>
            <tr>
               <td>&nbsp;</td>
               <td><?=MSG_SELLER_SHIPS_INT;?></td>
            </tr>
            <? } ?>
            <? if ($setts['enable_shipping_costs']) { ?>
            <? if ($user_details['pc_postage_type'] == 'item') { ?>
            <tr class="c1">
               <td width="150" align="right"><?=MSG_POSTAGE;?></td>
               <td><?=$fees->display_amount($item_details['postage_amount'], $item_details['currency']); ?></td>
            </tr>
            <? } ?>
	         <? if ($user_details['pc_postage_type'] == 'weight' && $item_details['item_weight']) { ?>
            <tr class="c1">
               <td width="150" align="right"><?=MSG_WEIGHT;?></td>
               <td><?=$item_details['item_weight'];?> <?=$user_details['pc_weight_unit'];?></td>
            </tr>
	         <? } ?>	
            <tr class="c1">
               <td width="150" align="right"><?=MSG_INSURANCE;?></td>
               <td><?=$fees->display_amount($item_details['insurance_amount'], $item_details['currency']); ?></td>
            </tr>
            <tr class="c1">
               <td width="150" align="right"><?=MSG_SHIP_METHOD;?></td>
               <td><?=$item_details['type_service'];?></td>
            </tr>
            <? if ($item_details['shipping_details']) { ?>
            <tr class="c1">
               <td width="150" align="right"><?=MSG_SHIPPING_DETAILS;?></td>
               <td><?=$item_details['shipping_details'];?></td>
            </tr>
            <? } ?>
            <tr><td colspan="2">
            <? if ($ad_display == 'live') { ?>
            <?=$shipping_calculator_box;?>
            <? }?>
            </td></tr>
            <? } ?>
         </table>
         
         
         
         
         <? if ($item_details['direct_payment']) { ?>
         <div><?=$direct_payment_methods_display;?></div>
         <? }?>
      <div><?=$offline_payment_methods_display;?></div>
         
     </div>
      <!--<? if ($item_details['direct_payment']) { ?>
     <div class="tabbertab">
	  <h2><?=MSG_DIRECT_PAYMENT;?></h2>
	  <div><?=$direct_payment_methods_display;?></div>
      <div><?=$offline_payment_methods_display;?></div>
     </div>-->
     <? }?>
      <? if ($setts['enable_asq'] && $ad_display == 'live') { ?> 
      <div class="tabbertab">
	  <h2><?=MSG_ASK_SELLER_QUESTION;?></h2>
	  <table width="100%">
	  <?=$public_questions_content;?>
   </table>
   
   
   
   
   <? if ($session->value('adminarea') == 'Active') { ?>
   <table>
   <tr>
      <td align="center" colspan="2"><?=MSG_QUESTIONS_LOGGED_AS_ADMIN;?></td>
   </tr>
   </table>
   <? } else if (!$session->value('user_id')) { ?>
    <table>
   <tr>
      <td align="center" colspan="2"><?=MSG_LOGIN_TO_ASK_QUESTIONS;?></td>
   </tr>
   </table>
	<? } else if ($session->value('membersarea') != 'Active') { ?>
     <table>
   <tr>
      <td align="center" colspan="2"><?=MSG_ACC_SUSPENDED_ASK_QUESTION;?></td>
   </tr>
   </table>
   <? } else if ($session->value('user_id') == $item_details['owner_id']) { ?>
    <table>
   <tr>
      <td align="center" colspan="2"><?=MSG_CANT_POST_QUESTION_OWNER;?></td>
   </tr>
   </table>
   <? } else { ?>
    <table>
   <tr>
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
      <td><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="1"></td>
   </tr>
   <form action="auction_details.php" method="POST">
      <input type="hidden" name="auction_id" value="<?=$item_details['auction_id'];?>">
      <input type="hidden" name="option" value="post_question">
      <tr class="c1">
         <td><table width="100%">
               <tr>
                  <td><img src="themes/<?=$setts['default_theme'];?>/img/system/i_faq.gif" align="absmiddle"/></td>
                  <td width="100%" align="right"><strong>
                     <?=MSG_POST_QUESTION;?>
                     </strong></td>
               </tr>
            </table></td>
         <td><table>
               <tr>
                  <td><textarea name="message_content" cols="40" rows="3" class="contentfont"></textarea></td>
                  <td><div style="padding: 2px;">
                        <select name="message_handle">
                           <? if ($user_details['default_public_questions']) { ?>
                           <option value="1" selected>
                           <?=MSG_POST_QUESTION_PUBLICLY;?>
                           </option>
                           <? } ?>
                           <option value="2">
                           <?=MSG_POST_QUESTION_PRIVATELY;?>
                           </option>
                        </select>
                     </div>
                     <div style="padding: 2px;">
                        <input name="form_post_question" type="submit" id="form_post_question" value="<?=GMSG_SUBMIT;?>" />
                     </div></td>
               </tr>
            </table></td>
      </tr>
   </form>
   </table>
   <? } ?>

      
      
      
      
     </div>
     <? } ?>
     
     
     <!-- <div class="tabbertab">
	  <h2>Seller Information</h2>
	  <p>Tab 4 content.</p>
     </div>-->
     
</div>	


		</td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">
            
            
            <? if ($ad_display == 'live') { ?>
            <? if ($setts['enable_other_items_adp'] && $item->count_contents($other_items)) { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="themes/<?=$setts['default_theme'];?>/images/bar_bg.gif">
                    <tr>
                      <td width="2%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/bar_leftround.gif" width="11" height="40" /></td>
                      <td width="60%" align="left" valign="middle" class="memb_heading"><?=MSG_OTHER_ITEMS_FROM_SELLER;?></td>
                      <td width="38%" align="right" valign="middle" class="view">&raquo; <a href="<?=process_link('other_items', array('owner_id' => $item_details['owner_id']));?>" class="viewlink"><?=MSG_VIEW_ALL;?></a></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="centerbox_border">
                
                
                
                
                
                
                
                <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                      
                      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                         
                         
                          <tr>
                          
                          <? for ($counter=0; $counter<$layout['hpfeat_nb']; $counter++) {
			$width = 100/$layout['hpfeat_nb'] . '%'; ?>
                            <td width="<?=$width;?>" align="center" valign="top">
                            <!-- start of the box -->
                            <? if (!empty($other_items[$counter]['name'])) {
      		$main_image = $db->get_sql_field("SELECT media_url FROM " . DB_PREFIX . "auction_media WHERE
      			auction_id='" . $other_items[$counter]['auction_id'] . "' AND media_type=1 AND upload_in_progress=0 ORDER BY media_id ASC LIMIT 0,1", 'media_url');

      		$auction_link = process_link('auction_details', array('name' => $other_items[$counter]['name'], 'auction_id' => $other_items[$counter]['auction_id']));?>
                            <table width="<?=$width;?>%" border="0" cellspacing="0" cellpadding="0" class="recom_boxbg">
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td height="33" align="center" valign="middle" class="bluenew"><a class="bluenew" href="<?=$auction_link;?>"><?=title_resize($other_items[$counter]['name']);?></a></td>
                                  </tr>
                                  <tr>
                                    <td height="20" align="center" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/sub_shadow_img.gif" width="156" height="9" /></td>
                                  </tr>
                                  <tr>
                                    <td align="center" valign="top"><a href="<?=$auction_link;?>"><img src="<? echo ((!empty($main_image)) ? 'thumbnail.php?pic=' . $main_image . '&w=' . $layout['hpfeat_width'] . '&sq=Y' : 'themes/' . $setts['default_theme'] . '/img/system/noimg.gif');?>" border="0" alt="<?=$other_items[$counter]['name'];?>" /></a></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top" class="black_nor" style="padding-left:20px;"><strong><?=MSG_START_BID;?>:</strong> <? echo $fees->display_amount($other_items[$counter]['start_price'], $other_items[$counter]['currency']);?> <br />
                                      <strong><?=MSG_CURRENT_BID;?>:</strong> <? echo $fees->display_amount($other_items[$counter]['max_bid'], $other_items[$counter]['currency']);?> <br />
                                      <strong><?=MSG_ENDS;?>:</strong> <? echo show_date($other_items[$counter]['end_time']); ?></td>
                                  </tr>
                                  <tr>
                                    <td height="20" align="left" valign="top">&nbsp;</td>
                                  </tr>
                                 
                                  <tr>
                                    <td align="left" valign="top">&nbsp;</td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
                            <? }?>
                           <!-- end of the box -->                            </td>
                            
                            <? }?>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">&nbsp;</td>
                    </tr>

                    
                </table>
                
                
                
                
                
                
                
                
                
                </td>
              </tr>
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="themes/<?=$setts['default_theme'];?>/images/bar_dwncenterbg.gif">
                    <tr>
                      <td width="4%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/bar_dwnleftround.gif" width="27" height="12" /></td>
                      <td width="91%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/bar_dwncenterbg.gif" width="13" height="12" /></td>
                      <td width="5%" align="right" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/bar_dwnrightround.gif" width="27" height="12" /></td>
                    </tr>
                </table></td>
              </tr>
            </table><? }?>
            <? } ?></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>
