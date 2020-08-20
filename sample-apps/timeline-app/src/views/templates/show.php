<?php
include __DIR__.'/../_partials/header.php';
?>
<pre>
// src/actions/types/list.php - Get Timeline Event Template
$hubSpot->crm()->timeline()->templatesApi()
    ->getById('Event Template ID', 'HubSpot Application ID');
</pre>
<div class="row">
    <div class="column column-50">
        <table>
            <tbody>
                <tr>
                    <td>ID</td>
                    <td><?php echo $template->getId(); ?></td>
                </tr>
                <tr>
                    <td>Nane</td>
                    <td><?php echo $template->getName(); ?></td>
                </tr>
                <tr>
                    <td>Object Type</td>
                    <td><?php echo $template->getObjectType(); ?></td>
                </tr>
                <tr>
                    <td>Header Template</td>
                    <td><?php echo $template->getHeaderTemplate(); ?></td>
                </tr>
                <tr>
                    <td>Detail Template</td>
                    <td><?php echo $template->getDetailTemplate(); ?></td>
                </tr>
            </tbody>
        </table>
        <div>
            <a id='template-update' class="button" href="/templates/update?id=<?php echo $template->getId(); ?>">Update</a>
            <a id='template-delete' class="button" href="/templates/delete?id=<?php echo $template->getId(); ?>">Delete</a>
        </div>
        <pre>
// src/actions/templates/delete.php
Delete a timeline Event Template
$hubSpot->crm()->timeline()->templatesApi()
    ->archive('Event Template ID', 'HubSpot Application ID');
        </pre>
    </div>
    <div class="column">
        <?php include __DIR__.'/../properties/_list.php'; ?>
    </div>

</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
