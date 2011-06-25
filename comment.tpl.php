<div class="comment<?php print ($comment->new) ? ' comment-new' : '';
print ' ' . $status;
print ' ' . $zebra;
print $classes ?>">
  <div class="commenthead">
    <?php print $picture; ?>
    <?php print $submitted ?>
    <br class="clear" />
  </div>
  <div class="commentbody">
    <?php hide($content['links']); print render($content); ?>
    <?php if ($signature): print $signature; endif; ?>
  </div>
  <div class="commentfoot">
    <?php print render($content['links']); print $permalink; ?>
  </div>
</div>
