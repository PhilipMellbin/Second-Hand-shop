<?php
require_once('Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/LoginUser.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php');
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/Header/HeaderController.php';
class createproduct extends ABController
{
    private $view;
    private $model;
    public $product;
    private $header;
    public function __construct()
    {
        $this->view = new view;
        $this->model = new ProductCreate();
        $this->header = new HeaderController();
    }
    public function render_subject_options()
    {
        $this->model->get_subjects();
        $this->render_info("options", "regular", $this->model->res);

    }
    public function create_product()
    {
        $this->product->subject = $_POST['subject'];
        $this->product->type = $_POST['type'];
        $this->product->title = $_POST['title'];
        $this->product->description = $_POST['description'];
        $this->product->price = $_POST['price'];
        $this->product->publisher = $_POST['publisher'];
        $this->model->create_product($this->product);
    }
    public function show()
    {
        $this->header->show();
    }
}