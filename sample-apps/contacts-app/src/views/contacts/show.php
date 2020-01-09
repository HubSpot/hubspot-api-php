<?php include __DIR__.'/../_partials/header.php'; ?>

<?php
    if ($created) {
        echo "<h3 class='alert-success created'>Successfully created</h3>";
    }
    if ($updated) {
        echo "<h3 class='alert-success updated'>Successfully updated Contact properties</h3>";
    }
?>

<div class="row">
    <div class="column">
        <h3>Properties</h3>
        <form method="post">
            <?php include __DIR__.'/../properties/_contacts_properties_list.php'; ?>
            <input id="save" class="button-primary" type="submit" value="Save">
        </form>
    </div>
    <div class="column">
    </div>

</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
