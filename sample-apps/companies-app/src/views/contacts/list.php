<?php
/**
 * @var array                                         Already associated Contacts
 * @var CollectionResponseWithTotalSimplePublicObject $contactList Contacts
 */
include __DIR__.'/../_partials/header.php'; ?>
<form>
    <fieldset>
        <input type="text" name="search" placeholder="Search.." id="search" value="<?php
        if (isset($_GET['search'])) {
            echo htmlentities($_GET['search']);
        }?>">
        <input type="hidden" name="companyId" value="<?php echo htmlentities($companyId); ?>">
    </fieldset>
</form>
<pre>
// src/actions/contacts/list.php
$hubSpot->crm()->associations()->batchApi()
    ->readBatch(
        ObjectType::COMPANIES,
        ObjectType::CONTACTS,
        $inputId
    );
</pre>
<?php if (count($contactList->getResults()) > 0) { ?>
<form method="post" action="/contacts/manage?companyId=<?php echo $companyId; ?>">
    <table id="contactsList">
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Selected</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($contactList->getResults() as $contact) { ?>
        <tr>
            <td><?php echo htmlentities($contact->getId()); ?></td>
            <td><?php echo htmlentities($contact->getProperties()['firstname'].' '.$contact->getProperties()['lastname']); ?></td>
            <td><?php if (in_array($contact->getId(), $associatedContacts)) {?>Associated<?php } else { ?>-<?php } ?></td>
            <td><input type="checkbox" name="contactsIds[<?php echo htmlentities($contact->getId()); ?>]" /></td>
        </tr>
      <?php }?>
      </tbody>
    </table>
    <input type="hidden" name="companyId" value="<?php echo htmlentities($companyId); ?>" />

<pre>
// src/actions/contacts/manage.php
//Add
$hubSpot->crm()->associations()->batchApi()
    ->createBatch(
        ObjectType::COMPANIES,
        ObjectType::CONTACTS,
        $request
    );
//Delete
$hubSpot->crm()->associations()->batchApi()
    ->archiveBatch(
        ObjectType::COMPANIES,
        ObjectType::CONTACTS,
        $request
    );
</pre>
    <button type="submit" name="action" value="create">Add selected to company</button>
    <button type="submit" name="action" value="archive">Delete selected from Company</button>
</form>
<?php } else { ?> 
<h3>No contacts</h3>
<?php } ?>
<?php include __DIR__.'/../_partials/footer.php'; ?>
