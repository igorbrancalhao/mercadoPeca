<?
#################################################################
## PHP Pro Bid v6.06															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }

?>
</td>
 </tr>
	</table>

  <tr>
    <td  valign="top" align="center"><img src="themes/<?=$setts['default_theme'];?>/images/dwn_img.gif" width="982" height="22" /></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="982" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="3%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/foot_leftround.gif" width="32" height="48" /></td>
        <td width="94%" align="left" valign="middle" background="themes/<?=$setts['default_theme'];?>/images/foot_bg.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="22%" align="left" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/logo_footer.gif" width="173" height="40" /></td>
            <td width="78%" align="left" valign="middle" class="foot"><a href="<?=$index_link;?>"><?=MSG_BTN_HOME;?></a>
				<? if (!$setts['enable_private_site'] || $is_seller) { ?>
				| <a href="<?=$place_ad_link;?>"><?=$place_ad_btn_msg;?></a>
				<? } ?>
				| <a href="<?=$register_link;?>"><?=$register_btn_msg;?></a>
				| <a href="<?=$login_link;?>"><?=$login_btn_msg;?></a>
				| <a href="<?=process_link('content_pages', array('page' => 'help'));?>"><?=MSG_BTN_HELP;?></a>
				| <a href="<?=process_link('content_pages', array('page' => 'faq'));?>"><?=MSG_BTN_FAQ;?></a>
            | <a href="<?=process_link('site_fees');?>"><?=MSG_BTN_SITE_FEES;?></a>
            <? if ($layout['is_about']) { ?>
            | <a href="<?=process_link('content_pages', array('page' => 'about_us'));?>"><?=MSG_BTN_ABOUT_US;?></a>
            <? } ?>
            <? if ($layout['is_contact']) { ?>
            | <a href="<?=process_link('content_pages', array('page' => 'contact_us'));?>"><?=MSG_BTN_CONTACT_US;?></a>
            <? } ?>
            <?=$custom_pages_links;?><br />
              Copyright &copy;2009 <b><a href="http://www.phpprobid.com/" target="_blank">PHP Pro Software LTD</a></b>. 
	All Rights Reserved. Designated trademarks and brands are the property of their respective owners.<br>
   Use of this Web site constitutes acceptance of the <b>
   <?=$setts['sitename'];?>
   </b>
   <? if ($layout['is_terms']) { ?>
   <a href="<?=process_link('content_pages', array('page' => 'terms'));?>"><?=MSG_BTN_TERMS;?></a>
   <? } ?>
   <? if ($layout['is_pp']) { ?> 
   and <a href="<?=process_link('content_pages', array('page' => 'privacy'));?>"><?=MSG_BTN_PRIVACY;?></a>
   <? } ?>         
</td>
          </tr>
        </table></td>
        <td width="3%" align="right" valign="top"><img src="themes/<?=$setts['default_theme'];?>/images/foot_rightround.gif" width="30" height="48" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle"><?=GMSG_PAGE_LOADED_IN;?> <?=$time_passed;?> <?=GMSG_SECONDS;?><br />   <?=$banner_header_content;?></td>
  </tr>
</table>
</body>
<?=$setts['ga_code'];?>
</html>