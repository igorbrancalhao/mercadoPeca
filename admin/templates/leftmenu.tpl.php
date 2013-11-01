<? 
#################################################################
## PHP Pro Bid v6.04															##
##-------------------------------------------------------------##
## Copyright ©2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); } 
?>

<script language="javascript">
	var ie4 = false;
	if(document.all) { ie4 = true; }

	function getObject(id) { if (ie4) { return document.all[id]; } else { return document.getElementById(id); } }
	function toggle(link, divId) {
		var lText = link.innerHTML;
		var d = getObject(divId);
		if (lText == 'show') { link.innerHTML = 'hide'; d.style.display = 'block'; }
		else { link.innerHTML = 'show'; d.style.display = 'none'; }
	}
</script>				
				
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="4"><img src="images/c1.gif" width="4" height="4"></td>
		<td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
		<td width="4"><img src="images/c2.gif" width="4" height="4"></td>
	</tr>
</table>
<table width="220" border="0" cellpadding="0" cellspacing="0" class="fside">
	<tr>
		<td colspan="2" class="atitle"><a href="site_setup.php"><?=AMSG_SITE_SETUP;?></a></td>
	</tr>
	<tr>
		<td class="atitle" width="170"><?=AMSG_GEN_SETTS;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp1_link" href="javascript: void(0);" onclick="toggle(this, 'exp1')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp1" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
               <div class="alink"><a href="general_settings.php?page=signup_settings"><?=AMSG_USER_SIGNUP_SETTS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=closed_auctions_deletion"><?=AMSG_CLOSED_AUCT_DEL;?></a></div>
               <div class="alink"><a href="general_settings.php?page=hpfeat_items"><?=AMSG_HPFEAT_ITEMS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=catfeat_items"><?=AMSG_CATFEAT_ITEMS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=recently_listed_auctions"><?=AMSG_RECENT_AUCTIONS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=popular_auctions"><?=AMSG_POPULAR_AUCTIONS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=ending_soon_auctions"><?=AMSG_ENDING_SOON_AUCTIONS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=auction_images"><?=AMSG_AUCTION_IMAGES_SETTS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=currency_setts"><?=AMSG_CURRENCY_SETTS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=time_date_setts"><?=AMSG_TIME_DATE_SETTS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=ssl_support"><?=AMSG_SETUP_SSL_SUPPORT;?></a></div>
               <div class="alink"><a href="general_settings.php?page=meta_tags"><?=AMSG_META_TAGS_SETTS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=cron_jobs"><?=AMSG_CRON_JOBS_SETTS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=min_reg_age"><?=AMSG_MIN_REG_AGE_SETTS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=recent_wanted_ads"><?=AMSG_RECENT_WANTED_ADS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=auction_media"><?=AMSG_MEDIA_UPLOAD_SETTS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=buy_out_method"><?=AMSG_SEL_BUY_OUT_METHOD;?></a></div>
               <div class="alink"><a href="general_settings.php?page=sellitem_buttons"><?=AMSG_SELLING_PROCESS_NAV_BTNS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=nb_autorelists"><?=AMSG_AUTO_RELIST_SETTINGS;?></a></div>
               <div class="alink"><a href="general_settings.php?page=invoices_settings"><?=AMSG_INVOICES_SETTINGS;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				$_REQUEST['page']=='signup_settings' ||
				$_REQUEST['page']=='closed_auctions_deletion' || 
				$_REQUEST['page']=='hpfeat_items' || 
				$_REQUEST['page']=='catfeat_items' || 
				$_REQUEST['page']=='recently_listed_auctions' || 
				$_REQUEST['page']=='popular_auctions' || 
				$_REQUEST['page']=='ending_soon_auctions' || 
				$_REQUEST['page']=='auction_images' || 
				$_REQUEST['page']=='currency_setts' || 
				$_REQUEST['page']=='time_date_setts' || 
				$_REQUEST['page']=='ssl_support' || 
				$_REQUEST['page']=='meta_tags' || 
				$_REQUEST['page']=='cron_jobs' || 
				$_REQUEST['page']=='min_reg_age' || 
				$_REQUEST['page']=='recent_wanted_ads' || 
				$_REQUEST['page']=='auction_media' || 
				$_REQUEST['page']=='buy_out_method' || 
				$_REQUEST['page']=='sellitem_buttons' || 
				$_REQUEST['page']=='nb_autorelists' || 
				$_REQUEST['page']=='invoices_settings' ) { } 
			else {?>
				<script language="javascript">toggle(getObject('exp1_link'), 'exp1');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_ENABLE_DISABLE;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp2_link" href="javascript: void(0);" onclick="toggle(this, 'exp2')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
         <div id="exp2" style="padding: 5px;">
            <div><img src="images/subtop.gif" width="208" height="4"></div>
            <div class="fsidew">
               <div class="alink"><a href="enable_disable.php?page=shipping_costs"><?=AMSG_SHIPPING_COSTS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=hp_login_box"><?=AMSG_HP_LOGIN_BOX;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=hp_news_box"><?=AMSG_HP_NEWS_BOX;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=buy_out_method"><?=AMSG_BUY_OUT_METHOD;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=registration_terms"><?=AMSG_REGISTRATION_TERMS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=sellitem_terms"><?=AMSG_SELLITEM_TERMS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=swapping"><?=AMSG_SWAPPING;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=hp_counter"><?=AMSG_HP_COUNTER;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=addl_category_listing"><?=AMSG_ADDL_CATEGORY_LISTING;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=user_languages"><?=AMSG_USER_LANGUAGES;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=auction_sniping"><?=AMSG_AUCTION_SNIPING;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=private_site"><?=AMSG_PRIVATE_SITE;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=preferred_sellers"><?=AMSG_PREFERRED_SELLERS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=bcc_emails"><?=AMSG_BCC_EMAILS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=seller_questions"><?=AMSG_SELLER_QUESTIONS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=wanted_ads"><?=AMSG_WANTED_ADS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=bid_retraction"><?=AMSG_BID_RETRACTION;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=seller_other_items"><?=AMSG_SELLER_OTHER_ITEMS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=bulk_lister"><?=AMSG_BULK_LISTER;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=category_counters"><?=AMSG_CATEGORY_COUNTERS;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=phone_nb_sale"><?=AMSG_PHONE_NB_SALE;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=mod_rewrite"><?=AMSG_MOD_REWRITE;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=auction_approval"><?=AMSG_ENABLE_AUCT_APPROVAL;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=change_duration"><?=AMSG_CHG_DURATION_ON_BID_PLACED;?></a></div>		
               <div class="alink"><a href="enable_disable.php?page=seller_verification"><?=AMSG_ENABLE_SELLER_VERIFICATION;?></a></div>					<div class="alink"><a href="enable_disable.php?page=profile_page"><?=AMSG_ENABLE_PROFILE_PAGE;?></a></div>			
               <div class="alink"><a href="enable_disable.php?page=store_only_mode"><?=AMSG_ENABLE_STORE_ONLY_MODE;?></a></div>
               <div class="alink"><a href="enable_disable.php?page=skin_change"><?=AMSG_ENABLE_SKIN_CHANGE;?></a></div>			
               <div class="alink"><a href="enable_disable.php?page=second_chance"><?=AMSG_ENABLE_SECOND_CHANCE;?></a></div>
				</div>
            <div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				$_REQUEST['page']=='shipping_costs' ||
				$_REQUEST['page']=='hp_login_box' ||
				$_REQUEST['page']=='hp_news_box' ||
				$_REQUEST['page']=='buy_out_method' ||
				$_REQUEST['page']=='registration_terms' ||
				$_REQUEST['page']=='sellitem_terms' ||
				$_REQUEST['page']=='swapping' ||
				$_REQUEST['page']=='hp_counter' ||
				$_REQUEST['page']=='addl_category_listing' ||
				$_REQUEST['page']=='user_languages' ||
				$_REQUEST['page']=='auction_sniping' ||
				$_REQUEST['page']=='private_site' ||
				$_REQUEST['page']=='preferred_sellers' ||
				$_REQUEST['page']=='bcc_emails' ||
				$_REQUEST['page']=='seller_questions' ||
				$_REQUEST['page']=='wanted_ads' ||
				$_REQUEST['page']=='bid_retraction' ||
				$_REQUEST['page']=='seller_other_items' ||
				$_REQUEST['page']=='bulk_lister' ||
				$_REQUEST['page']=='category_counters' ||
				$_REQUEST['page']=='phone_nb_sale' ||
				$_REQUEST['page']=='mod_rewrite' ||
				$_REQUEST['page']=='auction_approval' ||
				$_REQUEST['page']=='change_duration' ||
				$_REQUEST['page']=='seller_verification' ||
				$_REQUEST['page']=='profile_page' ||
				$_REQUEST['page']=='store_only_mode' ||
				$_REQUEST['page']=='skin_change' ||
				$_REQUEST['page']=='second_chance' ) { }
			else { ?>
				<script language="javascript">toggle(getObject('exp2_link'), 'exp2');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_TABLES_MANAGEMENT;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp3_link" href="javascript: void(0);" onclick="toggle(this, 'exp3')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp3" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="table_countries.php"><?=AMSG_EDIT_COUNTRIES;?></a></div>
					<div class="alink"><a href="table_item_durations.php"><?=AMSG_EDIT_ITEM_DURATIONS;?></a></div>
					<div class="alink"><a href="table_payment_options.php"><?=AMSG_EDIT_PAYMENT_OPTIONS;?></a></div>
					<div class="alink"><a href="table_shipping_options.php"><?=AMSG_EDIT_SHIPPING_OPTIONS;?></a></div>
					<div class="alink"><a href="table_bid_increments.php"><?=AMSG_EDIT_BID_INCREMENTS;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
	
			<? if (
				preg_match("/table_countries.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/table_item_durations.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/table_payment_options.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/table_shipping_options.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/table_bid_increments.php/i",$_SERVER['PHP_SELF'])) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp3_link'), 'exp3');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_SITE_CONTENT;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp4_link" href="javascript: void(0);" onclick="toggle(this, 'exp4')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp4" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="vouchers_management.php"><?=AMSG_VOUCHERS_MANAGEMENT;?></a></div>
					<div class="alink"><a href="content_section.php?page=help"><?=AMSG_EDIT_HELP_SECTION;?></a></div>
					<div class="alink"><a href="content_section.php?page=news"><?=AMSG_EDIT_NEWS_SECTION;?></a></div>
					<div class="alink"><a href="content_section.php?page=faq"><?=AMSG_EDIT_FAQ_SECTION;?></a></div>
					<div class="alink"><a href="content_pages.php?page=about_us"><?=AMSG_EDIT_ABOUT_US_PAGE;?></a></div>
					<div class="alink"><a href="content_pages.php?page=contact_us"><?=AMSG_EDIT_CONTACT_US_PAGE;?></a></div>
					<div class="alink"><a href="content_pages.php?page=terms"><?=AMSG_EDIT_TERMS_PAGE;?></a></div>
					<div class="alink"><a href="content_pages.php?page=privacy"><?=AMSG_EDIT_PRIVACY_PAGE;?></a></div>
					<div class="alink"><a href="content_section.php?page=custom_page"><?=AMSG_CUSTOM_PAGES_MANAGEMENT;?></a></div>
					<div class="alink"><a href="content_system_emails.php"><?=AMSG_EDIT_SYSTEM_EMAILS;?></a></div>
					<div class="alink"><a href="content_banners_management.php"><?=AMSG_SITE_BANNERS_MANAGEMENT;?></a></div>
					<div class="alink"><a href="content_language_files.php"><?=AMSG_EDIT_SITE_LANGUAGE_FILES;?></a></div>
					<div class="alink"><a href="content_section.php?page=announcements"><?=AMSG_EDIT_MEMBERS_ANNOUNCEMENTS;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/vouchers_management.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/content_section.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/content_pages.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/content_system_emails.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/content_banners_management.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/content_language_files.php/i",$_SERVER['PHP_SELF'])) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp4_link'), 'exp4');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_USERS_MANAGEMENT;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp5_link" href="javascript: void(0);" onclick="toggle(this, 'exp5')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp5" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="list_admin_users.php"><?=AMSG_ADMIN_USERS;?></a></div>
					<div class="alink"><a href="list_site_users.php"><?=AMSG_USERS_MANAGEMENT;?></a></div>
					<div class="alink"><a href="custom_fields.php?page=register"><?=AMSG_CUSTOM_REG_FIELDS;?></a></div>
					<div class="alink"><a href="user_login.php"><?=AMSG_LOGIN_AS_SITE_USER;?></a></div>
					<div class="alink"><a href="list_users_reputations.php"><?=AMSG_USERS_REP_MANAGEMENT;?></a></div>
					<div class="alink"><a href="custom_fields.php?page=reputation_sale"><?=AMSG_CUSTOM_REP_FIELDS_MANAGEMENT_SALE;?></a></div>
					<div class="alink"><a href="custom_fields.php?page=reputation_purchase"><?=AMSG_CUSTOM_REP_FIELDS_MANAGEMENT_PURCHASE;?></a></div>
					<div class="alink"><a href="send_activation_emails.php"><?=AMSG_REG_ACTIVATION_EMAILS;?></a></div>
					<div class="alink"><a href="user_newsletter.php"><?=AMSG_SEND_NEWSLETTER;?></a></div>
					<div class="alink"><a href="abuse_reports.php"><?=AMSG_ABUSE_REPORTS;?></a></div>
					<div class="alink"><a href="ban_users.php"><?=AMSG_BAN_USERS;?></a></div>
					<div class="alink"><a href="blocked_users.php"><?=AMSG_BLOCKED_USERS;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/list_admin_users.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/list_user_bids.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/list_site_users.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/list_users_reputations.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/user_login.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/send_activation_emails.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/user_newsletter.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/abuse_reports.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/ban_users.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/blocked_users.php/i",$_SERVER['PHP_SELF']) || 
				$_REQUEST['page']=='register' ||
				$_REQUEST['page']=='reputation_sale' || 
				$_REQUEST['page']=='reputation_purchase' ) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp5_link'), 'exp5');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_AUCTIONS_MANAGEMENT;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp6_link" href="javascript: void(0);" onclick="toggle(this, 'exp6')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp6" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="list_auctions.php?status=open"><?=AMSG_OPEN_AUCTIONS;?></a></div>
					<div class="alink"><a href="list_auctions.php?status=closed"><?=AMSG_CLOSED_AUCTIONS;?></a></div>
					<div class="alink"><a href="list_auctions.php?status=unstarted"><?=AMSG_UNSTARTED_AUCTIONS;?></a></div>
					<div class="alink"><a href="list_auctions.php?status=suspended"><?=AMSG_SUSPENDED_AUCTIONS;?></a></div>
					<div class="alink"><a href="list_sold_items.php"><?=AMSG_SOLD_ITEMS;?></a></div>
					<div class="alink"><a href="list_auctions.php?status=approval"><?=AMSG_AUCTIONS_AWAITING_APPROVAL;?></a></div>
					<div class="alink"><a href="custom_fields.php?page=auction"><?=AMSG_CUSTOM_AUCT_FIELDS_MANAGEMENT;?></a></div>
					<div class="alink"><a href="list_wanted_ads.php"><?=AMSG_WANTED_ADS_MANAGEMENT;?></a></div>
					<div class="alink"><a href="custom_fields.php?page=wanted_ad"><?=AMSG_CUSTOM_WANTED_ADS_MANAGEMENT;?></a></div>
					<div class="alink"><a href="list_messaging.php"><?=AMSG_USER_MESSAGES_MANAGEMENT;?></a></div>
			     	<div class="alink"><a href="images_removal_tool.php"><?=AMSG_OLD_IMAGES_REMOVAL_TOOL;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/list_auctions.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/list_sold_items.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/list_wanted_ads.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/list_messaging.php/i",$_SERVER['PHP_SELF']) ||
				preg_match("/images_removal_tool.php/i",$_SERVER['PHP_SELF']) ||
				$_REQUEST['page']=='auction' ||
				$_REQUEST['page']=='wanted_ad' ) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp6_link'), 'exp6');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_STORES_MANAGEMENT;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp7_link" href="javascript: void(0);" onclick="toggle(this, 'exp7')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp7" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="enable_disable.php?page=enable_stores"><?=AMSG_ENABLE_STORES;?></a></div>
					<div class="alink"><a href="stores_subscriptions.php"><?=AMSG_STORE_SUBSCRIPTIONS_MANAGEMENT;?></a></div>
					<div class="alink"><a href="stores_management.php"><?=AMSG_STORES_MANAGEMENT;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/stores_subscriptions.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/stores_management.php/i",$_SERVER['PHP_SELF'])||
				$_REQUEST['page']=='enable_stores' ) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp7_link'), 'exp7');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_CUSTOM_FIELDS_SETUP;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp8_link" href="javascript: void(0);" onclick="toggle(this, 'exp8')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp8" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
	 				<div class="alink"><a href="custom_fields_types.php"><?=AMSG_SETUP_FIELD_TYPES;?></a></div>
	 			</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/custom_fields_types.php/i",$_SERVER['PHP_SELF'])) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp8_link'), 'exp8');</script>
			<? } ?>
		</td>
	</tr>		
	<tr>
		<td class="atitle"><?=AMSG_CATEGORIES;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp9_link" href="javascript: void(0);" onclick="toggle(this, 'exp9')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp9" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="table_categories.php"><?=AMSG_EDIT_CATEGORIES;?></a></div>
					<div class="alink"><a href="categories_lang.php"><?=AMSG_EDIT_CAT_LANG_FILES;?></a></div>
					<div class="alink"><a href="table_suggested_categories.php"><?=AMSG_VIEW_SUGGESTED_CATEGORIES;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/table_categories.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/categories_lang.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/table_suggested_categories.php/i",$_SERVER['PHP_SELF']) ) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp9_link'), 'exp9');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_FEES;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp10_link" href="javascript: void(0);" onclick="toggle(this, 'exp10')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp10" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="fees_settings.php"><?=AMSG_MAIN_SETTINGS;?></a></div>
					<div class="alink"><a href="fees_payment_gateways.php"><?=AMSG_SETUP_PAYMENT_GATEWAYS;?></a></div>
					<div class="alink"><a href="fees_management.php"><?=AMSG_FEES_MANAGEMENT;?></a></div>
					<div class="alink"><a href="table_currencies.php"><?=AMSG_CURRENCY_SETTINGS;?></a></div>
					<!-- <div class="alink"><a href="general_settings.php?page=mcrypt"><?=AMSG_MCRYPT_SETTINGS;?></a></div> -->
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/fees_settings.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/fees_payment_gateways.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/fees_management.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/table_currencies.php/i",$_SERVER['PHP_SELF'])||
				$_REQUEST['page']=='mcrypt' ) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp10_link'), 'exp10');</script>
			<? } ?>
		</td>
	</tr>
 <tr>
		<td class="atitle"><?=AMSG_ACCOUNTING;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp11_link" href="javascript: void(0);" onclick="toggle(this, 'exp11')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp11" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="accounting.php"><?=AMSG_OVERVIEW;?></a></div>
					<div class="alink"><a href="list_site_users.php?show=accounting_overdue"><?=AMSG_OVERDUE_CLIENTS;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/accounting.php/i",$_SERVER['PHP_SELF'])||
				$_REQUEST['show']=='accounting_overdue' ) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp11_link'), 'exp11');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_TAX_SETTINGS;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp12_link" href="javascript: void(0);" onclick="toggle(this, 'exp12')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp12" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="general_settings.php?page=enable_tax"><?=AMSG_ENABLE_TAX;?></a></div>
					<div class="alink"><a href="tax_settings.php"><?=AMSG_TAX_CONFIGURATION;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/tax_settings.php/i",$_SERVER['PHP_SELF'])||
				$_REQUEST['page']=='enable_tax' ) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp12_link'), 'exp12');</script>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td class="atitle"><?=AMSG_TOOLS;?></td><td align="center" class="sh" width="50"><a title="show/hide" class="hidelayer" id="exp13_link" href="javascript: void(0);" onclick="toggle(this, 'exp13')">hide</a></td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="exp13" style="padding: 5px;">
				<div><img src="images/subtop.gif" width="208" height="4"></div>
				<div class="fsidew">
					<div class="alink"><a href="word_filter.php"><?=AMSG_WORD_FILTER;?></a></div>
					<div class="alink"><a href="block_free_emails.php"><?=AMSG_BLOCK_FREE_EMAILS;?></a></div>
					<div class="alink"><a href="http://www.xe.com/ucc/" target="_blank"><?=AMSG_CURRENCY_CONVERTER;?></a></div>
				</div>
				<div><img src="images/subbottom.gif" width="208" height="4"></div>
			</div>
			<? if (
				preg_match("/word_filter.php/i",$_SERVER['PHP_SELF'])||
				preg_match("/block_free_emails.php/i",$_SERVER['PHP_SELF'])) { } 
			else { ?>
				<script language="javascript">toggle(getObject('exp13_link'), 'exp13');</script>
			<? } ?>
		</td>
	</tr>
</table>
	
<table width="100%" border="0" cellpadding="0" cellspacing="0">
 	<tr>
 		<td width="4"><img src="images/c3.gif" width="4" height="4"></td>
 		<td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
 		<td width="4"><img src="images/c4.gif" width="4" height="4"></td>
	</tr>
</table>