<?
#################################################################
## PHP Pro Bid v6.06										   ##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.  ##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CODEPAGE;?>" />
<title><?=$page_title;?></title>
<?=$page_meta_tags;?>
<link href="themes/<?=$setts['default_theme'];?>/style.css" rel="stylesheet" type="text/css" />
<link href="themes/<?=$setts['default_theme'];?>/css_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="themes/<?=$setts['default_theme'];?>/main.js" type="text/javascript"></script>
<script language=JavaScript src='scripts/innovaeditor.js'></script>

<script type="text/javascript">
var ie4 = false;
if(document.all) { ie4 = true; }

function getObject(id) { if (ie4) { return document.all[id]; } else { return document.getElementById(id); } }
function toggle(link, divId) {
	var lText = link.innerHTML;
	var d = getObject(divId);
	if (lText == '+') { link.innerHTML = '&#8211;'; d.style.display = 'block'; }
	else { link.innerHTML = '+'; d.style.display = 'none'; }
}

</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<body>
<table width="982" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" height="8"></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="962" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25%" height="88" align="left" valign="top"><a href="<?=$index_link;?>"><img src="images/probidlogo.gif?<?=rand(2,9999);?>" alt="Professional Auction Script Software by PHP Pro Bid" border="0"></a></td>
        <td width="54%" align="left" valign="top" style="padding:5px 0 0 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="47%" height="15" align="left" valign="middle">&nbsp;</td>
            <td width="6%" align="center" valign="middle"><img src="themes/<?=$setts['default_theme'];?>/images/register_arrow.gif" width="20" height="20" /></td>
            <td width="14%" nowrap="nowrap" align="left" valign="middle" class="login"><a href="<?=$register_link;?>" class="loginlink"><?=$register_btn_msg;?></a></td>
            <td width="6%" align="center" valign="middle"><img src="themes/<?=$setts['default_theme'];?>/images/login_icon.gif" width="20" height="20" /></td>
            <td width="10%" align="left" valign="middle"><a href="<?=$login_link;?>" class="loginlink"><?=$login_btn_msg;?></a></td>
            <td width="6%" align="center" valign="middle"><img src="themes/<?=$setts['default_theme'];?>/images/help_icon.gif" width="20" height="20" /></td>
            <td width="11%" align="left" valign="middle"><a href="<?=process_link('content_pages', array('page' => 'help'));?>" class="loginlink"><?=MSG_BTN_HELP;?></a></td>
        
        
          </tr>
        </table></td>
        <td width="21%" align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFF00D">
              <tr>
                <td width="6%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/top_leftround.gif" width="11" height="38" /></td>
                <td width="91%" align="left" valign="middle">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" background="themes/<?=$setts['default_theme'];?>/images/top_bgbox.gif">
                   <form action="auction_search.php" method="post">
                   	<tr>
                    <input type="hidden" name="option" value="basic_search">
                    <td width="1%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/top_textboxleftimg.gif" width="6" height="22" /></td>
                    <td width="84%" align="left" valign="top"><input type="text" name="basic_search" class="textbox_top" value="Procurar" onclick="if(this.value=='Procurar')this.value='';" onblur="if(this.value=='')this.value='Procurar';" /></td>
                    <td width="15%" align="right" valign="top">
                    <input type="image" src="themes/<?=$setts['default_theme'];?>/images/search_bt.gif" border="0" width="26" height="22"></td>
                    </tr>
                   </form>
                </table>
                </td>
                <td width="3%" align="right" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/top_rightround.gif" width="11" height="38" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">
            <? if ($setts['user_lang']) {
             	print "&nbsp;".$languages_list;
            } ?>
            <? if ($setts['enable_addthis']) { 
             	print $share_code;
            }?>
             
            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" height="40"><div id="topnav-menu">
    
					
         <ul>
            <li><a href="<?=$index_link;?>" <?=(eregi("index.php",$_SERVER['PHP_SELF'])?'class="current"':'');?>><span></span><?=MSG_BTN_HOME;?></a></li>
            <? if (!$setts['enable_private_site'] || $is_seller)  { ?>
            <li><a href="<?=$place_ad_link;?>" <?=(eregi("sell_item.php",$_SERVER['PHP_SELF'])?'class="current"':'');?>><span></span><?=$place_ad_btn_msg;?></a></li>
            <? }?>
            <li><a href="<?=$register_link;?>" <?=(eregi("members_area.php",$_SERVER['PHP_SELF']) || eregi("register.php",$_SERVER['PHP_SELF'])?'class="current"':'');?>><span></span><?=$register_btn_msg;?></a></li>
            <li><a href="<?=$login_link;?>" <?=(eregi("login.php",$_SERVER['PHP_SELF'])?'class="current"':'');?>><span></span><?=$login_btn_msg;?></a></li>
			<? if ($setts['enable_stores']) {?>
            <li><a href="<?=process_link('stores');?>" <?=(eregi("stores.php",$_SERVER['PHP_SELF'])?'class="current"':'');?>><span></span><?=MSG_BTN_STORES;?></a></li>
            <? }?>
            <? if ($setts['enable_reverse_auctions']) {?>
			 <li><a href="<?=process_link('reverse_auctions');?>" <?=(eregi("reverse_auctions.php",$_SERVER['PHP_SELF'])?'class="current"':'');?>><span></span><?=MSG_REVERSE;?></a></li>
			<? }?>
            <? if ($setts['enable_wanted_ads']) { ?>
            <li><a href="<?=process_link('wanted_ads');?>" <?=(eregi("wanted_ads.php",$_SERVER['PHP_SELF'])?'class="current"':'');?>><span></span><?=MSG_BTN_WANTED_ADS;?></a></li>
            <? }?>
          
            <li><a href="<?=process_link('site_fees');?>" <?=(eregi("site_fees.php",$_SERVER['PHP_SELF'])?'class="current"':'');?>><span></span><?=MSG_BTN_SITE_FEES;?></a></li>
	 </ul>
