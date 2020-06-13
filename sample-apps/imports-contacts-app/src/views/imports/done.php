<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 class="text-center">Import request have been sent</h3>
<?php include __DIR__.'/_details.php'; ?>

<pre>
// src/actions/import/cansel.php
$hubspot->crm()->imports()->coreApi()->cancel($importId);
</pre>

<div>
    <?php if ($import->getState() !== 'DONE') { ?>
    <a href="/import/cansel"><button>Cansel</button></a>
    <?php } ?>
    <a href="/import/history"><button>History</button></a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
