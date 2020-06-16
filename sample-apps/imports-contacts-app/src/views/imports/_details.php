<div>
    <table>
        <tbody>
            <tr>
                <td>Id</td>
                <td><?php echo $import->getId(); ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $import->getImportRequestJson()['importName']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo $import->getState(); ?></td>
            </tr>
            <tr>
                <td>Created At</td>
                <td><?php echo $import->getCreatedAt()->format('Y-m-d H:i:s'); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div>
    <a href="/import/history"><button>History</button></a>
</div>
