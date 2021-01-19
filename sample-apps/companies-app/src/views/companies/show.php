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
$hubSpot->crm()->companies()->basicApi()
    ->getById($id);
</pre>
        <?php } ?>

            <form method="post" action="<?php
            if (isset($id)) {
                ?>/companies/show?id=<?php
                echo $id;
            } else {
                ?>/companies/new<?php
            } ?>">
            <fieldset>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $company->getProperties()['name']; ?>">
                
                <label for="domain">Domain</label>
                <input type="text" name="domain" id="domain" value="<?php echo $company->getProperties()['domain']; ?>">


                <?php if (isset($id)) { ?>
<pre>
// src/actions/companies/show.php
$hubSpot->crm()->companies()->basicApi()
    ->update($id, $company);
</pre>
                <?php } else { ?>
<pre>
// src/actions/companies/show.php
$hubSpot->crm()->companies()->basicApi()
    ->create($company);
</pre>

                <?php } ?>
                <input id="save" class="button-primary" type="submit" value="Save">
            </fieldset>
        </form>

    </div>
<?php if (isset($id)) { ?>
    <div class="column">
            <h3>Contacts</h3>
            <?php
            if (isset($_GET['action'])) {
                if ('create' == $_GET['action']) { ?>
                <h3 class="alert-success">Successfully added contacts</h3>
            <?php } ?>
            <?php if ('archive' == $_GET['action']) { ?>
                <h3 class="alert-success">Successfully deleted contacts</h3>
            <?php
                }
            }
            ?>
<pre>
// src/actions/companies/show.php
$hubSpot->crm()->associations()->batchApi()
    ->readBatch(
        ObjectType::COMPANIES,
        ObjectType::CONTACTS,
        $inputId
    );
</pre>
            <?php if (!empty($contacts)) { ?>
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
            <?php } ?>
            <a href="/contacts/list?companyId=<?php echo htmlentities($id); ?>">
                <input id="manageContacts" class="button-primary" type="button" value="Manage Contacts">
            </a>
    </div>
<?php } ?>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
