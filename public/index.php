<?php
session_start();
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
    case 'user-connect':
        Routeur::route('ConnectUser', $action);
        break;
    case 'new-user':
        Routeur::route('UserRegister', $action);
        break;


    default:
        ErrorController::error404($page);
}
?>


