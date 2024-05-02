<?php
require_once(__DIR__ .'/../ABController.php');
require_once(__DIR__ .'/../../views/View.php');
require_once(__DIR__ .'/../../views/ViewProduct.php');
require_once(__DIR__ .'/../../modles/Product/ProductSmall.php');
require_once(__DIR__ .'/../Header/HeaderController.php');
class HomeController extends ABController
{
    ##################################################(Vars)#####################################
    private $view;
    private $model;
    private $header;
    ##################################################(construct)#################################
    public function __construct()
    {
        $this->view = new View;
        $this->header = new HeaderController;
        //if ( ! class_exists('ProductSmall')) die('There is no hope!');
        $this->model = new ProductSmall("", "");
    }
    ##################################################(Functions)####################################
    private function show_products()
    {
        $this->render_info("product", "small", $this->model->res);
        //for every object in $result
        //render
    }
    public function show()
    {
        $this->header->show();
        $this->view->render("/webbshop/home/home");
        $this->show_products();
        $this->view->render("/webbshop/standard/footer");
        //
    }
}