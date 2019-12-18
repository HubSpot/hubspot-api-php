<fieldset>
    <?php
    foreach ($contact['properties'] as $propertyName => $propertyValue) { ?>
        <?php
        $nameSanitized = htmlentities($propertyName);
        $valueSanitized = htmlentities($propertyValue);
        ?>
        <label for="<?php echo $nameSanitized; ?>"><?php echo $nameSanitized; ?></label>
        <input type="text" name="<?php echo $nameSanitized; ?>" id="<?php echo $nameSanitized; ?>" value="<?php echo $valueSanitized; ?>">
    <?php } ?>
</fieldset>


