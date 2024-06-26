<?php

session_start([
    'cookie_httponly' => true
    //'cookie_secure' => true // Endast vid HTTPS
]);

###########################################(Controllers)############################
include '../app/controlers/standard/ErrorController.php';
include '../app/controlers/Webbshop/HomeController.php';
include '../app/controlers/Webbshop/ProductController.php';
include '../app/controlers/Webbshop/CheckoutController.php';
include '../app/controlers/Accounts/LoginController.php';
include '../app/controlers/Accounts/AccounthomeController.php';
include '../app/controlers/Accounts/CreateproductController.php';
#######################################################################################

ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/../app/Controllers/' . $class_name . '.php'; //Prevents double rendering
    if (!file_exists($file)) {
        $file = __DIR__ . '/../app/Views/' . $class_name . '.php';
    }
    if (file_exists($file)) {
        require_once $file;
    }
});

$view = new View();
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$method = isset($_GET['method']) ? $_GET['method'] : 'show';
$controllerClassName = ucfirst(strtolower($page)) . 'Controller';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $controller = new $controllerClassName($view);
    /*To add:
    add to cart
    remove from cart
    create recite */
    switch($_POST['action']) 
    {
        case 'add_cart':
            $controller->add_to_cart();
            break;
        case 'delete_cart':
            $controller->delete_cart();
            break;
        case 'swish':
            $controller->swish();
            break;
        case 'login':
            $controller->login();
            break;
        case 'create_account':
            $controller->create_account();
            break;
        case 'logout':
            $controller->logout();
            break;
        case 'create':
            $controller->create();
            break;
        case 'signup':
            $controller->create_account();
    }//what if i instead of using switch case instead did the folowing:
        /*$func = $_POST['action']
        $controller->$func
         */
    //I would have to redo everything, but there would be way less code and could probably run quicker. Will do this when i'm done with create

} elseif (class_exists($controllerClassName)) {
    $controller = new $controllerClassName($view);
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        header("HTTP/1.0 404 Not Found");
        $errorController = new ErrorController($view);
        $errorController->show();
    }
} else {
    header("HTTP/1.0 404 Not Found");
    $errorController = new ErrorController($view);
    $errorController->show();
}