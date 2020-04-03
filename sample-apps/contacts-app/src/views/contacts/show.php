<?php include __DIR__.'/../_partials/header.php'; ?>

<?php
    if ($created) {
        echo "<h3 class='alert-success created'>Successfully created</h3>";
    }
    if ($updated) {
        echo "<h3 class='alert-success updated'>Successfully updated Contact properties</h3>";
    }

    if (isset($_GET['id'])) {
        ?>
<pre>
// src/actions/contacts/show.php
$hubSpot
    ->crm()
    ->contacts()
    ->basicApi()
    ->getById(
        $contactId,
        'firstname,lastname'
    );
</pre>
<?php
    } ?>

<div class="row">
    <div class="column">
        <h3>Properties</h3>
        <form method="post">
            <?php include __DIR__.'/../properties/_contacts_properties_list.php'; ?>
            <pre>
            // src/actions/contacts/show.php
            $contactInput = new SimplePublicObjectInput();
            $contactInput->setProperties($_POST);
            $contact = $hubSpot->crm()->contacts()->basicApi()-><?php echo isset($_GET['id']) ? 'create' : 'update'; ?>($contactInput);
            </pre>
            <input id="save" class="button-primary" type="submit" value="Save">
            <?php if (isset($_GET['id'])) { ?>
            <pre>
            // src/actions/contacts/show.php
            $hubSpot->crm()->contacts()->basicApi()->archive($contactId);
            </pre>
            <input id="delete" onclick="return confirm('Are you sure?');" class="button-primary" name="buttonDelete" type="submit" value="Delete">
            <?php } ?>
        </form>
    </div>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
