<?php ?>
<h3>Properties</h3>
    <form method="post">
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

            <input id="save" class="button-primary" type="submit" value="Save">
        </fieldset>
    </form>

