<?php
include __DIR__.'/../_partials/header.php';

$search = array_key_exists('search', $_GET);
?>

<?php if (array_key_exists('send', $_GET) && $_GET['send']) { ?>
<h4 class="success-message">Successfully sent to selected contacts</h4>
<?php } ?>

<h3 class="text-center">Select contacts to send the invitation to</h3>

<?php if ($search) { ?>
<pre>
// src/actions/invitations/contacts.php
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

<form id="search-form">
    <fieldset>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
        <input type="text" name="search" placeholder="Search by email.." id="search" value="<?php echo $_GET['search']; ?>">
    </fieldset>
</form>

<?php if (!$search) { ?>
<pre>
// src/actions/invitations/contacts.php
$hubSpot->crm()->contacts()->basicApi()->getPage()
</pre>
<?php }
if (count($contacts->getResults()) > 0) {
    ?>
<form method="post" action="/invitations/send?id=<?php echo $_GET['id']; ?>">
    <table class="contacts-list">
        <thead>
            <tr>
                <th></th>
                <th>Email</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts->getResults() as $contact) { ?>
                <tr>
                    <td><input type="checkbox" name="contactIds[]" value="<?php echo htmlentities($contact->getId()); ?>"/> </td>
                    <td><?php echo htmlentities($contact->getProperties()['email']); ?></td>
                    <td><?php echo htmlentities($contact->getProperties()['firstname'].' '.$contact->getProperties()['lastname']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="submit" value="Send to selected contact lists" />
</form>
<?php
} else {
        if ($search) {
            ?>
    <h3>No Contacts have been added yet.</h3>
<?php
        } else { ?>
    <h3>Contact not found.</h3>
<?php
    }
    }

include __DIR__.'/../_partials/footer.php';

?>
