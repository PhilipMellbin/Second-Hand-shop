<?php
{
    require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/IController.php';
    abstract class ABController implements IController
    {
        abstract function __Construct();
        abstract function show();
        public function render_info(string $type, string $subtype, $res) //should probably change this to get content. 
        {
            $objects = [];
            switch($type)
            {
                case "product":
                    while($result = $res->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push($objects, new ViewProduct($result));
                    }
                    foreach($objects as $product)
                    {
                        $product->render_product($subtype);
                    }
                    break;
                case "user":
                    while($result = $res->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push($objects, new ViewUser($result));
                    }
                    foreach($objects as $user)
                    {
                        $user->render_user($subtype);
                    }
                    break;
                default:
                echo("please fill in a type(user or product)");
                break;
            }
        }
    }
}