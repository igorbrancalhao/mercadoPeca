<?

#################################################################
## PHP Pro Bid v6.00															##
##-------------------------------------------------------------##
## Copyright �2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if (!defined('INCLUDED')) {
    die("Access Denied");
}

$can_view = true;

if ($session->value('adminlevel') > 1) {
    $can_view = ((preg_match('/list_site_users.php/i', $_SERVER['PHP_SELF'])) || preg_match('/list_auctions.php/i', $_SERVER['PHP_SELF']) ||
            preg_match("/email_user.php/i", $_SERVER['PHP_SELF']) ||
            preg_match("/list_user_bids.php/i", $_SERVER['PHP_SELF']) ||
            preg_match("/accounting.php/i", $_SERVER['PHP_SELF']) ||
            preg_match("/index.php/i", $_SERVER['PHP_SELF'])) ? true : false;
}

if ($session->value('category_language') == 1) {
    $updated_categories_message = '<table width="100%" bgcolor="red"><tr> ' .
            '<td align="center"><font size="+2" color="#ffffff">' . AMSG_CAT_CHANGE_EXPL_MSG . '</font></td></tr></table> ';
    $template->set('updated_categories_message', $updated_categories_message);
}

if (!$can_view && !$msg_shown) {
    header_redirect('index.php?viewmsg=1');
}

if (preg_match('/index.php/i', $_SERVER['PHP_SELF'])) {
    include_once ('status.php');
    $template->set('admin_left_menu', $status_template_output);
} else {
    $leftmenu_template_output = $template->process('leftmenu.tpl.php');
    $template->set('admin_left_menu', $leftmenu_template_output);
}

$template_output .= $template->process('header.tpl.php');
?>