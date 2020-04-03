<fieldset>
    <?php
        foreach ($contact->getProperties() as $propertyName => $propertyValue) { ?>
            <?php
            if (in_array($propertyName, $propertiesToDisplay)) {
                $nameSanitized = htmlentities($propertyName);
                $labelSanitized = htmlentities($propertiesLabels[$propertyName]);
                $valueSanitized = htmlentities($propertyValue); ?>
            <label for="<?php echo $nameSanitized; ?>"><?php echo $labelSanitized; ?></label>
            <?php if ('hubspot_owner_id' === $nameSanitized) { ?>
<pre>
// https://developers.hubspot.com/docs-beta/crm/owners 
$owners = $hubSpot->crm()->owners()
                  ->defaultApi()
                  ->getPage()
                  ->getResults()
</pre>
                <select name="<?php echo $nameSanitized; ?>" id="<?php echo $nameSanitized; ?>">
                    <option value="">Not assigned</option>
                    <?php foreach ($owners as $owner) { ?>
                        <option
                                value="<?php echo $owner->getId(); ?>"
                                <?php if ($valueSanitized == $owner->getId()) { ?>selected<?php } ?>
                        ><?php echo htmlentities($owner->getFirstName().' '.$owner->getLastName()); ?></option>
                    <?php } ?>
                </select>
            <?php } else { ?>
                <input type="text" name="<?php echo $nameSanitized; ?>" id="<?php echo $nameSanitized; ?>" value="<?php echo $valueSanitized; ?>">
            <?php } ?>
    <?php
            }
        }
    ?>
</fieldset>


