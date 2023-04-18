<?php

require __DIR__ . '/require.php';




$page = isset($_GET['c']) ? Routeur::secureUrl($_GET['c']) : 'home';
$action = isset($_GET['a']) ? Routeur::secureUrl($_GET['a']) : 'index';

switch ($page) {
    case 'home':
        Routeur::route('HomeController', $action);
        break;
    case 'new-message':
        Routeur::route('MessageController', $action);
        break;
    case 'get-messages':
        Routeur::route('GetMessages', $action);
        break;


    default:
        ErrorController::error404($page);
}
?>


