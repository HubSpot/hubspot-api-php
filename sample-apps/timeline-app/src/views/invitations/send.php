<?php
/**
 * @var $contactLists array consist of types (array)
 */
include __DIR__.'/../_partials/header.php';
?>

<?php if (isset($sent) && $sent) { ?>
    <h4>Successfully sent to selected contact lists</h4>
<?php } ?>

<h3>Select static contact lists to send the invitation to</h3>
<pre>
// src/actions/events/send.php - get all static lists
$contactLists = $hubSpot->contactLists()->getAllStatic(['count' => 250])->getData()->lists;
</pre>

<form method="post">
    <table class="types-list">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Size</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactLists as $list) { ?>
                <tr>
                    <td><input type="checkbox" name="listIds[]" value="<?php echo htmlentities($list->listId) ?>"/> </td>
                    <td><?php echo htmlentities($list->name); ?></td>
                    <td><?php echo htmlentities($list->metaData->size); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="submit" value="Send to selected contact lists" />
</form>

<?php include __DIR__.'/../_partials/footer.php'; ?>
