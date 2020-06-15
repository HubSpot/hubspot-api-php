<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 class="text-center">Select File</h3>
<p>You can take an example of file <a href="/data/example.csv">here</a>.</p>
<div>
    <form method="post"  enctype="multipart/form-data" action="/import/do">
        <input type="file" required name="file" accept='text/*,.csv'>
        <input type="submit" value="Upload" name="submit">
    </form>
</div>

<pre>
// src/actions/import/do.php
$request = json_encode([
    'name' => 'Import',
    'files' => [
        [
            'fileName' => $fileName,
            'fileImportPage' => [
                'hasHeader' => true,
                'columnMappings' => [
                    [
                        'columnName' => 'First Name',
                        'propertyName' => 'firstname',
                        'columnObjectType' => 'CONTACT',
                    ],
                    [
                        'columnName' => 'Email',
                        'propertyName' => 'email',
                        'columnObjectType' => 'CONTACT',
                    ]
                ]
            ]
        ]
    ]
]);

$hubSpot->crm()->imports()->coreApi()->create($request, $fileName);
</pre>

<?php include __DIR__.'/../_partials/footer.php'; ?>
