<?php
if (count($template->getTokens()) > 0) {
    ?>
<table class="tokens-list">
    <thead>
        <tr>
            <th>Name</th>
            <th>Label</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($template->getTokens() as $property) {?>
        <tr>
            <td><?php echo $property->getName(); ?></td>
            <td><?php echo htmlentities($property->getLabel()); ?></td>
            <td>
                <a class="button" href="/templates/properties/update?template_id=<?php echo $template->getId(); ?>&name=<?php echo $property->getName(); ?>">Update</a>
                <a class="button" href="/templates/properties/delete?template_id=<?php echo $template->getId(); ?>&name=<?php echo $property->getName(); ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php
} else { ?>
    <h4>This template have no properties</h4>
<?php } ?>
<div>
    <a id='type-new' class="button" href="/templates/properties/new?id=<?php echo $template->getId(); ?>">New property</a>
</div>
<pre>
// src/actions/templates/properties/delete.php
Delete Property for Timeline Event Type
$response = $hubSpot->crm()->timeline()->tokensApi()
    ->archive(
        'Event Template ID',
        'Token name',
        'HubSpot Application ID'
    );
</pre>
