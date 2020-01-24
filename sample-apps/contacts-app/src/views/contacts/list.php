<?php include __DIR__.'/../_partials/header.php'; ?>

<?php if (!empty($search)) { ?>
<pre>
// src/actions/contacts/search.php
$filter = new Filter();
$filter
    ->setOperator('EQ')
    ->setPropertyName('email')
    ->setValue($search)
;
$filterGroup = new FilterGroup();
$filterGroup->setFilters([$filter]);
$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilterGroups([$filterGroup]);

$hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);
</pre>
<?php } ?>

<form id="search-form" action="/contacts/search.php">
    <fieldset>
        <input type="text" name="search" placeholder="Search by email.." id="search" value="<?php echo $search; ?>">
    </fieldset>
</form>

<table class="contacts-list">
  <thead>
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Name</th>
  </tr>
  </thead>
  <tbody>

<?php if (empty($search)) { ?>
<pre>
// src/actions/contacts/list.php
$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setSorts([
    [
        'propertyName' => 'createdate',
        'direction' => 'DESCENDING',
    ],
]);
$hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);
</pre>
<?php } ?>

  <?php foreach ($contactsPage->getResults() as $contact) { ?>
    <tr>
      <td><a href="/contacts/show.php?id=<?php echo $contact['id']; ?>"><?php echo $contact->getId(); ?></a></td>
        <td><?php echo htmlentities($contact->getProperties()['email']); ?></td>
      <td><?php echo htmlentities($contact->getProperties()['firstname'].' '.$contact->getProperties()['lastname']); ?></td>
    </tr>
  <?php }?>
  </tbody>
</table>

<div>
  <a id="contact-new" href="/contacts/new.php">
    <input class="button-primary"  type="button" value="New Contact">
  </a>
    <a id="contacts-export" href="/contacts/export.php">
        <input class="button-primary" type="button" value="Export To CSV">
    </a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
