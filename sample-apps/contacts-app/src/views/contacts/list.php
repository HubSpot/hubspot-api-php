<?php include __DIR__.'/../_partials/header.php'; ?>

<?php if (!empty($search)) { ?>
<pre>
// src/actions/contacts/search.php
$filter = new Filter();
$filter
    ->setOperator('EQ')
    ->setPropertyName('email')
    ->setValue($search);

$filterGroup = new FilterGroup();
$filterGroup->setFilters([$filter]);
$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilterGroups([$filterGroup]);

$hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);
</pre>
<?php } ?>

<form id="search-form" action="/contacts/search">
    <fieldset>
        <input type="text" name="search" placeholder="Search by email.." id="search" value="<?php echo $search; ?>">
    </fieldset>
</form>

<?php if (empty($search)) { ?>
<pre>
// src/actions/contacts/list.php
$contactsPage = $hubSpot->crm()->contacts()->basicApi()->getPage();
// src/actions/contacts/delete.php
$hubSpot->crm()->contacts()->basicApi()->archive($_GET['id']);
// src/actions/contacts/export.php
$hubSpot->crm()->contacts()->getAll();
</pre>
<?php }
if (count($contactsPage->getResults()) > 0) {
    ?>
<table class="contacts-list">
  <thead>
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Name</th>
    <th></th>
  </tr>
  </thead>
  <tbody>

  <?php foreach ($contactsPage->getResults() as $contact) { ?>
    <tr>
        <td><a href="/contacts/show?id=<?php echo $contact['id']; ?>"><?php echo $contact->getId(); ?></a></td>
        <td><?php echo htmlentities($contact->getProperties()['email']); ?></td>
        <td><?php echo htmlentities($contact->getProperties()['firstname'].' '.$contact->getProperties()['lastname']); ?></td>
        <td><a class="button" href="/contacts/delete?id=<?php echo $contact['id']; ?>">Delete</a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?php
} else {
        if (empty($search)) {
            ?>
    <h3>No Contacts have been added yet.</h3>
<?php
        } else { ?>
    <h3>Contact not found.</h3>
<?php
    }
    }
?>
<div>
  <a id="contact-new" href="/contacts/new">
    <input class="button-primary"  type="button" value="New Contact">
  </a>
    <a id="contacts-export" href="/contacts/export">
        <input class="button-primary" type="button" value="Export All Contacts To CSV">
    </a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
