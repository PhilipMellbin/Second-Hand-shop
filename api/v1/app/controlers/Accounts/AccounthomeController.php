<?php

require_once( __DIR__ .'/../../modles/Product/ProductSold.php');
require_once( __DIR__ .'/../../modles/User/Client.php');
require_once(__DIR__ .'/../../views/View.php');
require_once(__DIR__ .'/../ABController.php');
require_once (__DIR__ .'/../Header/HeaderController.php');
class AccounthomeController extends ABController
{
    private $view;
    private $model;
    private $header;
    public function __construct()
    {
        if(!isset($_SESSION['email']))
        {
            header('location: index.php?page=login');
        }
        else
        {
            $this->header = new HeaderController;
            $this->view = new View;
            $this->model = new Client("");
        }
    }
    public function show_account_info()
    {
        $this->model->con_get("user");
        $this->render_info("user", "regular", $this->model->res);
    }
    public function show_account_products()
    {
        $_POST['username'] = $this->objects[0]->username;
        $this->model->con_get("products");
        $this->render_info("product", "small", $this->model->res);
        
    }
    public function logout()
    {
        $_SESSION['email'] = null;
        header("location: index.php?page=login");
    }
    public function show()
    {
        $this->header->show();
        $this->show_account_info();
        $this->view->render("/account/accounthome/accounthome");
        $this->show_account_products();
        $this->view->render("/account/accounthome/accounthomeend");
        $this->view->render("/webbshop/standard/footer");
    }
    //
}