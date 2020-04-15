<?php
include __DIR__.'/../_partials/header.php';
?>

<pre>
// src/actions/types/list.php - Get Timeline Event Templates
$hubSpot->crm()->timeline()->templatesApi()
    ->getAll('HubSpot Application ID')

// src/actions/types/delete.php - Delete a timeline Event Template
$hubSpot->crm()->timeline()->templatesApi()
    ->archive('Event Template ID', 'HubSpot Application ID');
</pre>
<table class="types-list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Object</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($response->getResults() as $template) { ?>
        <tr>
            <td><a href="/templates/show.php?id=<?php echo $template->getId(); ?>"><?php echo $template->getId(); ?></a></td>
            <td><?php echo htmlentities($template->getName()); ?></td>
            <td><?php echo htmlentities($template->getObjectType()); ?></td>
            <td>
                <a class="button" href="/templates/delete.php?id=<?php echo $template->getId(); ?>">Delete</a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

<div>
    <a id='type-new' class="button" href="/templates/new.php">New Types</a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
