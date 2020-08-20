<?php
/**
 * @var array array consist of types (array)
 */
include __DIR__.'/../_partials/header.php';

if (count($invitations) > 0) {
    ?>
<table class="types-list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Text</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($invitations as $invitation) { ?>
        <tr>
            <td><a href="/invitations/show?id=<?php echo $invitation['id']; ?>"><?php echo $invitation['id']; ?></a></td>
            <td><?php echo htmlentities($invitation['name']); ?></td>
            <td><?php echo htmlentities($invitation['text']); ?></td>
            <td>
                <a class="button" href="/invitations/contacts?id=<?php echo $invitation['id']; ?>">Send</a>
                <a class="button" href="/invitations/delete?id=<?php echo $invitation['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php
} else { ?>
    <h4>No invitations have been added yet.</h4>
<?php } ?>
<div>
    <a id='invitation-new' class="button" href="/invitations/new">New Invitation</a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
