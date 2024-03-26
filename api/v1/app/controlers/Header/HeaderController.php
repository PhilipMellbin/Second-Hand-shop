<?php
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/Header/CartController.php');
class HeaderController extends ABController
{
    private $cartccontroller;
    private $view;
    private $comitme;
    public function __construct()
    {
        $this->cartccontroller = new CartController();
        $this->view = new View();
    }
    public function show()
    {
        $this->view->render("standard/header/headerstart");
        $this->view->render("standard/header/headermiddle");
        $this->cartccontroller->show();
        $this->view->render("standard/header/headerend");
    }
}