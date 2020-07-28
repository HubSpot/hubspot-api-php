<?php include __DIR__.'/../_partials/header.php'; ?>
<h3>Select HubSpot pipeline</h3>

<pre>
// src/actions/mappings/pipelines.php

$hubspot->crm()->pipelines()->pipelinesApi()->getAll('deals');
</pre>

<table>
    <tbody>
        <?php foreach ($pipelines->getResults() as $pipeline) { ?>
        <tr>
            <td>
                <a href="/mappings/list?board_id=<?php echo $boardId; ?>&pipeline_id=<?php echo $pipeline->getId(); ?>"><?php echo $pipeline->getLabel(); ?></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php include __DIR__.'/../_partials/footer.php'; ?>
