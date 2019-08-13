<?php
/**
 * Доступные страницы на сайте
 *
 * @var array $availableLinks
 */
$availableLinks = include './availableLinks.php';

require './router.php';

function check($availableLinks) {
    if (!isset($_GET['page'])
}


