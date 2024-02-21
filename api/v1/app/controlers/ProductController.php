<?php
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/app/modles/Product/ProductStandard.php';
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/app/modles/Product/ProductSmall.php';
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/app/views/View.php';
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/app/views/ViewProduct.php';


class ProductController extends ABController
{
    private $view;
    private $model;
    private $product;
    private array $products = [];
    private $product_subject;

    public function __construct()
    {
        $this->view = new View;
        if(!isset($_GET['prod_id']))
        {
            header("Location: http://localhost:80/Second_Academia_Shop/api/v1/public_html/index.php?page=error&msg=404");
        }
        else
        {
            $this->model = new ProductStandard($_GET['prod_id']);
        }
    }

    private function show_main_product() //Main product info
    {
        while($result = $this->model->res->fetch(PDO::FETCH_ASSOC))
        {
            $this->product = new ViewProduct($result);
            $this->product->render_product("standard");
            $this->product_subject = $this->product->product_subject;
            print_r($this->product);
        }
        $this->model->end();
        $this->model = new ProductSmall($this->product_subject, "BySubject");
    }

    private function show_similar_product() //similar products
    {
        while($result = $this->model->res->fetch(PDO::FETCH_ASSOC))
        {
            array_push($this->products, new ViewProduct($result));
        }
        foreach($this->products as $product)
        {
            $product->render_product("small");
            $this->product_subject = $product->product_subject;
        }
        $this->model->end();
    }

    private function show_product()
    {
        $this->show_main_product();
        $this->show_similar_product();
    }
    public function add_to_cart()
    {
        $this->model = new ProductStandard($_GET['prod_id']);
        print_r($this->product);
        /*$this->model->add_to_cart($this->product);
        $this->model->end();
        header('http://localhost:80/Second_Academia_Shop/api/v1/public_html/index.php?page=checkout');*/
    }
    public function show()
    {
        $this->view->render("/standard/header");
        $this->show_product();
        $this->view->render("/standard/footer");
    }
}
