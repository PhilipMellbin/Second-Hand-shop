<?php
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php';
class ErrorController extends ABController
{
    private $view;
    public function __construct()
    {
        $this->view = new View;
    }
    public function show()
    {
       $msg = isset($_GET['msg']) ? $_GET['msg'] : '404';
       http_response_code($msg);
       $this->view->render("/standard/header"); 
       $this->view->render("/error/$msg"); 
       $this->view->render("/standard/footer"); 
    }
}