<?
#################################################################
## PHP Pro Bid v6.00										   ##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.  ##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>

 <table width="100%" border="0" cellspacing="4" cellpadding="0">
 <?	while ($news_details = $db->fetch_array($sql_select_news)) { ?>
                      <tr>
                        <td align="left" valign="top"><p><strong>&bull; <?=show_date($news_details['reg_date'], false);?></p></strong><a href="<?=process_link('content_pages', array('page' => 'news', 'topic_id' => $news_details['topic_id']));?>"><?=$news_details['topic_name'];?></a></td>
                      </tr>
                      <? }?>
                      <tr>
                        <td align="right" valign="top" class="forgot"><a href="<?=process_link('content_pages', array('page' => 'news'));?>" class="forgotlink"><u><?=MSG_VIEW_ALL;?></u></a>  &raquo;</td>
                      </tr>
                    </table> 