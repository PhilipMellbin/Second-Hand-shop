<?php
require_once( __DIR__ .'/../../modles/User/Client.php');
require_once( __DIR__ .'/../../modles/product/ProductCreate.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php');
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/Header/HeaderController.php';
class CreateProductController extends ABController
{
    private $view;
    private $productmodel;
    private $accountmodel;
    public $product;
    private $header;
    private $username;
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
        while($result = $this->accountmodel->res->fetch(PDO::FETCH_ASSOC))
        {
            $this->username = $result['account_name']; //<-- Could not find anny better solution. Will try to fix
        }
        $this->render_info("user", "regular", $this->accountmodel->res);
    }
    private function render_subject_options()
    {
        $this->productmodel->get_subjects();
        $this->render_info("options", "regular", $this->productmodel->res);

    }
    public function create()
    {
        $this->productmodel->create_product($_POST['title'], $_POST['subject'], $_POST['img'], $_POST['description'], $_POST['price'], $this->username);
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