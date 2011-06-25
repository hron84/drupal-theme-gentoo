<?php
?>
<div id="node-<?php print $node->nid; ?>"  class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <!-- picture -->
  <?php print $user_picture; ?>
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
      <?php print render($title_prefix); ?>
      <?php #if (!$page) : ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php #endif; ?>
      <?php print render($title_suffix); ?>
      <br class="clear" />
  </div>
  <div class="nodebody"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      print render($content);
    ?>
  </div>
  <div class="nodefoot">
    <?php if($taxonomy): ?>
    <?php print render($content['field_tags']) ?>
    <?php endif; ?>
    <div class="submitted"><?php print $submitted ?></div>
    <?php print render($content['links']); ?>
    <ul class="links inline"><?php print render($tabs); ?></ul>
  </div><!-- /nodefoot -->
</div>
<?php print render($content['comments']); ?>











