<?php ?>
<h3>Properties</h3>
    <form method="post" action="/contacts/show.php">
        <fieldset>
            <?php
            foreach ($formFields as $field) { ?>
                <?php
                $nameSanitized = htmlentities($field['name']);
                $labelSanitized = htmlentities($field['label']);
                $valueSanitized = htmlentities($field['value']);
                ?>
                <label for="<?php echo $nameSanitized; ?>"><?php echo $labelSanitized; ?></label>
                <?php if ('hubspot_owner_id' === $nameSanitized) { ?>
                    <select name="<?php echo $nameSanitized; ?>" id="<?php echo $nameSanitized; ?>">
                        <option value="">Not assigned</option>
                        <?php foreach ($owners as $owner) { ?>
                            <option
                                    value="<?php echo $owner->ownerId; ?>"
                                    <?php if ($valueSanitized == $owner->ownerId) { ?>selected<?php } ?>
                            ><?php echo $owner->firstName.' '.$owner->lastName; ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <input type="text" name="<?php echo $nameSanitized; ?>" id="<?php echo $nameSanitized; ?>" value="<?php echo $valueSanitized; ?>">
                <?php } ?>
            <?php } ?>

            <input id='save' class="button-primary" type="submit" value="Save">
        </fieldset>
    </form>

