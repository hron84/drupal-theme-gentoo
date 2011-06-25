<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
//if(!$messages) drupal_set_message('Test message', 'status');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <meta name="description" content="Magyar Gentoo Linux portál. Egy oldal, ahol bámilyen kérdést feltehetsz az alábbi Linux disztribúciókkal kapcsolatban: Gentoo, Sabayon, Funtoo SysRescueCD" />
    <meta name="keywords" content="gentoo,sabayon,funtoo,sysrescuecd,sysrescd,linux,kde,gnome,xfce,lxde,emerge,qlist,qfile,portage,portageq,make.conf,portdir overlay,gentoo mirrors,eix,gentoo portál,gentoo fórum,gentoo portal,gentoo forum" />
    <?php print $styles ?>
    <style type='text/css'><!--
    #header { 
        background-image: url('<?php echo $logo ?>');
        background-repeat: no-repeat;
    }
    #footer {
        background-image: url('<?php print base_path() . path_to_theme(); ?>/images/footer.png');
        background-repeat: repeat-y;
    }
    .nodehead {
        background-image: url('<?php print base_path() . path_to_theme(); ?>/images/nheader.png');
        background-repeat: repeat-y;
    }

    .box h2.boxhead {
        background-image: url('<?php print base_path() . path_to_theme(); ?>/images/bheader.png');
        background-repeat: repeat-y;
    }
    .commenthead {
        background: #7a5ada;
        background: -moz-linear-gradient(left, #41347a, #684ebe);
        background: -webkit-gradient(linear, left top, right top, from(#41347a), to(#684ebe));
        filter: progid:DXImageTransform.Microsoft.Gradient(StartColorStr='#41347a', EndColorStr='#684ebe', GradientType=1);
    }
   --></style>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
  </head>
  <body<?php print phptemplate_body_class($left, $right); ?>>
    <div id="wrapper">
      <!-- Begin header -->
      <div id="header">
      <?php
        $site_title = $site_name . ' - ' . $site_slogan;
        print '<a href="' . check_url($front_page) . '" title="' . $site_title .'">';
        print '<h1>' . $site_name . '</h1>';
        print '</a>';
        print '<p id="slogan">' . $site_slogan . '</p>';
      ?>
      </div><!-- End header -->
      <div id="leftcolumn" class="sidebar">
         
          <?php print $left ?>
      </div>
      <div id="content">
        <div id="navmenu">
          <?php if (isset($primary_links)) : ?>
            <!-- primary links -->
            <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
            <!-- /primary links -->
          <?php endif; ?>
          <?php if (isset($secondary_links)) : ?>
            <!-- secondary links -->
            <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
            <!-- secondary links -->
          <?php endif; ?>
        </div>
        <?php if ($show_messages && $messages): print $messages ; endif; ?>
        <?php if(!$is_front && !strstr($body_classes, 'page-node')) : ?>
        <div class="node page-node">
          <div class="nodehead autoheight">
            <h2><?php print $title; ?></h2>
          </div>
          <div class="nodebody">
            <?php print $content; ?>
          </div>
        </div>
        <?php else: ?>
        <?php print $content; ?>
        <?php endif; ?>

      </div>
      <div id="rightcolumn" class="sidebar">
          <?php if($tabs || $tabs2) : ?>
          <div class="box">
              <div class="boxbody">
                  <ul>
                      <?php if($tabs): print $tabs; endif;?>
                      <?php if($tabs2): print '<hr/>' . $tabs2; endif;?>
                  </ul>
              </div>
          </div>
          <?php endif; ?>
          <?php if ($search_box): ?>
          <div class="box search-box">
              <div class="boxbody">
                 <?php print $search_box ?>
              </div>
          </div>
          <?php endif; ?>
          <?php print $right ?>
          <div id="icons">
            <?php print $feed_icons ?>
            <a href="http://validator.w3.org/check?uri=referer" title="Valid XHTML"><img src="<?php print base_path() . path_to_theme() .  '/images/valid.png'; ?>" alt="Valid XHTML" /></a>
          </div>
      </div>
      <br style="clear: both;" />
      <div id="footer">
        <?php print $footer_message . $footer ?>
      </div>
    </div>
  
  <?php print $closure ?>
  </body>
</html>
<!--
vim: ts=2 sw=2 et
-->
