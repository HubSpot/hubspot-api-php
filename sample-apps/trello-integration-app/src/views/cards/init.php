<?php

use Helpers\UrlHelper;
use Helpers\WebhooksTrelloApi;
use Repositories\CardRepository;

include __DIR__.'/../_partials/header.php';

$baseUrl = UrlHelper::generateServerUri();
$fetchUrl = UrlHelper::getUrl('/trello/cards');
?>
    <div class="row">
        <div class="column">
            <h3>CRM extension card initialization<?php if (!empty($cardId)) {
    echo ' (card_id='.$cardId.')';
}?></h3>
            <ol>
                <?php if (empty($cardId)) { ?>
                  <li>New CRM extension card will be created (with "<?php echo CardRepository::CARD_TITLE; ?>" title)</li>
                <?php } ?>
                <li>"Data fetch URL" will be updated to <a href="<?php echo $fetchUrl; ?>"><?php echo $fetchUrl; ?></a></li>
                <li>"Deals" in "Target record types" section will be activated with "hs_object_id", "dealname" properties sent form HubSpot</li>
                <li>"Custom actions"->"Base URL" section will be updated with <a href="<?php echo $baseUrl; ?>"><?php echo $baseUrl; ?></a></li>
            </ol>
            <h3>Trello card webhooks initialization</h3>
            <ol>
                <li>Webhooks that was previously created by this application and match DB will be activated and updated with
                    <a href="<?php echo WebhooksTrelloApi::getCallbackUrl(); ?>"><?php echo WebhooksTrelloApi::getCallbackUrl(); ?></a> callback URL
                </li>
            </ol>
        </div>
    </div>

    <form method="post" class="text-center">
        <button type="submit">Continue</button>
    </form>

<?php include __DIR__.'/../_partials/footer.php'; ?>