</div></td>
  </tr>
  <tr>
    <td height="400" align="left" valign="top" class="center_bg" ><table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
       
       <? if(!eregi("members_area.php",$_SERVER['PHP_SELF'])){?>
        <td width="233" align="left" valign="top">
        
        
        <table width="220" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
            <?=$category_box_header;?>
            </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="leftcenter_bg">
            <table width="214" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="26" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top">
                 <div id="exp1102170166">
				<?=$category_box_content;?>
                </div>
                <div align="center"><a href="rss_feed.php"><img src="themes/<?=$setts['default_theme'];?>/img/system/rss.gif" border="0" alt="" align="absmiddle"></a></div><br />
                <? if ($setts['enable_skin_change']) { ?>
				<form action="index.php" method="GET">
					<div align="center">
						<?=MSG_CHOOSE_SKIN;?>:<br>
						<?=$site_skins_dropdown;?>
						<input type="submit" name="change_skin" value="<?=GMSG_GO;?>">
					</div>   				
				</form>
                <br />
				<? } ?>   
                <?=$banner_position[1];?>
                <?=$banner_position[2];?>
            
                </td>
              </tr>
               <? if ($member_active != 'Active') { ?>
              <tr>
                <td align="left" valign="top"><table width="203" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="94" align="left" valign="top" >
                    
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                   
                     
                      <tr>
                        <td align="center" valign="top">
<div><a href="<?=process_link('register');?>"><img src="themes/<?=$setts['default_theme'];?>/img/newuser.jpg" width="170" height="99" border="0"></a></div>
<div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="5"></div>
</td></tr>
                   
                    </table>
                    
                       
                    </td>
                  </tr>
                </table></td>
              </tr>
              <? } ?>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top">
                
                
                <table width="214" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top">
                    <? if ($is_news && $layout['d_news_box']) { ?>
					<?=$news_box_header;?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="left_catebg">
                    
                    
<?=$news_box_content;?>
<? } ?>

                    
                   
                    
                                         
                      </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              
              
              
              
              
              <? if ($setts['enable_header_counter'] && eregi('index.php', $_SERVER['PHP_SELF'])) { ?>
              <tr>
                <td align="left" valign="top"><span class="style1"></span>
                  <table width="214" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#6E8FA3">
                        <tr>
                          <td width="5%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/blue_leftbar.gif" width="9" height="32" /></td>
                            <td width="91%" align="left" valign="middle" class="left_heading"><?=MSG_SITE_STATUS;?></td>
                            <td width="4%" align="right" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/blue_rightbar.gif" width="9" height="32" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="left_catebg">
                        <table width="100%" border="0" cellspacing="4" cellpadding="0">
                          <tr>
                            <td width="69%" align="left" valign="top"><?=MSG_REGISTERED_USERS;?></td>
                            <td width="31%" align="right" valign="top"><?=$nb_site_users;?></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><?=MSG_LIVE_AUCTIONS;?></td>
                            <td align="right" valign="top"><?=$nb_live_auctions;?></td>
                          </tr>
                          <? if ($setts['enable_wanted_ads']) { ?>
                          <tr>
                            <td align="left" valign="top"><?=MSG_LIVE_WANT_ADS;?></td>
                            <td align="right" valign="top"><?=$nb_live_wanted_ads;?></td>
                          </tr>
                          <? }?>
                          <tr>
                            <td align="left" valign="top"><?=MSG_ONLINE_USERS;?></td>
                            <td align="right" valign="top"><?=$nb_online_users;?></td>
                          </tr>
                          </table>
                        <p>&nbsp;</p></td>
                    </tr>
                  </table></td>
              </tr>
                         <div><img src='themes/<?=$setts['default_theme'];?>/img/pixel.gif' width='1' height='5'></div>
<? } ?>  
            </table></td>
          </tr>  
          <tr>
            <td align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/left_dwnround.gif" width="220" height="7" /></td>
          </tr>
        </table>
        <? }?>
        </td>
        <td width="<?=((eregi("members_area.php",$_SERVER['PHP_SELF']))?'100%':'707');?>"  valign="top">
