<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 class="text-center">Import</h3>

<pre>
// src/actions/import/show.php
$hubSpot->crm()->imports()->coreApi()->getById($importId);
</pre>

<?php
include __DIR__.'/_details.php';

include __DIR__.'/../_partials/footer.php';
?>
