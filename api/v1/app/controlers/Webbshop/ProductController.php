<?php
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/ProductStandard.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/ProductSmall.php';
require_once(__DIR__ .'/../../views/View.php');
require_once(__DIR__ .'/../../views/ViewProduct.php');


class ProductController extends ABController
{
    private $view;
    private $model;
    private $product;
    private $product_subject;
    private $header;

    public function __construct()
    {
        $this->header = new HeaderController;
        $this->view = new View;
        if(!isset($_GET['prod_id'])) //if there is no product id, send to error.
        {
            header("Location: http://localhost:80/Second_Academia_Shop/api/v1/public_html/index.php?page=error&msg=404");
        }
        else
        {
            $this->model = new ProductStandard($_GET['prod_id']);
            $this->model->con_process();
        }
    }
    private function get_main_product()
    {
        while($result = $this->model->res->fetch(PDO::FETCH_ASSOC)) #!!! Should make shure that it also checks if results are valid
        {
            $this->product = new ViewProduct($result);
        }
    }

    private function show_main_product() //Main product info
    {
        $this->get_main_product();
        $this->product->render_product("standard");
        $this->product_subject = $this->product->product_subject;
        $this->model = new ProductSmall($this->product_subject, "BySubject");
    }

    private function show_similar_product() //similar products
    {
        $this->render_info("product", "small", $this->model->res);
    }

    private function show_product()
    {
        $this->show_main_product();
        $this->show_similar_product();
    }
    public function add_to_cart() #!!! Is it better to have the function in product controller, or should it be added to the checkout controller?
    {
        $this->model = new ProductStandard($_GET['prod_id']);
        $this->get_main_product();
        $this->model->con_add_to_cart($this->product);
        header('location: index.php?page=checkout');
    }
    public function show()
    {
        $this->header->show();
        $this->show_product();
        $this->view->render("/webbshop/standard/footer");
    }
}
