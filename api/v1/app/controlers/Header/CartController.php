<?php
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/ProductCart.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/ViewProduct.php');
class CartController extends ABController
{
    private $view;
    private $model;
    function __construct()
    {
        $this->view = new View;
        $this->model = new ProductCart();
        
    }
    private function get_cart_products()
    {
        if($this->model->res == null)
        {
            $this->view->render("/side_pages/cart/nocart");
        }
        else
        {
            $this->render_products("cart", $this->model->res);
        }
    }
    function show()
    {
        $this->get_cart_products();
    }
}