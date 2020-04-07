<?php
/**
 * @var string
 */
include __DIR__.'/../_partials/header.php';
?>

<?php if (!empty($botLink)) { ?>

    <h4>Telegram bot:</h4>
    <a href="<?php echo $botLink; ?>" target="_blank"><?php echo $botLink; ?></a>

<?php } else { ?>

    <form method="post">
        <fieldset>
            <h4>To generate telegram link for specific contact please enter an email</h4>
            <input type="email" required placeholder="Email" id="email" name="email"">
            <input class="button-primary" type="submit" value="Generate link">
        </fieldset>
    </form>

<?php } ?>

<?php include __DIR__.'/../_partials/footer.php'; ?>
