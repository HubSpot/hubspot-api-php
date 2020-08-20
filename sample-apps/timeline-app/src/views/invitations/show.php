<?php

/**
 * @var array
 */
include __DIR__.'/../_partials/header.php';
?>

<div class="row">
    <div class="column">
        <table>
            <tbody>
                <?php foreach ($invitation as $key => $value) {?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo htmlspecialchars($value); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div>
            <a id='invitation-update' class="button" href="/invitations/update?id=<?php echo $invitation['id']; ?>">Update</a>
            <a id='invitation-delete' class="button" href="/invitations/delete?id=<?php echo $invitation['id']; ?>">Delete</a>
            <a id='invitation-delete' class="button" href="/invitations/list">List</a>
        </div>
    </div>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
