<?php include __DIR__.'/../_partials/header.php'; ?>

<pre>
// src/actions/properties/list.php
$hubSpot
    ->crm()
    ->properties()
    ->coreApi()
    ->getAll(ObjectType::CONTACTS)
    ->getResults();
</pre>

<table class="properties-list">
    <thead>
    <tr>
        <th>Name</th>
        <th>Label</th>
        <th>Description</th>
        <th>Type</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($properties as $property) { ?>
        <tr>
            <td>
                <a href="/properties/show?name=<?php echo htmlentities($property->getName()); ?>"><?php echo shortenString(htmlentities($property->getName())); ?></a>
            </td>
            <td><?php echo htmlentities($property->getLabel()); ?></td>
            <td><?php echo shortenString(htmlentities($property->getDescription()), 70); ?></td>
            <td><?php echo htmlentities($property->getType()); ?></td>
            <td><?php if ($property->getModificationMetadata()->getArchivable()) { ?>
                <a id="remove-<?php echo htmlentities($property->name); ?>"
                   href="/properties/delete?name=<?php echo htmlentities($property->getName()); ?>">
                    <input type="button" value="Delete" title="Delete" class="button-primary"/>
                </a> <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div>
    <a id="new-property" href="/properties/new">
        <input class="button-primary" type="button" value="New Property">
    </a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
