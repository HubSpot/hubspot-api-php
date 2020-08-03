<?php include __DIR__.'/../_partials/header.php'; ?>

<h3>Map board lists with pipelines stages</h3>

<pre>
// src/actions/mappings/form.php
$hubspot->crm()->pipelines()->pipelinesApi()->getById('deals', $pipelineId);
</pre>

<pre>Note: selected Trello board list and Pipeline stage must be unique for all rows</pre>

<table>
    <thead>
        <tr>
            <th>Trello List(<?php echo $board->name; ?>)</th>
            <th>Pipeline Stage(<?php echo $pipeline->getLabel(); ?>)</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($mappings)) {
            foreach ($mappings as $mapping) {
                ?>
        <tr>
            <td>
                <?php
                foreach ($lists as $list) {
                    if ($list->id == $mapping['board_list_id']) {
                        echo $list->name;
                    }
                } ?>
            </td>
            <td>
                <?php
                foreach ($pipeline->getStages() as $stage) {
                    if ($stage->getId() == $mapping['pipeline_stage_id']) {
                        echo $stage->getLabel();
                    }
                } ?>
            </td>
            <td>
                <a href="/mappings/delete-row?board_id=<?php echo $boardId; ?>&pipeline_id=<?php echo $pipelineId; ?>&mapping_id=<?php echo $mapping['id']; ?>">
                    <button type="button">Remove</button>
                </a>
            </td>
        </tr>
    <?php
            }
        }
    ?>
        <tr>
            <form method="post" action="/mappings/create-row?<?php echo http_build_query($_GET); ?>">
                <td>
                    <select name="list_id">
                        <option disabled selected value>-- select trello list --</option>
                        <?php foreach ($lists as $list) { ?>
                        <option value="<?php echo $list->id; ?>"><?php
                            echo $list->name; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <select name="stage_id">
                        <option disabled selected value>-- select pipeline stage --</option>
                        <?php foreach ($pipeline->getStages() as $stage) { ?>
                        <option value="<?php echo $stage->getId(); ?>"><?php
                        echo $stage->getLabel(); ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><button type="submit">Create Row</button></td>
            </form>
        </tr>
    </tbody>
</table>

<?php include __DIR__.'/../_partials/footer.php'; ?>
