<?php
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php';
class ErrorController extends ABController
{
    private $view;
    private $errorview;
    public function __construct()
    {
        $this->view = new View;
    }
    private function render_error()
    {
        $msg = isset($_GET['msg']) ? $_GET['msg'] : '404';
        switch($msg)
        {
            case '404':
                $this->view->render("/webbshop/error/404"); 
                break;
            case '403':
                $this->view->render("/webbshop/error/403");
                break;
            default:
                $this->view->render("/webbshop/error/standard_error");
                break;
        }
    }
    public function show()
    {
       $msg = isset($_GET['msg']) ? $_GET['msg'] : '404';
       http_response_code($msg);
       $this->view->render("/webbshop/standard/header"); 
       $this->render_error();
       $this->view->render("/webbshop/standard/footer"); 
    }
}