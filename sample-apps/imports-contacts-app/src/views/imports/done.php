<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 class="text-center">Import request have been sent</h3>
<div>
    <table>
        <tbody>
            <tr>
                <td>Import Id</td>
                <td><?php echo $response->getId(); ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo $response->getState(); ?></td>
            </tr>
            <tr>
                <td>Created At</td>
                <td><?php echo $response->getCreatedAt()->format('Y-m-d H:i:s'); ?></td>
            </tr>
        </tbody>
    </table>
    <a href="/import/start.php">Back</a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
