<?php include __DIR__.'/../_partials/header.php'; ?>

<form method="post">
    <fieldset>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" <?php if (array_key_exists('name', $_GET)) { ?>
               readonly <?php } ?>value="<?php echo htmlentities($property->getName()); ?>" />

        <label for="label">Label</label>
        <input type="text" name="label" id="label" value="<?php echo htmlentities($property->getLabel()); ?>" />
        <label for="description">Description</label>
        <textarea name="description" id="description"><?php echo htmlentities($property->getDescription()); ?></textarea>
        <label for="group-name">Group Name</label>
        <input type="text" name="group_name" id="group-name" value="<?php echo htmlentities($property->getGroupName()); ?>" />

        <label for="type">Type</label>
        <input readonly type="text" name="type" id="type" value="<?php echo htmlentities($property->getType()); ?>" />

        <input readonly type="hidden" name="field_type" id="fieldType" value="<?php echo htmlentities($property->getFieldType()); ?>" />

        <input id="save" class="button-primary" type="submit" value="Save">
    </fieldset>
</form>

<?php include __DIR__.'/../_partials/footer.php'; ?>
