<?php

class CartController extends ABController
{
    private $view;
    private $model;
    private array $products;
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
        $this->view->render("/standard/cart/cartstart");
        $this->get_cart_products();
        $this->view->render("/standard/cart/cartend");
    }
}