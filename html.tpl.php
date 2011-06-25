<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
  dir="<?php print $language->dir ?>" 
  xml:lang="<?php print $language->language ?>" 
  lang="<?php print $language->language ?>"
  profile="<?php print $grddl_profile; ?>"
  <?php print $rdf_namespaces ?>>
  <?php # drupal_set_message('Test message'); ?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width-1024" />
    <title><?php print $head_title ?></title>
    <?php print $head ?>
    <?php print $styles ?>

    <style type='text/css'><!--
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
  </head>
  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <?php print $page_top ?>
    <?php print $page ?>
    <?php print $page_bottom ?>
  </body>
</html>
