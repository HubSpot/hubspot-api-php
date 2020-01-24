<?php include __DIR__.'/../_partials/header.php'; ?>

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

<table class="contacts-list">
  <thead>
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Name</th>
  </tr>
  </thead>
  <tbody>

  <?php foreach ($contactsPage->getResults() as $contact) { ?>
    <tr>
      <td><?php echo $contact->getId(); ?></td>
        <td><?php echo htmlentities($contact->getProperties()['email']); ?></td>
      <td><?php echo htmlentities($contact->getProperties()['firstname'].' '.$contact->getProperties()['lastname']); ?></td>
    </tr>
  <?php }?>
  </tbody>
</table>

<?php include __DIR__.'/../_partials/footer.php'; ?>
