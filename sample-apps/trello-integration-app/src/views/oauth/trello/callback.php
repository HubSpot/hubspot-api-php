<?php include __DIR__.'/../../_partials/header.php'; ?>

    <script type="text/javascript">
        let token = window.location.href.split("token=")[1];
        window.location = "/oauth/trello/token?token=" + token;
    </script>

<?php include __DIR__.'/../../_partials/footer.php'; ?>
