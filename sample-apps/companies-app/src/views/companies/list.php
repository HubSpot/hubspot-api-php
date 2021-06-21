<?php
include __DIR__.'/../_partials/header.php';

if (isset($_GET['search'])) { ?>
<pre>
// src/actions/companies/search.php
$filter = new Filter();

$filter->setPropertyName('domain');
$filter->setOperator('EQ');
$filter->setValue($_GET['search']);

$filterGroup = new FilterGroup();
$filterGroup->setFilters([$filter]);

$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilterGroups([$filterGroup]);

$companiesPage = $hubSpot->crm()->companies()->searchApi()->doSearch($searchRequest);
</pre>
<?php } ?>

<form action="/companies/search">
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
        <td><a class="showCompany" href="/companies/show?id=<?php echo htmlentities($company->getId()); ?>"><?php echo htmlentities($company->getId()); ?></a></td>
        <td><?php echo htmlentities($company->getProperties()['name']); ?></td>
        <td><?php echo htmlentities($company->getProperties()['domain']); ?></td>
        <td><a class="button" href="/companies/delete?id=<?php echo htmlentities($company->getId()); ?>">Delete</a></td>
    </tr>
  <?php
}?>
  </tbody>
</table>

<div>
    <a id="newCompany" href="/companies/new">
        <input class="button-primary" type="button" value="New Company">
    </a>
</div>


<?php include __DIR__.'/../_partials/footer.php'; ?>
