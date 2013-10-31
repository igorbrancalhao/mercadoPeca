<?php
#################################################################
## PHP Pro Bid v6.04															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
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
<div class="mainhead"><img src="images/general.gif" align="absmiddle"> <?=$header_section;?></div>
<?=$msg_changes_saved;?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
   	<td width="4"><img src="images/c1.gif" width="4" height="4"></td>
   	<td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
   	<td width="4"><img src="images/c2.gif" width="4" height="4"></td>
   </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
   <form name="form_site_setup" method="post" action="site_setup.php" enctype="multipart/form-data">
      <input type="hidden" name="box_submit" value="0" >
	   <input type="hidden" name="file_upload_type" value="" >
	   <input type="hidden" name="file_upload_id" value="" >
	   <?=$media_upload_fields;?>
      <tr class="c3">
         <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?=strtoupper($subpage_title);?></b></td>
      </tr>
		<tr class="c1">
         <td width="150" align="right"><b><?=AMSG_SITE_NAME;?></b></td>
         <td><input name="sitename" type="text" id="sitename" value="<?=$setts_tmp['sitename'];?>" size="50"></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_SITE_NAME_EXPL;?></td>
      </tr>
      <tr class="c1">
         <td align="right"><b><?=AMSG_SITE_URL;?></b></td>
         <td><input name="site_path" type="text" id="site_path" value="<?=$setts_tmp['site_path'];?>" size="50"></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_SITE_URL_EXPL;?></td>
      </tr>
      <tr class="c1">
         <td align="right"><b><?=AMSG_ADMIN_EMAIL;?></b></td>
         <td><input name="admin_email" type="text" id="admin_email" value="<?=$setts_tmp['admin_email'];?>" size="50"></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_ADMIN_EMAIL_EXPL;?></td>
      </tr>
      <tr class="c1">
         <td align="right"><b><?=AMSG_CHOOSE_MAILER;?></b></td>
         <td><select name="mailer">
               <option value="mail" <? echo ($setts_tmp['mailer']=='mail') ? 'selected' : ''; ?>>mail</option>
               <option value="sendmail" <? echo ($setts_tmp['mailer']=='sendmail') ? 'selected' : ''; ?>>sendmail</option>
            </select></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_MAILER_EXPL;?></td>
      </tr>
      <tr class="c1">
         <td align="right"><b><?=AMSG_SENDMAIL_PATH;?></b></td>
         <td><input name="sendmail_path" type="text" id="sendmail_path" value="<?=$setts_tmp['sendmail_path'];?>" size="50"></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_SENDMAIL_PATH_EXPL;?></td>
      </tr>
      <tr class="c1">
         <td align="right"><b><?=AMSG_CHOOSE_SITE_SKIN;?></b></td>
         <td><?=$site_skins_dropdown;?> &nbsp;
            [ <?=AMSG_CURRENT_SKIN;?> :
            <b><?=$setts_tmp['default_theme'];?></b> ]</td>
      </tr>
      <tr class="c1">
         <td></td>
         <td><input type="checkbox" name="enable_hpfeat_desc" value="1" <? echo ($setts_tmp['enable_hpfeat_desc']==1)?"checked":""; ?>>
            <?=AMSG_HPFEAT_DESC_EXPL;?></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_CHOOSE_SITE_SKIN_EXPL;?></td>
      </tr>
      <tr class="c1">
         <td align="right"><b><?=AMSG_CHOOSE_SITE_LOGO;?></b></td>
         <td><?=$image_upload_manager;?></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_CHOOSE_SITE_LOGO_EXPL;?></td>
      </tr>
      <tr class="c1">
         <td align="right"><b><?=AMSG_CHOOSE_DEFAULT_LANG;?></b></td>
         <td><?=$languages_dropdown; ?> &nbsp;
            [ <?=AMSG_CURRENT_LANG;?> :
            <b><?=$setts_tmp['site_lang'];?></b> ]</td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_CHOOSE_DEFAULT_LANG_EXPL;?></td>
      </tr>
      <tr class="c1">
         <td align="right"><b><?=AMSG_MAINTENANCE_MODE;?></b></td>
         <td><input type="radio" name="maintenance_mode" value="1" checked>
            <?=GMSG_YES;?>
            <input type="radio" name="maintenance_mode" value="0" <? echo ($setts_tmp['maintenance_mode']==0) ? 'checked' : ''; ?>>
            <?=GMSG_NO;?></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?=AMSG_MAINTENANCE_MODE_EXPL;?></td>
      </tr>
      <tr align="center">
         <td colspan="2" valign="top"><input type="submit" name="form_save_settings" value="<?=AMSG_SAVE_CHANGES;?>"></td>
      </tr>
   </form>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
   <tr>
      <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
      <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
      <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
   </tr>
</table>