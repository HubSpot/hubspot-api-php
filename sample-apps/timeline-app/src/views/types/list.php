<?php
/**
 * @var array array consist of types (stdClass)
 */
include __DIR__.'/../_partials/header.php';
?>

<pre>
// src/actions/types/list.php - Get Timeline Event Types
$hubSpot->timeline()->getEventTypes('HubSpot Application ID')

// src/actions/types/delete.php - Delete a timeline Event Type
$hubSpot->timeline()->deleteEventType('HubSpot Application ID', 'Event Type ID');
</pre>
<table class="types-list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Object</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($types as $type) { ?>
        <tr>
            <td><a href="/types/show.php?id=<?php echo $type->id; ?>"><?php echo $type->id; ?></a></td>
            <td><?php echo htmlentities($type->name); ?></td>
            <td><?php echo htmlentities($type->objectType); ?></td>
            <td>
                <a class="button" href="/types/delete.php?id=<?php echo $type->id; ?>">Delete</a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

<div>
    <a id='type-new' class="button" href="/types/new.php">New Types</a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
