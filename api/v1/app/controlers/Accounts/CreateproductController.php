<?php
require_once( __DIR__ .'/../../modles/User/Client.php');
require_once( __DIR__ .'/../../modles/product/ProductCreate.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php');
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/Header/HeaderController.php';
class createproduct extends ABController
{
    private $view;
    private $productmodel;
    private $accountmodel;
    public $product;
    private $header;
    public function __construct()
    {
        if(!isset($_SESSION['email']))
        {
            header('location: index.php?page=login');
        }
        $this->view = new view;
        $this->productmodel = new ProductCreate();
        $this->header = new HeaderController();
        $this->accountmodel = new Client();
    }
    private function show_account_info()
    {
        $this->accountmodel->get_user_info($_SESSION['email']);
        $this->render_info("user", "regular", $this->accountmodel->res);
    }
    private function render_subject_options()
    {
        $this->productmodel->get_subjects();
        $this->render_info("options", "regular", $this->productmodel->res);

    }
    public function create_product()
    {
        $this->product->subject = $_POST['subject'];
        $this->product->type = $_POST['type'];
        $this->product->title = $_POST['title'];
        $this->product->description = $_POST['description'];
        $this->product->price = $_POST['price'];
        $this->product->publisher = $_POST['publisher'];
        $this->productmodel->create_product($this->product);
    }
    public function show()
    {
        $this->header->show();
        $this->show_account_info();
        $this->view->render("/account/create/newproductstart");
        $this->render_subject_options();
        $this->view->render("/account/create/newproductend");
        $this->view->render("/webbshop/standard/footer");
    }
}