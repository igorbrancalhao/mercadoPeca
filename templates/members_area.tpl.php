<?
#################################################################
## PHP Pro Bid v6.05															##
##-------------------------------------------------------------##
## Copyright �2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>

<SCRIPT LANGUAGE="JavaScript"><!--
myPopup = '';

function openPopup(url) {
	myPopup = window.open(url,'popupWindow','width=350,height=250,status=yes');
   if (!myPopup.opener) myPopup.opener = self;
}
//-->
</SCRIPT>
<?=$members_area_header;?>
<?=$members_area_header_menu;?>
<br>
<?=$msg_store_cats_modified;?>
<table cellpadding="0" cellspacing="0" width="100%" border="0">
	<tr>
		<td valign="top"><?=$members_area_stats;?></td>
		<td align="right" valign="top"><?=$seller_verified_status_box;?></td>
	</tr>
</table>
<?=$msg_pending_gc_transactions;?>
<?=$msg_unpaid_endauction_fees;?>
<?=$msg_changes_saved;?>
<?=$msg_seller_error;?>
<?=$members_area_page_content;?>
