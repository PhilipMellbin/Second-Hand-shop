<?php
//Under construction!
require_once(__DIR__ .'/../../modles/Product/ProductCart.php');
require_once(__DIR__ .'/../../modles/User/Customer.php');
require_once(__DIR__ .'/../../views/View.php');
require_once(__DIR__ .'/../../views/ViewProduct.php');
class CheckoutController extends ABController
{
    ##################################################(Vars)#####################################
    private $view;
    private $model;
    private $model_customer;
    private $header;
    ##################################################(construct)#################################
    public function __construct()
    {
        $this->view = new View;
        $this->model = new ProductCart();
        $this->header = new HeaderController;
        //fill in the models
    }
    ##################################################(Functions)####################################
    private function get_cart_products()
    {
        $this->model->con_process();
        ############################(1: check if items are in cart and render acordingly)############################
        $this->view->render("/webbshop/checkout/incart/incartstart");
        if($this->model->res == null)
        {
            $this->view->render("/webbshop/checkout/incart/incartnoproduct");
            $this->view->render("/webbshop/checkout/incart/incartend");
            $this->view->render("/webbshop/checkout/credentials/credentialsunfilled");
        }
        else
        {
            $this->render_info("product", "cart", $this->model->res);
            $this->view->render("/webbshop/checkout/incart/incartend");
            $this->view->render("/webbshop/checkout/credentials/credentials");
            //for every object in $result
            //render
        }
        #############################################################################################
    }
    public function fill_credentials()
    {
        /*###############################################################(2: Fill in credentials, make shure they are filled)#############################3333
        $this->model_customer = new Customer;
        $this->model_customer->fill_credentials();
        $_POST['credentials_filled'] = True; //to render the swish section
        //$this->model_customer->swish(); <--Swish isn't working for me, will try to find alternative payment method
        header('location: Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/index.php?page=checkout');
        ###############################################################################################################################*/
    } 
    private function get_swish()
    {
        ###################################################(3: Swish. Does not work fully yet!)########################################
        if(isset($_POST['credentials_filled']))
        {
            $this->view->render("/checkout/swish/swishcontainer");
            //send_swish_code
        }
        else
        {
            $this->view->render("/webbshop/checkout/swish/swishunfilled");
        }
        ############################################################################################################################
    }
    /*public function finish_payment()
    {
        ###############################################(4: self explanitory)###
        $this->model_customer->payment($this->products);
        ########################################################################
    }*/
    public function delete_cart() //Come up with a beter alternative!!
    {
        #############################(Delete cart)##########################################
        $this->model->con_delete();
        ###########################################################################################

    }
    public function show()
    {
        ##########################################################(Show)#############################
        $this->header->show();
        $this->view->render("/webbshop/checkout/checkoutstart");
        $this->get_cart_products();
        $this->get_swish();
        $this->view->render("/webbshop/checkout/checkoutend");
        $this->view->render("/webbshop/standard/footer"); 
        ##########################################################(Show)#############################
    }
}