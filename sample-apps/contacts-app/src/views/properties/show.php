<?php

use HubSpot\Client\Crm\Properties\Model\PropertyModificationMetadata;

include __DIR__.'/../_partials/header.php';

$readOnly = '';
if ($property->getModificationMetadata() instanceof PropertyModificationMetadata
        && $property->getModificationMetadata()->getReadOnlyDefinition()) {
    $readOnly = 'readonly';
}
if (!empty($readOnly)) {
    ?>
<h3>This property can't be modified.</h3>
<?php
} ?>

<pre>
// src/actions/properties/show.php
$hubSpot
    ->crm()
    ->properties()
    ->coreApi()
    ->getByName(
        ObjectType::CONTACTS,
        $_GET['name']
    );
</pre>

<form method="post">
    <fieldset>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" <?php if (array_key_exists('name', $_GET)) { ?>
               readonly <?php } ?>value="<?php echo htmlentities($property->getName()); ?>" />

        <label for="label">Label</label>
        <input type="text" name="label" id="label" value="<?php echo htmlentities($property->getLabel()); ?>"<?php echo $readOnly; ?> />
        <label for="description">Description</label>
        <textarea name="description" id="description"<?php echo $readOnly; ?>><?php echo htmlentities($property->getDescription()); ?></textarea>
        <label for="group-name">Group Name</label>
        <input type="text" name="group_name" id="group-name" value="<?php echo htmlentities($property->getGroupName()); ?>" />

        <label for="type">Type</label>
        <input readonly type="text" name="type" id="type" value="<?php echo htmlentities($property->getType()); ?>" />

        <input readonly type="text" name="field_type" id="fieldType" value="<?php echo htmlentities($property->getFieldType()); ?>" />
<?php if (empty($readOnly)) { ?>
        <input id="save" class="button-primary" type="submit" value="Save">
<?php } ?>
    </fieldset>
</form>

<?php include __DIR__.'/../_partials/footer.php'; ?>
