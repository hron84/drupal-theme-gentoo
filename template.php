<?php
// $Id: template.php,v 1.16.2.3 2010/05/11 09:41:22 goba Exp $

/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right) {
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else {
    if ($left != '') {
      $class = 'sidebar-left';
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
  }
}

/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_page(&$vars) {
  $vars['tabs2'] = menu_secondary_local_tasks();

  // remove sticky table headers
  $js = drupal_add_js();
  unset($js['module']['misc/tableheader.js']);
  $vars['scripts'] = drupal_get_js('header', $js);
}

/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function gentoo_preprocess_comment_wrapper(&$vars) {
  if ($vars['content'] && $vars['node']->type != 'forum') {
    $vars['content'] = '<h2 class="comments">'. t('Comments') .'</h2>'.  $vars['content'];
  }
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  return menu_primary_local_tasks();
}

/**
 * Returns the themed submitted-by string for the comment.
 */
function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

/**
 * Returns the themed submitted-by string for the node.
 */
function phptemplate_node_submitted($node) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}

/**
 * Generates IE CSS links for LTR and RTL languages.
 */
function phptemplate_get_ie_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />';
  if ($language->direction == LANGUAGE_RTL) {
    $iecss .= '<style type="text/css" media="all">@import "'. base_path() . path_to_theme() .'/fix-ie-rtl.css";</style>';
  }

  return $iecss;
}

function gentoo_theme() {
  return array(
    'playgroup_node_form' => array(
      'arguments' => array('form' => NULL),
      'template' => 'playgroup-node-form',
    ),
  );
}

function gentoo_preprocess_page() {
  $title = variable_get('site_name', 'Drupal') .' '. t('RSS');
  $feed_url = url('rss.xml', array('absolute' => TRUE));
  drupal_add_feed($feed_url, $title);
  $vars['head'] = drupal_get_html_head();
  $image = theme('image', path_to_theme() . '/images/rss.png', t('Syndicate content'), $title) ;
  $vars['feed_icons'] = '<a href="/rss.xml" class="feed-icon">' . $image . '</a>' ;
}
function gentoo_preprocess_block(&$vars) {
  $block = $vars['block'];
  if ($vars['logged_in'] && $block->module == 'user' && $block->delta == 1 && function_exists('profile_load_profile')) {
    global $user;
    profile_load_profile($user);
    if (!empty($user->profile_full_name)) {
      $block->subject = check_plain($user->profile_full_name);
    }
  }
}
# vim: ts=2 sw=2 et
