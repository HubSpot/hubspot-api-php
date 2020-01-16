<?php
/**
 * @var array                                         Already associated Contacts
 * @var CollectionResponseWithTotalSimplePublicObject $contactList Contacts
 */
include __DIR__.'/../_partials/header.php'; ?>
<form>
    <fieldset>
        <input type="text" name="search" placeholder="Search.." id="search" value="<?php echo htmlentities($search); ?>">
        <input type="hidden" name="companyId" value="<?php echo htmlentities($companyId); ?>">
    </fieldset>
</form>
<pre>
// src/actions/contacts/list.php
$hubSpot->crm()->objects()->associationsApi()
    ->getAssociations(
        ObjectType::COMPANIES,
        $id,
        ObjectType::CONTACTS
    );
</pre>
<?php if (count($contactList->getResults()) > 0) { ?>
<form method="post" action="/contacts/manage.php?companyId=<?php echo $companyId; ?>">
    <table>
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
            <td><?php echo htmlentities($contact->getProperties()['firstname'].' '.$contact->getProperties()['firstname']); ?></td>
            <td><?php if (in_array($contact->getId(), $associatedContacts)) {?>Associated<?php } else { ?>-<?php } ?></td>
            <td><input type="checkbox" name="contactsIds[<?php echo htmlentities($contact->getId()); ?>]" /></td>
        </tr>
      <?php }?>
      </tbody>
    </table>
    <input type="hidden" name="companyId" value="<?php echo htmlentities($companyId); ?>" />

<pre>
// src/actions/contacts/manage.php
HubspotClientHelper::createFactory()->crm()->objects()->associationsApi()
    ->createAssociation(
        ObjectType::COMPANIES,
        $companyId,
        ObjectType::CONTACTS,
        $id
    );
HubspotClientHelper::createFactory()->crm()->objects()->associationsApi()
    ->archiveAssociation(
        ObjectType::COMPANIES,
        $companyId,
        ObjectType::CONTACTS,
        $id
    );
</pre>
    <button type="submit" name="action" value="create">Add selected to company</button>
    <button type="submit" name="action" value="archive">Delete selected from Company</button>
</form>
<?php } else { ?> 
<h3>No contacts</h3>
<?php } ?>
<?php include __DIR__.'/../_partials/footer.php'; ?>
