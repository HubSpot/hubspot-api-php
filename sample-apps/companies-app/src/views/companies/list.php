<?php include __DIR__.'/../_partials/header.php'; ?>

<?php if (isset($_GET['search'])) { ?>
<pre>
// src/actions/companies/search.php
$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilters([
    [
        'propertyName' => 'email',
        'operator' => 'EQ',
        'value' => $search,
    ],
]);
$hubSpot->crm()->objects()->searchApi()->doSearch(ObjectType::CONTACT, $searchRequest);
</pre>
<?php } ?>

<form action="/companies/search.php">
    <fieldset>
        <input type="text" name="search" placeholder="Search by domain.." id="search" value="<?php echo $_GET['search']; ?>">
    </fieldset>
</form>


<?php if (empty($searchDomain)) { ?>
<pre>
// src/actions/companies/list.php
$hubSpot->crm()->objects()->basicApi()->getPage(ObjectType::COMPANIES);
// src/actions/companies/delete.php
$hubSpot->crm()->objects()->basicApi()->archive(ObjectType::COMPANIES, $_GET['id']);
</pre>
<?php } ?>

<table>
  <thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Domain</th>
    <th></th>
  </tr>
  </thead>
  <tbody>

  <?php foreach ($companiesPage->getResults() as $company) {
    /** 
     * @var \HubSpot\Client\Crm\Objects\Model\SimplePublicObject $company
     */
    ?>
    <tr>
      <td><a href="/companies/show.php?id=<?php echo htmlentities($company->getId()); ?>"><?php echo htmlentities($company->getId()); ?></a></td>
      <td><?php echo htmlentities($company->getProperties()['name']); ?></td>
      <td><?php echo htmlentities($company->getProperties()['domain']); ?></td>
      <td><a class="button" href="/companies/delete.php?id=<?php echo htmlentities($company->getId()); ?>">Delete</a></td>
    </tr>
  <?php }?>
  </tbody>
</table>

<div>
    <a href="/companies/new.php">
        <input class="button-primary" type="button" value="New Company">
    </a>
</div>


<?php include __DIR__.'/../_partials/footer.php'; ?>
