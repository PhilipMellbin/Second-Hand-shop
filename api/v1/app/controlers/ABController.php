<?php
{
    require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/IController.php';
    abstract class ABController implements IController
    {
        abstract function __Construct();
        abstract function show();
        public function render_products(string $type, $res) //should probably change this to get content. 
        {
            $products = [];
            while($result = $res->fetch(PDO::FETCH_ASSOC))
            {
                array_push($products, new ViewProduct($result));
            }
            foreach($products as $product)
            {
                $product->render_product($type);
            }
        }
    }
}