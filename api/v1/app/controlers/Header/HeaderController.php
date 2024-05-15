<?php
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
class HeaderController extends ABController
{
    private $view;
    private $model;
    function __construct()
    {
        $this->view = new View;
        $this->model = new ProductCart();
        $this->model->con_process();
        
    }
    private function get_cart_products()
    {
        if($this->model->res->rowCount() <= null)
        {
            $this->view->render("/webbshop/standard/header2/nocart");
        }
        else
        {
            $this->render_info("product", "cart", $this->model->res);
        }
    }
    public function show()
    {
        $this->view->render("/webbshop/standard/header2/headerstart");
        $this->view->render("/webbshop/standard/header2/headermiddle");
        $this->get_cart_products();
        $this->view->render("/webbshop/standard/header2/headerend");
    }
}