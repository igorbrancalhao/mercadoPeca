<? 
#################################################################
## PHP Pro Bid v6.04															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

session_start();

define ('IN_SITE', 1);

include_once ('includes/global.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?=MSG_BULK_SCHEMA;?></title>
<link href="<? echo (IN_ADMIN == 1) ? '' : 'themes/' . $setts['default_theme'] . '/'; ?>style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
	<tr class="c4"> 
		<td width="100%"><b><?=MSG_CATEGORY_IDS;?></b></td> 
	</tr> 
	<tr> 
		<td width="100%"><?=MSG_BULK_NOTE;?></td> 
	</tr> 
	<tr align="center"> 
		<td width="100%"> 
			<table width="100%" cellspacing="1" border="0" cellpadding="2" class="contentfont"> 
				<tr class="c3"> 
					<td width="25%" align="center"><b><?=MSG_CATEGORY_ID;?></b></td> 
          		<td><b><?=MSG_CATEGORY_NAME;?></b></td> 
				</tr> 
				<?
				reset($categories_array);
			
				foreach ($categories_array as $key => $value)
				{
					list($category_name, $user_id) = $value;
			
					if ($user_id == 0 || $user_id = $session->value('user_id'))	{ ?>
				<tr valign="top" class="c1"> 
					<td align="center"><?=$key;?></td> 
					<td><?=$category_name;?></td>
				</tr> 
					<? } ?>
				<? } ?>
      	</table></td> 
	</tr> 
	<tr align="center"> 
		<td width="100%"><a href="Javascript:window.close()"><?=GMSG_CLOSE;?></a></td> 
  	</tr> 
</table> 
</body>
</html>
