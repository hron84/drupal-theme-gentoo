<div class="terms">
  <?php print t('Category:')?>
  <ul class="links inline">
    <?php foreach($items as $index => $item) : ?>
      <li class="term"<?php print $item_attributes[$index]; ?>><?php  print render($item); ?></li>
    <?php endforeach; ?>
  </ul>
</div>
