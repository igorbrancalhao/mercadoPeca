<?
#################################################################
## PHP Pro Bid v6.06															##
##-------------------------------------------------------------##
## Copyright �2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<script type="text/javascript" src="scripts/swfobject.js"></script>

<script type="text/javascript">
	swfobject.registerObject("flashContent", "9.0.0", "expressInstall.swf");

	function selected(param){
    window.open(param);
  }

</script>
<? if ($member_active != 'Active') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="71%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/main_pic.gif" width="496" height="185" /></td>
                <td width="29%" align="right" valign="top"><table width="196" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="themes/<?=$setts['default_theme'];?>/images/memb_bg.gif">
                      <tr>
                        <td width="7%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/memb_leftround.gif" width="14" height="33" /></td>
                        <td width="86%" align="left" valign="middle" class="memb_heading">Fazer Login</td>
                        <td width="7%" align="right" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/memb_rightround.gif" width="14" height="33" /></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="memb_border">
                    
                    
                    <table width="177" border="0" align="center" cellpadding="0" cellspacing="0">
                    <form action="login.php" method="post" name="loginbox">
      <input type="hidden" name="operation" value="submit">
      <input type="hidden" name="redirect" value="<?=$redirect;?>">
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="26" align="center" valign="middle" class="userbg"><input type="text" name="username" class="textbox_user" value="" ></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="26" align="center" valign="middle" class="password_bg"><input type="password" name="password" class="textbox_user" value=""></td>
                      </tr>
                      <tr>
                        <td height="20" align="left" valign="middle" class="forgot">&raquo;  <a href="retrieve_password.php" class="forgotlink"><?=MSG_FORGOT_PASSWORD;?></a></td>
                      </tr>
                      <tr>
                        <td height="20" align="left" valign="top" class="forgot">&raquo;  <a href="register.php" class="forgotlink"><?=MSG_NEW_USER;?></a></td>
                      </tr>
                      <tr>
                        <td height="27" align="left" valign="top"><input class="placebid1" name="form_place_bid" type="submit"  value="<?=MSG_LOGIN;?>" > </td>
                      </tr>
                      </form>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/memb_dwnround.gif" width="196" height="6" /></td>
                  </tr>
                  
                </table></td>
              </tr>
            </table>
