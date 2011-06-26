<?php


function gentoo_preprocess_node(&$vars) {
    $node = $vars['node'];
    if($node) {
        $terms = field_view_field('node', $node, 'field_tags');
        #$vars['taxonomy'] = isset($vars['terms']);
        $vars['taxonomy'] = isset($terms);
        #dpr($vars);
    }
    $_submitted = "";
    if($vars['name']) {
        $_submitted .= "<strong>" . t('Authored by') . ":</strong> " . $vars['name'] . ", ";
    }
    $_submitted .= "<strong>" . t('Authored on') . ":</strong> " . $vars['date'];
    $vars['submitted'] = $_submitted;
    #if(node_access('update', $node)) {
    #    $vars['content']['links']['node']['#links']['node-edit'] = array(
    #        'title' => t('Edit'),
    #        'href'  => 'node/' . $node->nid . '/edit',
    #        'attributes' => array('rel' => 'nofollow')
    #    );
    #};

    #if(node_access('delete', $node)) {
    #    $vars['content']['links']['node']['#links']['node-delete'] = array(
    #        'title' => drupal_ucfirst( t('delete') ),
    #        'href'  => 'node/' . $node->nid . '/delete',
    #        'attributes' => array('rel' => 'nofollow')
    #    );
    #};
    $vars['tabs'] = menu_local_tasks();
}

function gentoo_preprocess_comment(&$vars) {
    $author = $vars['author'];
    $created = $vars['created'];
    $new = "";
    if($vars['new']) {
        $new = sprintf("(%s)", drupal_ucfirst($vars['new']));
    }
    $_template = '<p class="commentuser">%s</p><p class="commentdate">%s%s</p>';
    $vars['submitted'] = sprintf($_template, $author, $created, $new);
}

function gentoo_preprocess_page(&$vars) {
    $vars['has_nodes'] = isset($vars['page']['content']['system_main']['nodes']);
}

function gentoo_preprocess_block(&$vars) {
    $block = $vars['block'];
    
    if($block->module == 'system' && $block->delta == 'user-menu') {
        global $user;
        $userdata = user_load($user->uid);
        if(isset($userdata->profile_full_name)) {
            $block->subject = $userdata->profile_full_name;
        /* } else if(isset($userdata->field_name)) {
            $block->subject = $userdata->field_name['und'][0]['safe_value'];*/
        } else {
            $block->subject = $user->name;
        }
    }
}

function gentoo_menu_local_tasks(&$vars) {
    $out = '';
    if(!empty($vars['primary'])) {
        $vars['primary']['#prefix'] = '<ul class="links tasks primary-tasks inline">';
        $vars['primary']['#suffix'] = "</ul>";
        $out .= drupal_render($vars['primary']);
    }

    if(!empty($vars['secondary'])) {
        $vars['secondary']['#prefix'] = '<ul class="links tasks secondary-tasks inline">';
        $vars['secondary']['#suffix'] = "</ul>";
        $out .= drupal_render($vars['secondary']);
    }
    return $out;
}
