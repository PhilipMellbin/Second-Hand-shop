<?php
{
    require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/IController.php';
    abstract class ABController implements IController
    {
        protected $objects;
        abstract function __Construct();
        abstract function show();
        public function render_info(string $type, string $subtype, $res) //should probably change this to get content. 
        {
            $this->objects = [];
            switch($type)
            {
                case "product":
                    $i = 1;
                    while($result = $res->fetch(PDO::FETCH_ASSOC))
                    {
                        $this->objects = new ViewProduct(($result)); //key $i has the value of a product. $i will be used in carousell.js in the form of an id
                        $this->objects->render_product($subtype, $i);
                        $i = $i + 1;
                    }
                    foreach($this->objects as $product)
                    {
                        //$product->render_product($subtype);
                        //$i++;
                    }
                    break;
                case "user":
                    while($result = $res->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push($this->objects, new ViewUser($result));
                    }
                    foreach($this->objects as $user)
                    {
                        $user->render_user($subtype);
                    }
                    break;
                case "options":
                    while($result = $res->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push($this->objects, new ViewOption($result));
                    }
                    foreach($this->objects as $option)
                    {
                        $option->render_option();
                    }
                default:
                echo("please fill in a type(user or product)");
                break;
            }
        }
    }
}