<table>
<tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
</table>
<? }?>
<? if ($layout['hpfeat_nb']) { ?>
<?=$featured_auctions_header;?>
<? $cover = unserialize($layout['cover_config']);
if ($cover["enable_coverflow"]==1){
	include("cowerFlow.php");
?>
   <div id="flashWrapper">
	 <div id="flashContent" align="center">
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="770" height="450" id="animatop" align="middle">
                          <param name="allowScriptAccess" value="sameDomain">
                          <param name="movie" value="coverflow.swf?coverConfig=coverConfig.xml&coverFeed=coverFeed.xml&current=3">
                          <param name="quality" value="best">
                          <param name="bgcolor" value="#ffffff">
                          <param name="menu" value="false">
                          <param name="wmode" value="transparent">
                          <embed src="coverflow.swf?coverConfig=coverConfig.xml&coverFeed=coverFeed.xml&current=3" menu="false" quality="best" wmode="transparent" bgcolor="#ffffff" wmode = "transparent" width="770" height="450" name="animatop" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
                   </object>



<!--> <![endif]-->

<!--[if IE]>

Description of Flash Content for screen readers

<![endif]-->

</object>    </div>
   </div>
<? } else{ ?>


<table cellpadding="0" cellspacing="0" width="100%"><tr> <td wid align="left" valign="top" class="centerbox_border">

<table width="100%" border="0" cellpadding="0" cellspacing="3" >

<tr>
                    <td align="left" valign="top" >&nbsp;</td>
                  </tr>
   <?
	$counter = 0;
	for ($i=0; $i<$featured_columns; $i++) { ?>
   <tr>
      <?
      for ($j=0; $j<$layout['hpfeat_nb']; $j++) {
			$width = 100/$layout['hpfeat_nb'] . '%'; ?>
      <td width="<?=$width;?>" align="center" valign="top">
      	<?
      	if (!empty($item_details[$counter]['name'])) {
      		$main_image = $feat_db->get_sql_field("SELECT media_url FROM " . DB_PREFIX . "auction_media WHERE
      			auction_id='" . $item_details[$counter]['auction_id'] . "' AND media_type=1 AND upload_in_progress=0 ORDER BY media_id ASC LIMIT 0,1", 'media_url');

      		$auction_link = process_link('auction_details', array('name' => $item_details[$counter]['name'], 'auction_id' => $item_details[$counter]['auction_id']));?>

         <table width="98%" border="0" cellpadding="0" cellspacing="0" class="border_tab">
                          <tr>
                            <td height="36" align="left" valign="middle" class="blue_bold"><a href="<?=$auction_link;?>"><?=title_resize($item_details[$counter]['name']);?></a></td>
                            </tr>
                          <tr>
                            <td height="99" align="left" valign="middle" class="center_boxbg">
                            	
                            <table width="100%" border="0" cellspacing="3" cellpadding="2">
                              <tr>
                                <td width="34%" align="center" valign="middle"><a href="<?=$auction_link;?>"><img src="<? echo ((!empty($main_image)) ? 'thumbnail.php?pic=' . $main_image . '&w=' . $layout['hpfeat_width'] . '&sq=Y' : 'themes/' . $setts['default_theme'] . '/img/system/noimg.gif');?>" border="0" alt="<?=$item_details[$counter]['name'];?>"></a></td>
                                <td width="66%" align="left" valign="top" class="black_nor">
                                <strong><?=MSG_START_BID;?>:</strong> <? echo $feat_fees->display_amount($item_details[$counter]['start_price'], $item_details[$counter]['currency']);?> <br />
                                <strong><?=MSG_CURRENT_BID;?>:</strong> <? echo $feat_fees->display_amount($item_details[$counter]['max_bid'], $item_details[$counter]['currency']);?> <br />
                                <strong><?=MSG_ENDS;?>:</strong> <? echo show_date($item_details[$counter]['end_time']); ?> </td>
                              </tr>
                            </table>
                            </td>
                          </tr>
                        </table>
         
         
         
         <? $counter++;
      	} ?></td>
      <? } ?>
   </tr>
   <? } ?>
</table>
</td></tr>
<tr>

<td align="left" valign="top">
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="themes/<?=$setts['default_theme'];?>/images/bar_dwncenterbg.gif">
                  <tr>
                    <td width="27" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/bar_dwnleftround.gif" width="27" height="12" /></td>
                    <td width="100%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/bar_dwncenterbg.gif" width="100%" height="12" /></td>
                    <td width="5%" align="right" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/bar_dwnrightround.gif" width="27" height="12" /></td>
                  </tr>
                </table></td>
</tr></table>
<div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="5"></div>
<? } ?>
<? if ($layout['r_hpfeat_nb'] && $setts['enable_reverse_auctions']) { ?>
<?=$featured_reverse_auctions_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="3" >
   <?
	$counter = 0;
	for ($i=0; $i<$featured_ra_columns; $i++) { ?>
   <tr>
      <?
      for ($j=0; $j<$layout['r_hpfeat_nb']; $j++) {
			$width = 100/$layout['r_hpfeat_nb'] . '%'; ?>
      <td width="<?=$width;?>" align="center" valign="top">
      	<?
      	if (!empty($ra_details[$counter]['name'])) {
      		$auction_link = process_link('reverse_details', array('name' => $ra_details[$counter]['name'], 'reverse_id' => $ra_details[$counter]['reverse_id']));?>
         <table width="100%" border="0" cellspacing="1" cellpadding="3">
           <tr>
               <td class="c3">&nbsp;&raquo;&nbsp;<a href="<?=$auction_link;?>"><?=title_resize($ra_details[$counter]['name']);?></a></td>
            </tr>
            <tr>
               <td class="c1 smallfont">
               	
               	<?=MSG_BUDGET;?>: <? echo $feat_fees->budget_output($ra_details[$counter]['budget_id'], null, $ra_details[$counter]['currency']);?> 
               	<br>
               	<?=MSG_NR_BIDS;?>: <? echo $ra_details[$counter]['nb_bids'];?>
               	<br>
               	<?=MSG_ENDS;?>: <? echo show_date($ra_details[$counter]['end_time']); ?>
               	</td>
            </tr>
         </table>
         <? $counter++;
      	} ?></td>
      <? } ?>
   </tr>
   <? } ?>
</table>
<div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="15"></div>
<? } ?>


<? }?>
<? if ($layout['nb_recent_auct']) { ?>
<?=$recent_auctions_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
   <tr class="c4" height="30">
      <td></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?=GMSG_START_TIME;?></b></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?=MSG_START_BID;?></b></td>
      <td class="smallfont" width="100%">&nbsp;<b><?=MSG_ITEM_TITLE;?><b></td>
      <td class="smallfont" nowrap>&nbsp;</td>
   </tr>
   <?
	while ($item_details = mysql_fetch_array($sql_select_recent_items))
	{
		$background = ($counter++%2) ? '' : '';
		$background .= ($item_details['bold']) ? ' bold_item' : '';
		$background .= ($item_details['hl']) ? ' hl_item' : ''; ?>

	<tr height="15" class="<?=$background;?>">
		<td width="11" id="bot"><img src="themes/<?=$setts['default_theme'];?>/images/time_icon.gif" width="18" height="17" hspace="3"></td>
		<td class="smallfont" id="bot" nowrap="nowrap">&nbsp;<b><?=show_date($item_details['start_time']);?></b></td>
		<td class="smallfont" id="bot" nowrap="nowrap">&nbsp;<?=$fees->display_amount($item_details['start_price'], $item_details['currency']);?></td> 
		<td id="bot" width="100%" class="smallfont">&nbsp;<a href="<?=process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><?=title_resize($item_details['name']);?></a></td> 
		<td nowrap id="bot"><?=item_pics($item_details);?>&nbsp;</td>
	</tr> 
   <? } ?>
</table>
<div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="15"></div>
<? } ?>
<? if ($layout['nb_popular_auct'] && $is_popular_items) { ?>
<?=$popular_auctions_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
   <tr class="c4" height="30">
      <td></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?=MSG_MAX_BID;?></b></td>
      <td class="smallfont" width="100%">&nbsp;<b><?=MSG_ITEM_TITLE;?><b></td>
      <td class="smallfont" nowrap>&nbsp;</td>
   </tr>
   <? 
	while ($item_details = mysql_fetch_array($sql_select_popular_items))
	{
		$background = ($counter++%2) ? '' : '';
		$background .= ($item_details['bold']) ? ' bold_item' : '';
		$background .= ($item_details['hl']) ? ' hl_item' : ''; ?>
		
	<tr height="15" class="<?=$background;?>">
		<td width="11" id="bot"><img src="themes/<?=$setts['default_theme'];?>/images/time_icon.gif" width="18" height="17" hspace="3" /></td> 
		<td class="smallfont" nowrap="nowrap" id="bot">&nbsp;<?=$fees->display_amount($item_details['max_bid'], $item_details['currency']);?></td> 
		<td width="100%" class="smallfont" id="bot">&nbsp;<a href="<?=process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><?=title_resize($item_details['name']);?></a></td> 
		<td nowrap id="bot"><?=item_pics($item_details);?>&nbsp;</td> 
	</tr> 
   <? } ?>
</table>
<div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="15"></div>
<? } ?>
<? if ($layout['nb_ending_auct']) { ?>
<?=$ending_auctions_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
   <tr class="c4" height="30">
      <td></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?=MSG_TIME_LEFT;?></b></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?=MSG_CURRENTLY;?><b></td>
      <td class="smallfont" width="100%">&nbsp;<b><?=MSG_ITEM_TITLE;?><b></td>
      <td class="smallfont" nowrap>&nbsp;</td>
   </tr>
   <?
	while ($item_details = mysql_fetch_array($sql_select_ending_items))
	{
		$item_details['max_bid'] = ($item_details['max_bid'] > 0) ? $item_details['max_bid'] : $item_details['start_price'];
		
		$background = ($counter++%2) ? '' : '';
		$background .= ($item_details['bold']) ? ' bold_item' : '';
		$background .= ($item_details['hl']) ? ' hl_item' : ''; ?>

	<tr height="15" class="<?=$background;?>"> 
		<td width="11" id="bot"><img src="themes/<?=$setts['default_theme'];?>/images/time_icon.gif" width="18" height="17" hspace="3" /></td> 
      <td class="smallfont" nowrap="nowrap" id="bot">&nbsp;<?=time_left($item_details['end_time']);?></td> 
      <td class="smallfont" nowrap="nowrap" id="bot">&nbsp;<?=$fees->display_amount($item_details['max_bid'], $item_details['currency']);?></td> 
      <td  class="smallfont" width="100%" id="bot">&nbsp;<a href="<?=process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><?=title_resize($item_details['name']);?></a></td> 
		<td nowrap id="bot"><?=item_pics($item_details);?>&nbsp;</td> 
   </tr> 
	<? } ?>
</table>
<div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="15"></div>
<? } ?>
<? if ($layout['nb_want_ads']) { ?>
<?=$recent_wa_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
   <tr class="c4" height="30">
      <td></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?=GMSG_START_TIME;?></b></td>
      <td class="smallfont" width="100%">&nbsp;<b><?=MSG_ITEM_TITLE;?><b></td>
   </tr>
   <?
	while ($item_details = mysql_fetch_array($sql_select_recent_wa))
	{
		$background = ($counter++%2) ? '' : ''; ?>

	<tr height="15" class="<?=$background;?>">
		<td width="11" id="bot"><img src="themes/<?=$setts['default_theme'];?>/images/search_icon.gif" width="15" height="16" /></td> 
		<td class="smallfont" nowrap="nowrap" id="bot">&nbsp;<b><?=show_date($item_details['start_time']);?></b></td> 
		<td class="smallfont" width="100%" id="bot">&nbsp;<a href="<?=process_link('wanted_details', array('name' => $item_details['name'], 'wanted_ad_id' => $item_details['wanted_ad_id']));?>"><?=title_resize($item_details['name']);?></a></td> 
	</tr> 
   <? } ?>
</table>
<div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="5"></div>
<? } ?>
</td>
