<?php
/**
 * Доступные страницы на сайте
 *
 * @var array $availableLinks
 */
$availableLinks = include './availableLinks.php';

require './autoload.php';

function check($availableLinks) {
    if (!isset($_GET['page'])) {
        throw new badRequest();
    }

    $try = new Router($availableLinks);
    $tryResult = $try->isAvailablePage($_GET['page']);

    if (!$tryResult) {
        throw new NotFound();
    }

    return '<p>Вы находитесь на странице <b>' . $_GET['page'] . '</b></p><br>';
}
    try {
        echo check($availableLinks);
    }
    catch (badRequest $e) {
        echo $e->getMessage() . '<br/>';
        header('Location: error.php', true, 400);
    }
    catch (NotFound $e) {
        echo $e->getMessage() . '<br/>';
        header('Location: 404.php', true, 404);
    }



