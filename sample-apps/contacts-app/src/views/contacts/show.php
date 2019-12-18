<?php include __DIR__.'/../_partials/header.php'; ?>

<?php
      if ($updated) {
          echo "<h3 class='alert-success'>Successfully updated Contact properties</h3>";
      }
?>

<div class="row">
    <div class="column">
        <h3>Properties</h3>
        <form method="post">
            <?php include __DIR__.'/../properties/_contacts_properties_list.php'; ?>
            <input id="save" class="button-primary" type="submit" value="Save">
        </form>

        <h3>Owner</h3>
        <form method="post">
            <fieldset>
                <select name="owner_id">
                    <option value="">Not assigned</option>
                    <?php foreach ($owners as $owner) { ?>
                        <option
                            value="<?php echo $owner->getId(); ?>"
                            <?php if (false) { ?>selected<?php } ?>
                        ><?php echo htmlentities($owner->getFirstName().' '.$owner->getLastName()); ?></option>
                    <?php } ?>
                </select>
                <input class="button-primary" type="submit" value="Save">
            </fieldset>
        </form>
    </div>
    <div class="column">
    </div>

</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
