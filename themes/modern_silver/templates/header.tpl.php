<?
#################################################################
## PHP Pro Bid v6.04															##
##-------------------------------------------------------------##
## Copyright �2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?=$page_title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CODEPAGE;?>">
<?=$page_meta_tags;?>
<link href="themes/<?=$setts['default_theme'];?>/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.lb {
	background-image:  url(themes/<?=$setts['default_theme'];?>/img/lb_bg.gif);
}
.db {
	background-image:  url(themes/<?=$setts['default_theme'];?>/img/db_bg.gif);
}
-->
</style>
<script language="javascript" src="themes/<?=$setts['default_theme'];?>/main.js" type="text/javascript"></script>
<script language=JavaScript src='scripts/innovaeditor.js'></script>
<script type="text/javascript">
var currenttime = '<?=$current_time_display;?>';
var serverdate=new Date(currenttime);

function padlength(what){
	var output=(what.toString().length==1)? "0"+what : what;
	return output;
}

function displaytime(){
	serverdate.setSeconds(serverdate.getSeconds()+1)
	var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds());
	document.getElementById("servertime").innerHTML=timestring;
}

window.onload=function(){
	setInterval("displaytime()", 1000);
}

</script>
</head>
<body bgcolor="#ffffff" leftmargin="5" topmargin="5" marginwidth="5" marginheight="5">
	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
   <td width="100%"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom: 4px solid #0f3f79;">
         <tr valign="bottom">
            <td><a href="<?=$index_link;?>"><img src="images/probidlogo.gif?<?=rand(2,9999);?>" alt="Professional Auction Script Software by PHP Pro Bid" vspace="4" border="0"></a></td>
            <td width="100%" valign="bottom" style="padding-left: 30px;">
            	<div class="toplink" align="right" style="padding: 10px;"> 
            		
            		<a href="<?=$index_link;?>"><?=MSG_BTN_HOME;?></a> | 
                  &nbsp;<a href="<?=process_link('content_pages', array('page' => 'faq'));?>"><?=MSG_BTN_FAQ;?></a>
                  <? if ($layout['is_about']) { ?>
                  | <a href="<?=process_link('content_pages', array('page' => 'about_us'));?>"><?=MSG_BTN_ABOUT_US;?></a>
                  <? } ?>
                  <? if ($layout['is_contact']) { ?>
                  | <a href="<?=process_link('content_pages', array('page' => 'contact_us'));?>"><?=MSG_BTN_CONTACT_US;?></a>
                  <? } ?>
               </div>
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr height="31" align="center">
                     <? if (preg_match("index.php",$_SERVER['PHP_SELF'])) { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/db_s.gif" width="6" height="31"></td>
                     <td nowrap class="db mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=$index_link;?>"><?=MSG_BTN_HOME;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/db_e.gif" width="8" height="31"></td>
                     <? } else {?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/lb_s.gif" width="6" height="31"></td>
                     <td nowrap class="lb mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=$index_link;?>"><?=MSG_BTN_HOME;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/lb_e.gif" width="8" height="31"></td>
                     <? } 
						 if (!$setts['enable_private_site'] || $is_seller)  { 
								if (preg_match("sell_item.php",$_SERVER['PHP_SELF'])) { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/db_s.gif" width="6" height="31"></td>
                     <td nowrap class="db mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=$place_ad_link;?>"><?=$place_ad_btn_msg;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/db_e.gif" width="8" height="31"></td>
                     <? } else { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/lb_s.gif" width="6" height="31"></td>
                     <td nowrap class="lb mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=$place_ad_link;?>"><?=$place_ad_btn_msg;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/lb_e.gif" width="8" height="31"></td>
                     <? } 
							} 
            	 		if (preg_match("members_area.php",$_SERVER['PHP_SELF'])||preg_match("register.php",$_SERVER['PHP_SELF'])) { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/db_s.gif" width="6" height="31"></td>
                     <td nowrap class="db mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=$register_link;?>"><?=$register_btn_msg;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/db_e.gif" width="8" height="31"></td>
                     <? } else { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/lb_s.gif" width="6" height="31"></td>
                     <td nowrap class="lb mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=$register_link;?>"><?=$register_btn_msg;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/lb_e.gif" width="8" height="31"></td>
                     
                     <? } if (preg_match("login.php",$_SERVER['PHP_SELF'])) { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/db_s.gif" width="6" height="31"></td>
                     <td nowrap class="db mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=$login_link;?>"><?=$login_btn_msg;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/db_e.gif" width="8" height="31"></td>
                     <? } else { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/lb_s.gif" width="6" height="31"></td>
                     <td nowrap class="lb mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=$login_link;?>"><?=$login_btn_msg;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/lb_e.gif" width="8" height="31"></td>
                     <? }  if ($setts['enable_stores']) {
								if (preg_match("stores.php",$_SERVER['PHP_SELF'])) { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/db_s.gif" width="6" height="31"></td>
                     <td nowrap class="db mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=process_link('stores');?>"><?=MSG_BTN_STORES;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/db_e.gif" width="8" height="31"></td>
                     <? } else { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/lb_s.gif" width="6" height="31"></td>
                     <td nowrap class="lb mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=process_link('stores');?>"><?=MSG_BTN_STORES;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/lb_e.gif" width="8" height="31"></td>
                     <? } } 
							if ($setts['enable_wanted_ads']) { 
								if (preg_match("wanted_ads.php",$_SERVER['PHP_SELF'])) { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/db_s.gif" width="6" height="31"></td>
                     <td nowrap class="db mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=process_link('wanted_ads');?>"><?=MSG_BTN_WANTED_ADS;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/db_e.gif" width="8" height="31"></td>
                     <? } else { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/lb_s.gif" width="6" height="31"></td>
                     <td nowrap class="lb mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=process_link('wanted_ads');?>"><?=MSG_BTN_WANTED_ADS;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/lb_e.gif" width="8" height="31"></td>
                     <? }  
							} 
							if ($_REQUEST['page']=='help') { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/db_s.gif" width="6" height="31"></td>
                     <td nowrap class="db mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=process_link('content_pages', array('page' => 'help'));?>"><?=MSG_BTN_HELP;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/db_e.gif" width="8" height="31"></td>
                     <? } else { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/lb_s.gif" width="6" height="31"></td>
                     <td nowrap class="lb mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=process_link('content_pages', array('page' => 'help'));?>"><?=MSG_BTN_HELP;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/lb_e.gif" width="8" height="31"></td>
                     <? } 
             			if (preg_match("site_fees.php",$_SERVER['PHP_SELF'])) { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/db_s.gif" width="6" height="31"></td>
                     <td nowrap class="db mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=process_link('site_fees');?>"><?=MSG_BTN_SITE_FEES;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/db_e.gif" width="8" height="31"></td>
                     <? } else { ?>
                     <td width="6"><img src="themes/<?=$setts['default_theme'];?>/img/lb_s.gif" width="6" height="31"></td>
                     <td nowrap class="lb mainmenu" width="<?=$header_cell_width;?>">&nbsp;<a href="<?=process_link('site_fees');?>"><?=MSG_BTN_SITE_FEES;?></a>&nbsp;</td>
                     <td width="8"><img src="themes/<?=$setts['default_theme'];?>/img/lb_e.gif" width="8" height="31"></td>
                     <? } ?>
                  </tr>
               </table></td>
         </tr>
      </table>
      
      <table width="100%" height="29" border="0" cellpadding="0" cellspacing="0" bgcolor="#efefef" style="border: 1px solid #a6a6a6; border-top: 2px solid #a6a6a6;">
         <tr height="31">
            <td width="194" nowrap align="center" class="search">&nbsp;&nbsp;&nbsp;<?=$current_date;?> <span id="servertime"></span>&nbsp;&nbsp;&nbsp;</td>
            <form action="auction_search.php" method="post">
            <input type="hidden" name="option" value="basic_search">
               <td class="search" nowrap style="border-left: 1px solid #dddddd;">&nbsp;&nbsp;&nbsp;<a href="<?=process_link('search');?>"><?=strtoupper(GMSG_SEARCH);?></a>&nbsp;&nbsp;&nbsp;</td>
               <td class="search" nowrap><input type="text" size="25" name="basic_search">&nbsp;&nbsp;&nbsp;</td>
               <td class="search" nowrap><input name="form_basic_search" type="submit" value="<?=GMSG_SEARCH;?>">&nbsp;&nbsp;&nbsp;</td>
            </form>
            <td class="search" nowrap style="border-left: 1px solid #dddddd;">&nbsp;&nbsp;&nbsp;<?=strtoupper(GMSG_BROWSE);?>&nbsp;&nbsp;</td>
						<form name="cat_browse_form" method="get" action="categories.php">
            <td width="100%" class="search"><?=$categories_browse_box;?></td>
            </form>
            <? if ($setts['user_lang']) { ?>
            <td nowrap style="border-left: 1px solid #dddddd;" align="center">&nbsp;&nbsp;<?=$languages_list;?>&nbsp;&nbsp;</td>
            <? } ?>
         </tr>
      </table>
      <div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="10"></div>

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr valign="top">
         <td width="180"><script language="javascript">
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
				<? if ($is_announcements && $member_active == 'Active') { ?>
				<?=$announcements_box_header;?>
				<div id="exp1102170555">
					<?=$announcements_box_content;?>
				</div>
            <div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="5"></div>
				<? } ?>
            <?=$menu_box_header;?>
            <div id="exp1102170142">
            <?=$menu_box_content;?>
            </div>
            <div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="1" height="5"></div>
            <noscript>
            <?=MSG_JS_NOT_SUPPORTED;?>
            </noscript>
            <?=$category_box_header;?>
            <div id="exp1102170166">
            <?=$category_box_content;?>
            </div>
            <div><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="180" height="1"></div>
            
				<br>
				<div align="center"><a href="rss_feed.php"><img src="themes/<?=$setts['default_theme'];?>/img/system/rss.gif" border="0" alt="" align="absmiddle"></a></div>   

				<? if ($setts['enable_skin_change']) { ?>
				<br>
				<form action="index.php" method="GET">
					<div align="center">
						<?=MSG_CHOOSE_SKIN;?>:<br>
						<?=$site_skins_dropdown;?>
						<input type="submit" name="change_skin" value="<?=GMSG_GO;?>">
					</div>   				
				</form>
				<? } ?>
				
            </td>
            <td width="10"><img src="themes/<?=$setts['default_theme'];?>/img/pixel.gif" width="10" height="1"></td>
         <td width="100%">
