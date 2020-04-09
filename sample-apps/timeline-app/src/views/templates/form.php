<?php
/**
 * @var array timeline event type
 */
include __DIR__.'/../_partials/header.php';
$objectTypes = [
    'CONTACT' => 'Contact',
    'COMPANY' => 'Company',
    'DEAL' => 'Deal',
];
?>
<pre>
// src/actions/types/new.php - Create a new Timeline Event Type
$hubSpot->timeline()->createEventType(
        'HubSpot Application ID',
        'Event Type Name',
        'Header Template',
        'Detail Template',
        'Object Type'
    );

// src/actions/types/update.php - Update a Timeline Event Type
$hubSpot->timeline()->updateEventType(
        'HubSpot Application ID',
        'Event Type ID',
        'Event Type Name',
        'Header Template',
        'Detail Template',
        'Object Type'
    );
</pre>
<form method="post">
<fieldset>
    <label for="name">Name</label>
    <input type="text" placeholder="Name" id="name" name="name" value="<?php echo $type['name']; ?>">
    <label for="headerTemplate">Header Template</label>
    <input type="text" placeholder="Header Template" id="headerTemplate" name="headerTemplate" value="<?php echo $type['headerTemplate']; ?>">
    <label for="detailTemplate">Detail Template</label>
    <input type="text" placeholder="Detail Template" id="detailTemplate" name="detailTemplate" value="<?php echo $type['detailTemplate']; ?>">
    <label for="objectType">Object Type</label>
    <select id="objectType" name="objectType">
        <?php foreach ($objectTypes as $key => $value) { ?>
        <option <?php if ($type['objectType'] == $key) {?>selected <?php } ?>value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php } ?>
    </select>
    <input id="save" class="button-primary" type="submit" value="Save">
</fieldset>
</form>

<?php include __DIR__.'/../_partials/footer.php'; ?>
