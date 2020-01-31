<?php include __DIR__.'/../_partials/header.php'; ?>



<form action="/companies/search.php">
    <fieldset>
        <input type="text" name="search" placeholder="Search by domain.." id="search" value="<?php echo $_GET['search']; ?>">
    </fieldset>
</form>


<?php if (!isset($_GET['search'])) { ?>
<pre>
// src/actions/companies/list.php
$hubSpot->crm()->companies()->basicApi()->getPage();
// src/actions/companies/delete.php
$hubSpot->crm()->companies()->basicApi()->archive($_GET['id']);
</pre>
<?php } ?>

<table id="companiesList">
  <thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Domain</th>
    <th></th>
  </tr>
  </thead>
  <tbody>

  <?php foreach ($companiesPage->getResults() as $company) { ?>
    <tr>
        <td><a class="showCompany" href="/companies/show.php?id=<?php echo htmlentities($company->getId()); ?>"><?php echo htmlentities($company->getId()); ?></a></td>
        <td><?php echo htmlentities($company->getProperties()['name']); ?></td>
        <td><?php echo htmlentities($company->getProperties()['domain']); ?></td>
        <td><a class="deleteBtn button" href="/companies/delete.php?id=<?php echo htmlentities($company->getId()); ?>">Delete</a></td>
    </tr>
  <?php
}?>
  </tbody>
</table>

<div>
    <a id="newCompany" href="/companies/new.php">
        <input class="button-primary" type="button" value="New Company">
    </a>
</div>


<?php include __DIR__.'/../_partials/footer.php'; ?>
