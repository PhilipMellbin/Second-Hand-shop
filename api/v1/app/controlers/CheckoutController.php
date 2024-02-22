<?php


class CheckoutController
{
    private $view;
    private $model;
    private array $products;

    public function __construct()
    {
        $this->view = new View;
        $this->model = new ProductCart(session_id());
        $this->products = [];
        //fill in the models
    }
    private function get_cart_products()
    {
        if($this->model->res == null)
        {
            $this->view->render("no_product");
        }
        else
        {
            while($result = $this->model->res->fetch(PDO::FETCH_ASSOC))
            {
                array_push($this->products, new ViewProduct($result));
            }
            foreach($this->products as $product)
            {
                $product->render_product("cart");
            }
            $this->view->render("products_end");
            //for every object in $result
            //render
        }
        $this->model->end();
        //check results
        //if there are no results...render no_product
        //else render as per usual
    } 
    public function show()
    {

    }
}