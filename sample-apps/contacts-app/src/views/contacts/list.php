<?php include __DIR__.'/../_partials/header.php'; ?>

<table class="contacts-list">
  <thead>
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Name</th>
  </tr>
  </thead>
  <tbody>

  <form id="search-form" action="/contacts/search.php">
      <fieldset>
          <input type="text" name="search" placeholder="Search.." id="search" value="<?php echo $search; ?>">
      </fieldset>
  </form>

  <?php foreach ($contactsPage->getResults() as $contact) { ?>
    <tr>
      <td><a href="/contacts/show.php?notUpdated=true&vid=<?php echo $contact['vid']; ?>"><?php echo $contact->getId(); ?></a></td>
        <td><?php echo htmlentities($contact->getProperties()['email']); ?></td>
      <td><?php echo htmlentities($contact->getProperties()['firstname'].' '.$contact->getProperties()['lastname']); ?></td>
    </tr>
  <?php }?>
  </tbody>
</table>

<div>
  <a id='contact-new' href="/contacts/new.php">
    <input class="button-primary"  type="button" value="New Contact">
  </a>
    <a id='contactsExport' href="/contacts/export.php">
        <input class="button-primary" type="button" value="Export To CSV">
    </a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
