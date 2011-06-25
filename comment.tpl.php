<?php
// $Id: comment.tpl.php,v 1.10 2008/01/04 19:24:24 goba Exp $
?>
<div class="comment<?php print ($comment->new) ? ' comment-new' : '';
print ' ' . $status;
print ' ' . $zebra; ?>">

    <div class="commenthead">
        <?php print $picture; ?>
        <p class="commentuser"><?php print $author; ?></p>
        <p class="commentdate">
            <?php print $date; ?>
            <?php if ($comment->new) : print '(' . drupal_ucfirst($new) . ')';
endif; ?>
        </p>

        <br class="clear" />

    </div>
    <div class="commentbody">
        <?php print $content ?>
        <?php if ($signature): ?>
        <div class="sign"><?php print $signature ?></div>
        <?php endif; ?>
    </div>

    <?php if ($links): ?>
    <div class="commentfoot">
        <?php print $links ?><?php print l('permalink','', array( 'fragment' => 'comment-' . $comment->cid, 'external' => TRUE)); ?>
    </div>
    <?php endif; ?>
</div>
