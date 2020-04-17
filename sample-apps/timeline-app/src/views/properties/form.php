<?php
include __DIR__.'/../_partials/header.php';
$propertyTypes = [
    'date',
    'number',
    'string',
];

if (!isset($_GET['name'])) {
    ?>
<pre>
// src/actions/types/properties/new.php - Create Token for Timeline Event Template
$request = new \HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateToken();
$request->setName('name');
$request->setLabel('Label');
$request->setType('string');

$hubSpot->crm()->timeline()->tokensApi()
    ->create(
        'Event Template ID',
        'HubSpot Application ID',
        $request
    );
</pre>
<?php
} else { ?>
<pre>
// src/actions/types/properties/update.php - Update Token for Timeline Event Template
$request = new TimelineEventTemplateTokenUpdateRequest();
$request->setLabel($_POST['label']);

$hubSpot->crm()->timeline()->tokensApi()
    ->update(
        'Event Template ID',
        'Token name',
        'HubSpot Application ID',
        $request
    );
</pre>
<?php } ?>
<form method="post">
    <fieldset>
        <?php if (!isset($_GET['name'])) { ?>
        <label for="name">Name</label>
        <input type="text" placeholder="Name" required id="name" name="name" value="<?php echo $property->getName(); ?>">
        <?php } ?>
        <label for="label">Label</label>
        <input type="text" placeholder="Label" id="label" name="label" value="<?php echo $property->getLabel(); ?>">
        <?php if (!isset($_GET['name'])) { ?>
        <label for="type">Property Type</label>
        <select id="type" name="type" required>
            <option value="" <?php if (empty($property->getType())) { ?>selected<?php } ?>>Select Property Type</option>
            <?php foreach ($propertyTypes as $value) { ?>
                <option <?php if ($property->getType() == $value) {?>selected <?php } ?>value="<?php echo $value; ?>"><?php echo $value; ?></option>
            <?php } ?>
        </select>
        <?php } ?>
        <input id="save" class="button-primary" type="submit" value="Save">
    </fieldset>
</form>

<?php include __DIR__.'/../_partials/footer.php'; ?>
