<?php
/**
 * @var array timeline event type's property
 */
include __DIR__.'/../_partials/header.php';
$propertyTypes = [
    'Date',
    'Numeric',
    'String',
];
?>
<pre>
// src/actions/types/properties/new.php - Create Property for Timeline Event Type
$hubSpot->timeline()->createEventTypeProperty(
        'HubSpot Application ID',
        'Event Type ID'
        'Name',
        'Label',
        'Property Type'
    );

// src/actions/types/properties/update.php - Update Property for Timeline Event Type
$hubSpot->timeline()->updateEventType(
        'HubSpot Application ID',
        'Event Type ID',
        'Property ID',
        'Name',
        'Label',
        'Property Type'
    );
</pre>
<form method="post">
    <fieldset>
        <label for="name">Name</label>
        <input type="text" placeholder="Name" id="name"<?php if (isset($_GET['property_id'])) { ?> readonly<?php } ?> name="name" value="<?php echo $property['name']; ?>">
        <label for="label">Label</label>
        <input type="text" placeholder="Label" id="label" name="label" value="<?php echo $property['label']; ?>">
        <label for="propertyType">Property Type</label>
        <select id="propertyType" name="propertyType">
            <option disabled<?php if (empty($property['propertyType'])) { ?>selected<?php } ?>>Select Property Type</option>
            <?php foreach ($propertyTypes as $value) { ?>
                <option <?php if ($property['propertyType'] == $value) {?>selected <?php } ?>value="<?php echo $value; ?>"><?php echo $value; ?></option>
            <?php } ?>
        </select>
        <input id="save" class="button-primary" type="submit" value="Save">
    </fieldset>
</form>

<?php include __DIR__.'/../_partials/footer.php'; ?>
