<?php include __DIR__.'/../_partials/header.php';?>

<h3>Map board lists with pipelines stages</h3>

<pre>
// src/actions/mappings/form.php
$hubspot->crm()->pipelines()->pipelinesApi()->getById('deals', $pipelineId);
</pre>

<pre>Note: selected Trello board list and Pipeline stage must be unique for all rows</pre>

<form method="post">
    <table>
        <thead>
            <tr>
                <th><?php echo $board->name;?> board lists</th>
                <th><?php echo $pipeline->getLabel();?> stages</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mappings as $mapping) { ?>
            <tr>
                <td>
                    <select name="board_list_ids[]">
                        <option disabled <?php if (empty($mapping['board_list_id'])) { ?> selected <?php } ?> value>-- select trello list --</option>
                        <?php foreach ($lists as $list) { ?>
                        <option value="<?php echo $list->id?>"<?php
                            if($list->id == $mapping['board_list_id']) { ?> selected <?php } ?>><?php
                            echo $list->name; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <select name="pipeline_stage_id[]">
                        <option disabled <?php if (empty($mapping['pipeline_stage_id'])) { ?> selected <?php } ?> value>-- select pipeline stage --</option>
                        <?php foreach ($pipeline->getStages() as $stage) { ?>
                        <option value="<?php echo $stage->getId();?>"
                        <?php if ($stage->getId() == $mapping['pipeline_stage_id']) { ?> selected <?php } ?>><?php
                        echo $stage->getLabel(); ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <?php if (empty($mapping['id'])) { ?>
                    <a href="/mappings/delete-row?board_id=<?php echo $boardId;?>&pipeline_id=<?php echo $pipelineId;?>&mapping_id=<?php echo $mapping['id'];?>">
                        <button type="button">Remove</button>
                    </a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <button type="submit">Save</button>
</form>

<?php include __DIR__.'/../_partials/footer.php';?>
