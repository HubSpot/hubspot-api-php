<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 id='alert-not-shown-events' class="hidden" datetime-mark="<?php echo time(); ?>">New webhooks are received. <a href="#">Reload</a> the page to see updates</h3>
<?php if ($paginator->getCount() > 0) { ?>
<table>
    <thead>
    <tr>
        <th>Contact ID</th>
        <th>Contact Name</th>
        <th>Events</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($contacts as $contact) { ?>
        <tr>
            <td><?php echo htmlentities($contact['id']); ?></a></td>
            <td><?php echo htmlentities($contact['name']); ?></td>
            <td>
                <?php foreach ($contact['events'] as $event) { ?>
                    <span class="event <?php echo htmlentities($event['event_type']); ?>"><?php echo htmlentities($event['event_type']); ?><?php
                        if (!empty($event['propertyName'])) { ?>:<span><?php echo htmlentities($event['propertyName']); } ?></span><?php
                        if (!empty($event['propertyValue'])) { ?>:<span><?php echo htmlentities($event['propertyValue']); } ?></span></span>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } else { ?>
<h3 id="empty-message">Webhooks haven't been received yet.</h3>
<?php } ?>
<?php
include __DIR__.'/../_partials/pagination.php';

include __DIR__.'/../_partials/footer.php';
?>
