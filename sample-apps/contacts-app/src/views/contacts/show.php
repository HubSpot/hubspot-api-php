<?php include __DIR__.'/../_partials/header.php'; ?>

<?php
      if (isset($errorResponse)) {
          include __DIR__.'/../_partials/error_response.php';
      } elseif ($updated) {
          echo "<h3 class='alert-success'>Successfully updated Contact properties</h3>";
      }
?>

<div class="row">
    <div class="column">
        <?php include __DIR__.'/../properties/contacts_properties_list.php'; ?>
    </div>
    <div class="column">
    </div>

</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
