<?php include __DIR__.'/../_partials/header.php'; ?>

<pre>
// src/actions/oauth/authorize.php - Generate URL for OAuth
use SevenShores\Hubspot\Utils\OAuth2;

$authUrl = OAuth2::getAuthUrl(
    'ClientID',
    'Redirect Uri',
    ['Scopes']
);
</pre>
<h3 class="text-center">In order to continue please authorize via OAuth</h3>
<div class="row authorize-button">
    <a class="button" href="/oauth/authorize">Authorize</a>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
