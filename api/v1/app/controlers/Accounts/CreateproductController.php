<?php 
require_once( __DIR__ .'/../../modles/User/Client.php');
require_once( __DIR__ .'/../../modles/product/ProductCreate.php');
require_once(__DIR__ .'/../../views/View.php');
require_once(__DIR__ .'/../ABController.php');
require_once __DIR__ .'/../Header/HeaderController.php';
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
        $this->accountmodel->con_get("user");
        while($result = $this->accountmodel->res->fetch(PDO::FETCH_ASSOC))
        {
            $_SESSION['username'] = $result['account_name']; //<-- Could not find anny better solution. Will try to fix
        }
        $this->render_info("user", "regular", $this->accountmodel->res);
    }
    private function render_subject_options()
    {
        $this->productmodel->con_get_subj();
        $this->render_info("options", "regular", $this->productmodel->res);
    }
    public function create()
    {
        if(!isset($_FILES['image']))
        {
            echo("still something wrong");
        }
        print_r($_FILES['image']);
        $data = file_get_contents($_FILES['image']['tmp_name']);
        print_r($_FILES['image']['tmp_name']);
        echo("simple echo:" . $_FILES['image']['tmp_name']);
        $this->productmodel->create_product($_POST['title'], $_POST['subject'], $data, $_POST['description'], $_POST['price'], $_SESSION['username']);
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