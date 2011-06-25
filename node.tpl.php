<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>

<div id="node-<?php print $node->nid; ?>" class="node<?php if($sticky) print ' sticky'; if(!$status) print ' node-unpublished'; ?>">
<!-- picture -->
<?php print $picture; ?>
<div class="nodehead autoheight">
  <script type="text/javascript"><?php
$d  = getdate($node->created);
$y  = $d['year'];
$m  = $d['mon'];
$dd = $d['mday'];
$h  = $d['hours'];
$mm = $d['minutes'];
$s  = $d['seconds'];
print 'printDateDiv(' . $y . ', ' . sprintf("%02d", $m) . ', ' . $dd . ');';
?></script>

  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print  $title ?></a></h2>
  <br class="clear" />
</div>
<div class="nodebody">
  <?php print $content; ?>
</div>
<div class="nodefoot">
  <?php if($taxonomy): ?>
  <div class="terms"><?php print t('Category:')?> <?php print $terms ?></div>
  <?php endif; ?>
  <div>
  <?php if($name): print '<strong>' . t('Published by: ') . '</strong> ' . $name . ","; endif; ?> <strong><?php print t('Time:'); ?></strong> <?php printf("%02d:%02d", $h, $mm); ?>
  
  <?php if($links): ?>
  <?php print $links ?>
  <?php endif; ?>
  <?php if (user_access('administer nodes')): ?>
  <?php print l('Edit', 'node/' . $nid . '/edit'); ?>
  <?php endif; ?>
  </div>
</div>
</div><!-- /node -->
