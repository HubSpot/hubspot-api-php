<?php

use Helpers\OAuth2Helper;
use Helpers\TrelloOAuth;

include __DIR__.'/../_partials/header.php';
?>

<div class="row">
    <div class="column">
        <h3>Authorize via Trello</h3>
        <pre>
// src/actions/oauth/trello/autorize.php
// Generate URL for OAuth
Helpers\TrelloOAuth::getAuthUrl(
    $_ENV('TRELLO_API_KEY'),
    'callback url'
);
        </pre>
        <ol>
          <li>Go to <a href="https://trello.com/app-key" target="_blank">https://trello.com/app-key</a> page</li>
          <li>Add https://*.ngrok.io to "Allowed Resources" section</li>
          <li>Continue with <a class="button" href="/oauth/trello/authorize">Authorize</a></li>
        </ol>
        <?php if (TrelloOAuth::isAuthenticated()) { ?>
        <h4>Status: <span class="green">authorized</span></h4>
        <?php } else { ?>
        <h4>Status: not authorized</h4>
        <?php } ?>
    </div>

    <div class="column">
        <h3>Authorize via HubSpot</h3>
        <pre>
// src/actions/oauth/hubspot/authorize.php 
// Generate URL for OAuth
$authUrl = HubSpot\Utils\OAuth2::getAuthUrl(
    'ClientID',
    'Redirect Uri',
    ['Scopes']
);
        </pre>
        <a class="button" href="/oauth/hubspot/authorize">Authorize</a>
        <?php if (OAuth2Helper::isAuthenticated()) { ?>
        <h4>Status: <span class="green">authorized</span></h4>
        <?php } else { ?>
        <h4>Status: not authorized</h4>
        <?php } ?>
    </div>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
