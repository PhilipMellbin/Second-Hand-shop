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
        $this->view->render("/checkout/incart/incartstart");
        if($this->model->res == null)
        {
            $this->view->render("/checkout/incart/incartnoproduct");
            $this->view->render("/checkout/incart/incartend");
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
            $this->view->render("/checkout/incart/incartend");
            $this->view->render("/checkout/credentials/credentials");
            //for every object in $result
            //render
        }
        $this->model->end();
        //check results
        //if there are no results...render no_product
        //else render as per usual
    }
    public function fill_credentials()
    {
        $this->model_customer = new Customer;
        $this->model_customer->fill_credentials();
        $_POST['credentials_filled'] = True;
        //$this->model_customer->swish();
        header('location: Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/index.php?page=checkout');
        /* 

        - After fill credentials is compleated, load in this site again but with swish
        - Indication: Use a post variable?
        */
    } 
    private function get_swish()
    {
        if(isset($_POST['credentials_filled']))
        {
            $this->view->render("/checkout/swish/swishcontainer");
            //send_swish_code
        }
        else
        {
            $this->view->render("/checkout/swish/swishunfilled");
        }
    }
    public function finish_payment()
    {
        $this->model_customer->payment($this->products);
    }
    public function delete_cart() //Come up with a beter alternative!!
    {
        $prod_id = $_GET['prod_id'];
        if(str_contains($prod_id, "'"))
        {
            header('location: http://localhost:2005/Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/index.php?page=error&msg=403');
        }
        $this->model = new ProductCart();
        $this->model->delete();

    }
    public function show()
    {
        $this->view->render("/standard/header"); 
        $this->view->render("/checkout/checkoutstart");
        $this->get_cart_products();
        $this->get_swish();
        $this->view->render("/checkout/checkoutend");
        $this->view->render("/standard/footer"); 
    }
}