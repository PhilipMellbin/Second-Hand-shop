<?php

require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/ProductSold.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php');
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/Header/HeaderController.php';
class AccounthomeController extends ABController
{
    private $view;
    private $model;
    private $header;
    public function __construct()
    {
        if(!isset($_SESSION['email']))
        {
            header('location: http://localhost:2005/Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/index.php?page=login');
        }
        else
        {
            $this->header = new HeaderController;
            $this->view = new View;
            $this->model = new ProductSold();
        }
    }
    private function get_sold_products()
    {
    }
    public function show()
    {
        $this->header->show();
        $this->view->render("/account/accounthome/accounthome.php");
    }
    //
}