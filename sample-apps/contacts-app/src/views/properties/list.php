<?php include __DIR__.'/../_partials/header.php'; ?>

<table class="properties-list">
  <thead>
  <tr>
        <th>Name</th>
        <th>Label</th>
        <th>Description</th>
        <th>Type</th>
        <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($properties as $property) { ?>
    <tr>
      <td><a href="/properties/show.php?name=<?php echo htmlentities($property->name); ?>"><?php echo htmlentities($property->name); ?></a></td>
      <td><?php echo htmlentities($property->label); ?></td>
      <td><?php echo htmlentities($property->description); ?></td>
      <td><?php echo htmlentities($property->type); ?></td>
        <td><?php if (!$property->mutableDefinitionNotDeletable && !$property->readOnlyDefinition) { ?>
                <a id="remove-<?php echo htmlentities($property->name); ?>" href="/properties/delete.php?name=<?php echo htmlentities($property->name); ?>">
                    <input type="button" value="Delete" title="Delete" class="button-primary"/>
                </a> <?php } ?></td>
    </tr>
  <?php }?>
  </tbody>
</table>

<div>
  <a id="new-property" href="/properties/new.php">
    <input class="button-primary" type="button" value="New Property">
  </a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
