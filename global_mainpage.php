<?
#################################################################
## PHP Pro Bid v6.01															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ($layout['hpfeat_nb'])## PHP Pro Bid v6.00 home page featured auctions
{
	$featured_auctions_header = header1(MSG_FEATURED_AUCTIONS . ' [ <span class="sell"><a href="' . process_link('auctions_show', array('option' => 'featured')) . '">' . MSG_VIEW_ALL . '</a></span> ]');
	$template->set('featured_auctions_header', $featured_auctions_header);

	$select_condition = "WHERE
		hpfeat=1 AND active=1 AND approved=1 AND closed=0 AND creation_in_progress=0 AND deleted=0 AND
		list_in!='store'";## PHP Pro Bid v6.00 should use 'hpfeat' as index key

	$template->set('featured_columns', min((floor($db->count_rows('auctions', $select_condition)/$layout['hpfeat_nb']) + 1), ceil($layout['hpfeat_max']/$layout['hpfeat_nb'])));

	$template->set('feat_fees', $fees);
	$template->set('feat_db', $db);## PHP Pro Bid v6.00 the design is handled in the mainpage.tpl.php file to allow liberty on skins design
	//$table_rows = $db->count_rows('auctions', $select_condition);
	//$total_rows = ($table_rows > $layout['hpfeat_max']) ? $layout['hpfeat_max'] : $table_rows;

	$item_details = $db->random_rows('auctions', 'auction_id, name, start_price, max_bid, currency, end_time', $select_condition, $layout['hpfeat_max']);
	$template->set('item_details', $item_details);
}

if ($layout['nb_recent_auct'])
{
	$recent_auctions_header = header2(MSG_RECENTLY_LISTED_AUCTIONS . ' [ <span class="sell"><a href="' . process_link('auctions_show', array('option' => 'recent')) . '">' . MSG_VIEW_ALL . '</a></span> ]');
	$template->set('recent_auctions_header', $recent_auctions_header);

	$sql_select_recent_items = $db->query("SELECT auction_id, start_time, start_price, currency, name,
		bold, hl, buyout_price, is_offer, reserve_price, max_bid, nb_bids, owner_id FROM " . DB_PREFIX . "auctions
		FORCE INDEX (auctions_start_time) WHERE
		closed=0 AND active=1 AND approved=1 AND deleted=0 AND creation_in_progress=0 AND
		list_in!='store' ORDER BY start_time DESC LIMIT 0," . $layout['nb_recent_auct']);

	$template->set('sql_select_recent_items', $sql_select_recent_items);
}

if ($layout['nb_popular_auct'])
{
	$popular_auctions_header = header3(MSG_POPULAR_AUCTIONS . ' [ <span class="sell"><a href="' . process_link('auctions_show', array('option' => 'popular')) . '">' . MSG_VIEW_ALL . '</a></span> ]');
	$template->set('popular_auctions_header', $popular_auctions_header);

	$sql_select_popular_items = $db->query("SELECT auction_id, max_bid, currency, name, bold, hl,
		buyout_price, is_offer, reserve_price, nb_bids, owner_id FROM " . DB_PREFIX . "auctions
		FORCE INDEX (auctions_max_bid) WHERE
		closed=0 AND active=1 AND approved=1 AND deleted=0 AND creation_in_progress=0 AND
		list_in!='store' AND nb_bids>0 ORDER BY max_bid DESC LIMIT 0," . $layout['nb_popular_auct']);

	$template->set('sql_select_popular_items', $sql_select_popular_items);
	
	$is_popular_items = $db->num_rows($sql_select_popular_items);
	$template->set('is_popular_items', $is_popular_items);
}

if ($layout['nb_ending_auct'])
{
	$ending_auctions_header = header4(MSG_ENDING_SOON_AUCTIONS . ' [ <span class="sell"><a href="' . process_link('auctions_show', array('option' => 'ending')) . '">' . MSG_VIEW_ALL . '</a></span> ]');
	$template->set('ending_auctions_header', $ending_auctions_header);

	 $sql_select_ending_items = $db->query("SELECT auction_id, max_bid, end_time, currency, name, bold,
		hl, buyout_price, is_offer, reserve_price, nb_bids, owner_id FROM " . DB_PREFIX . "auctions
		FORCE INDEX (auctions_end_time) WHERE
		closed=0 AND active=1 AND approved=1 AND deleted=0 AND creation_in_progress=0 AND
		list_in!='store' ORDER BY end_time ASC LIMIT 0," . $layout['nb_ending_auct']);

	$template->set('sql_select_ending_items', $sql_select_ending_items);
}

if ($layout['nb_want_ads'])
{
	$recent_wa_header = header4(MSG_RECENTLY_LISTED_WANTED_ADS . ' [ <span class="sell"><a href="' . process_link('wanted_ads') . '">' . MSG_VIEW_ALL . '</a></span> ]');
	$template->set('recent_wa_header', $recent_wa_header);

	$sql_select_recent_wa = $db->query("SELECT wanted_ad_id, start_time, name FROM " . DB_PREFIX . "wanted_ads
		FORCE INDEX (wa_mainpage) WHERE
		closed=0 AND active=1 AND deleted=0 AND creation_in_progress=0 ORDER BY 
		start_time DESC LIMIT 0," . $layout['nb_want_ads']);

	$template->set('sql_select_recent_wa', $sql_select_recent_wa);
}

$template->change_path('themes/' . $setts['default_theme'] . '/templates/');

$template_output .= $template->process('mainpage.tpl.php');

$template->change_path('templates/');
?>