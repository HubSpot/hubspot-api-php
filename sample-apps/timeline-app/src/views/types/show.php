<?php
/**
 * @var stdClass timeline event type
 * @var array    $properties array consist of type's properties (stdClass)
 */
include __DIR__.'/../_partials/header.php';
?>
<pre>
// src/actions/types/list.php - Get Timeline Event Types
$hubSpot->timeline()->getEventTypeById('HubSpot Application ID', 'Event Type ID');

// src/actions/types/list.php - Get Properties for Timeline Event Type
$hubSpot->timeline()->getEventTypeProperties('HubSpot Application ID', 'Event Type ID');
</pre>
<div class="row">
    <div class="column column-50">
        <table>
            <tbody>
                <?php foreach ((array) $type as $key => $value) {?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div>
            <a id='type-update' class="button" href="/types/update.php?id=<?php echo $type->id; ?>">Update</a>
            <a id='type-delete' class="button" href="/types/delete.php?id=<?php echo $type->id; ?>">Delete</a>
        </div>
        <pre>
// src/actions/types/delete.php
Delete a timeline Event Type
$hubSpot->timeline()
    ->deleteEventType(
        'HubSpot Application ID',
        'Event Type ID'
    );
        </pre>
    </div>
    <div class="column">
        <?php include __DIR__.'/../properties/_list.php'; ?>
    </div>

</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
