<?php if (isset($engagements, $contactId)) { ?>
    <h3>Engagements</h3>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Title</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($engagements as $engagement) { ?>
            <tr>
                <td><?php echo htmlentities($engagement->engagement->id); ?></td>
                <td><?php echo htmlentities($engagement->engagement->type); ?></td>
                <td><?php echo htmlentities($engagement->metadata->title); ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <div>
        <a id="engagement-new" href="/engagements/new.php?contactId=<?php echo htmlentities($contactId); ?>">
            <input class="button-primary" type="button" value="Add Engagement">
        </a>
    </div>
<?php } ?>
