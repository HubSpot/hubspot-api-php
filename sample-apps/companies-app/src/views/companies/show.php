<?php include __DIR__.'/../_partials/header.php'; ?>

<?php
      if (isset($errorResponse)) {
          include __DIR__.'/../_partials/error_response.php';
          exit();
      }
?>

<div class="row">
    <div class="column">
        <h3>Company Properties</h3>

        <?php if ($_GET['updated']) { ?>
            <h3 class="alert-success">Successfully updated Company properties</h3>
        <?php } elseif ($_GET['created']) { ?>
            <h3 class="alert-success" '>Successfully created Company</h3>
        <?php } ?>

        <?php if (isset($id)) { ?>
<pre>
// src/actions/companies/show.php
$hubSpot->crm()->objects()->basicApi()
    ->getById(ObjectType::COMPANY, $id)
</pre>
        <?php } ?>

            <form method="post" action="<?php
            if (isset($id)) {
                ?>/companies/show.php?id=<?php 
                echo $id;
            } else {
            ?>/companies/new.php<?php } ?>">
            <fieldset>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $company->getProperties()['name']; ?>">
                
                <label for="domain">Domain</label>
                <input type="text" name="domain" id="domain" value="<?php echo $company->getProperties()['domain']; ?>">


                <?php if (isset($id)) { ?>
<pre>
// src/actions/companies/show.php
$hubSpot->companies()->update($companyId, $companyProperties);
</pre>
                <?php } else { ?>
<pre>
// src/actions/companies/show.php
$hubSpot->companies()->create($companyProperties);
</pre>

                <?php } ?>
                <input class="button-primary" type="submit" value="Save">
            </fieldset>
        </form>

    </div>

    <?php if (isset($contacts)) { ?>
    <div class="column">
            <h3>Contacts</h3>

            <?php if ($_GET['contactsAdded']) { ?>
                <h3 class="alert-success">Successfully added contacts</h3>
            <?php } ?>
            <?php if ($_GET['contactsDeleted']) { ?>
                <h3 class="alert-success">Successfully deleted contacts</h3>
            <?php } ?>
<pre>
// src/actions/companies/show.php
$hubSpot->crmAssociations()->get(
        $id,
        $hubSpot->crmAssociations()::COMPANY_TO_CONTACT
    )->getData();
</pre>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($contacts as $contact) { ?>
                    <tr>
                        <td><?php echo htmlentities($contact['id']); ?></td>
                        <td><?php echo htmlentities($contact['name']); ?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

            <a href="/companies/contacts.php?companyId=<?php echo htmlentities($id); ?>">
                <input class="button-primary" type="button" value="Manage Contacts">
            </a>
    </div>
    <?php } ?>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
