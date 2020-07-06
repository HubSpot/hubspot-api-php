<?php

if (isset($_GET['token'])) {
    $_SESSION['trello_token'] = $_GET['token'];
}

header('Location: /');
