<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 class="text-center">Import's History</h3>

<pre>
// src/actions/import/history.php
$hubSpot->crm()->imports()->coreApi()->getPage();
</pre>
<div>
    <a href="/import/start">
        <input class="button-primary"  type="button" value="New Import">
    </a>
</div>
<?php
if (count($history->getResults()) > 0) {
    ?>
<table>
  <thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>State</th>
    <th>Created At</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($history->getResults() as $import) {?>
    <tr>
        <td><a href="/import/show?id=<?php echo $import->getId(); ?>"><?php echo $import->getId(); ?></a></td>
        <td><?php echo htmlentities($import->getImportRequestJson()['importName']); ?></td>
        <td><?php echo htmlentities($import->getState()); ?></td>
        <td><?php echo $import->getCreatedAt()->format('Y-m-d H:i:s'); ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?php
} else { ?>
    <h3>No imports.</h3>
<?php
}

include __DIR__.'/../_partials/footer.php';
?>
