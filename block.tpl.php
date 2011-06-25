<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
<div id="box-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block box box-<?php print $block->module ?>">


<?php if (!empty($block->subject)): ?>
  <h2 class="boxhead"><?php print $block->subject ?></h2>
<?php endif;?>
<div class="boxbody">
<?php print $block->content ?>
</div>
</div>
