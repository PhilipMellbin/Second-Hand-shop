<?php

require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/ProductSold.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/Client.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php');
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/Header/HeaderController.php';
class AccounthomeController extends ABController
{
    private $view;
    private $model;
    private $header;
    private $account;
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
            $this->model = new Client();
        }
    }
    public function show_account_info()
    {
        $this->model->get_user_info($_SESSION['email']);
        $this->render_info("user", "regular", $this->model->res);
    }
    public function show_account_products()
    {
        $user = $this->objects[0];
        $username = $user->username;
        $this->model->get_user_products($username);
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