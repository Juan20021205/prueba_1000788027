<?php
define('BASE_URL', 'Views' . "/");
require_once 'Utiles/Database.php';
require_once 'Controllers/Palindromes.controller.php';

if (isset($_GET['a'])) {

    $controller = new PalindromerController();
    $action = $_GET['a'];
    call_user_func(array($controller, $action));
} else {

    $controller = new PalindromerController();
    call_user_func(array($controller, 'index'));
}
