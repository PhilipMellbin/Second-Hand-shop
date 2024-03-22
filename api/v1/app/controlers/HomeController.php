<?php
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/ViewProduct.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/ProductSmall.php';
class HomeController extends ABController
{
    private $view;
    private $model;
    private array $products;

    public function __construct()
    {
        $this->products = [];
        $this->view = new View;
        //if ( ! class_exists('ProductSmall')) die('There is no hope!');
        $this->model = new ProductSmall("", "");
    }
    private function show_products()
    {
        $this->render_products("small", $this->model->res);
        $this->model->end();
        //for every object in $result
        //render
    }
    public function show()
    {
        $this->view->render("/standard/header");
        $this->view->render("/home/home");
        $this->show_products();
        $this->view->render("/standard/footer");
        //
    }
}