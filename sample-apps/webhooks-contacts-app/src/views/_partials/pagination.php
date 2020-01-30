<?php if (isset($paginator) && $paginator->getPagesCount() > 1) { ?>
<div class="row pagination">
    <a href="<?php echo $paginator->getUrl(1); ?>"><<</a>
    <a href="<?php echo $paginator->getUrl($paginator->getPrevPage()); ?>"><</a>
    <?php for ($i = $paginator->getStartPage(); $i <= $paginator->getEndPage(); ++$i) { ?>
        <a href="<?php echo $paginator->getUrl($i); ?>"<?php
         if ($i == $paginator->getPage()) {?> class="active"<?php } ?>><?php echo $i; ?></a>
    <?php } ?>
    <a href="<?php echo $paginator->getUrl($paginator->getNextPage()); ?>">></a>
    <a href="<?php echo $paginator->getUrl($paginator->getPagesCount()); ?>">>></a>
</div>
<?php } ?>
