<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
<div id="box-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block box box-<?php print $block->module ?>">

<?php 
  $subject = $block->subject;
  if(empty($subject) && $block->module == "search" && $block->delta == "form") $subject = t("Search");
?>

<?php if (!empty($subject)): ?>
  <h2 class="boxhead"><?php print $subject ?></h2>
<?php endif;?>
<div class="boxbody">
<?php print $content ?>
</div>
</div>
