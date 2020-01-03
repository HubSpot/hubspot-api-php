<?php
/**
 * @var array Already associated Contacts
 * @var array $contacts Contacts
 */
include __DIR__.'/../_partials/header.php'; ?>

<pre>
// src/actions/companies/contacts.php
$hubSpot->contacts()->search($search)
</pre>
<form>
    <fieldset>
        <input type="text" name="search" placeholder="Search.." id="search" value="<?php echo htmlentities($search); ?>">
        <input type="hidden" name="companyId" value="<?php echo htmlentities($companyId); ?>"
    </fieldset>
</form>

<form method="post">
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
      <?php foreach ($contacts as $contact) { ?>
        <tr>
            <td><?php echo htmlentities($contact->vid); ?></td>
            <td><?php echo htmlentities($contact->properties->firstname->value.' '.$contact->properties->firstname->value); ?></td>
            <td><?php if (in_array($contact->vid, $associatedContacts)) {?>Associated<?php } else { ?>-<?php } ?></td>
            <td><input type="checkbox" name="contactsIds[<?php echo htmlentities($contact->vid); ?>]" /></td>
        </tr>
      <?php }?>
      </tbody>
    </table>
    <input type="hidden" name="companyId" value="<?php echo htmlentities($companyId); ?>" />

<pre>
// src/actions/companies/contacts.php
$hubSpot->crmAssociations()->create([
    'fromObjectId' => $contactId,
    'toObjectId' => $companyId,
    'category' => 'HUBSPOT_DEFINED',
    'definitionId' => CONTACT_TO_COMPANY_DEFINITION_ID,
])
</pre>
    <input type="submit" name="addToCompany" value="Add selected to company" />
    <input type="submit" name="deleteFromCompany" value="Delete selected from Company" />
</form>

<?php include __DIR__.'/../_partials/footer.php'; ?>
