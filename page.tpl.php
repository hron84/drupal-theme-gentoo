  <div id="wrapper">
    <div id="header" style="background-image: url('<?php print $logo ?>'); background-repeat: no-repeat;">
      <?php $site_title = join('-', array($site_name, $site_slogan)); ?>
      <h1><a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name ?></a></h1>
    </div>
    <div id="leftcolumn" class="sidebar">
      <?php print render($page['sidebar_first']); ?>
    </div>
    <div id="content">
      <div id="navmenu">
        <?php if($main_menu) : ?>
        <!-- main menu -->
        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => 'links primary-links'))); ?>
        <!-- /main menu -->
        <?php endif; ?>
        <?php if($secondary_menu) : ?>
        <!-- sec  menu -->
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => 'links secondary-links'))); ?>
        <?php endif; ?>
      </div>
      <?php if ($messages): print $messages ; endif; ?>
      <?php if($has_nodes) : ?>
        <?php print render($page['content']); ?>
      <?php else : ?>
        <div class="node">
          <div class="nodehead autoheight"><h2><?php print $title ?></h2></div>
          <div class="nodebody"><?php print render($page['content']) ?></div>
          <div class="nodefoot"><?php print render($action_links); ?><?php print render($tabs); ?></div>

        </div>
      <?php endif; ?>
    </div>
    <div id="rightcolumn" class="sidebar">
      <?php print render($page['sidebar_second']); ?>
      <div id="icons">
        <?php print $feed_icons ?>
        <a href="http://validator.w3.org/check?uri=referer" title="Valid XHTML"><img src="<?php print base_path() . path_to_theme() .  '/images/valid.png'; ?>" alt="Valid XHTML" /></a>
      </div>
    </div>
    <br style="clear: both;" />
    <div id="footer">
      <?php print render($page['footer']); ?>
    </div>
  </div>
