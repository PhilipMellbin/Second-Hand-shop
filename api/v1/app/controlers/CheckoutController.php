<?php

require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/ProductCart.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/Customer.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/ViewProduct.php');
class CheckoutController
{
    private $view;
    private $model;
    private $model_customer;
    private array $products;

    public function __construct()
    {
        $this->view = new View;
        $this->model = new ProductCart();
        $this->products = [];
        //fill in the models
    }
    private function get_cart_products()
    {
        if($this->model->res == null)
        {
            $this->view->render("no_product");
            $this->view->render("/checkout/credentials/credentialsunfilled");
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
            $this->view->render("/checkout/credentials/credentials");
            //for every object in $result
            //render
        }
        $this->model->end();
        //check results
        //if there are no results...render no_product
        //else render as per usual
    }
    private function fill_credentials()
    {
        $this->model_customer = new Customer;
        $this->model_customer->fill_credentials();
        $_POST['credentials_filled'] = True;
        //$this->model_customer->swish();
        header('location: this_website');
        /* 

        - After fill credentials is compleated, load in this site again but with swish
        - Indication: Use a post variable?
        */
    } 
    private function get_swish()
    {
        if(isset($_POST['credentials_filled']))
        {
            $this->view->render("/checkout/swishcontainer");
        }
        else
        {
            $this->view->render("/checkout/swishunfilled");
        }
    }
    private function finish_payment()
    {
        $this->model_customer->compleate_payment();
    }
    public function show()
    {
        $this->view->render("/standard/header"); 
        $this->get_cart_products();
        $this->get_swish();
        $this->view->render("/standard/footer"); 
    }
}