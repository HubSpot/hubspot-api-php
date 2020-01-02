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

        <?php if (isset($company)) { ?>
<pre>
// src/actions/companies/show.php
$hubSpot->companies()->getById($companyId)->getData();
</pre>
        <?php } ?>

        <form method="post" action="/companies/show.php">
            <fieldset>
                <?php if (isset($id)) { ?>
                    <input type="hidden" name="id" value="<?php echo htmlentities($id); ?>" />
                <?php } ?>
                <?php
                foreach ($formFields as $field) { ?>
                    <?php
                    $nameSanitized = htmlentities($field['name']);
                    $labelSanitized = htmlentities($field['label']);
                    $valueSanitized = htmlentities($field['value']);
                    ?>
                    <label for="<?php echo $nameSanitized; ?>"><?php echo $labelSanitized; ?></label>
                    <input type="text" name="<?php echo $nameSanitized; ?>" id="<?php echo $nameSanitized; ?>" value="<?php echo $valueSanitized; ?>">
                <?php } ?>

                <?php if (isset($company)) { ?>
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

    <div class="column">
        <?php if (isset($contacts)) { ?>
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
        <?php } ?>
    </div>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
