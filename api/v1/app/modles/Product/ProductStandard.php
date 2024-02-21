<?php
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/db/db.php';
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/app/modles/Product/Cookie.php';
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/app/modles/Product/IProduct.php';
class ProductStandard extends Cookie implements IProduct
{
    public $res;
    protected $db;

    public function __construct(string $prod_id)
    {
        $this->db = new db;
        $command = "SELECT * FROM product WHERE prod_id = '$prod_id'";
        $this->db->get_results($command);
        $this->res = $this->db->command;
    }
    function add_to_cart(ViewProduct $product)
    {
        $time = date('Y-m-d H:i:s');
        $this->db = new db;
        $command = "INSERT INTO shopertrack (
            session_id, 
            prod_id,
            prod_title,
            prod_img, 
            prod_price, 
            prod_publisher, 
            date_added) 
        VALUES(
            session_id(),
            $product->prod_id
            $product->title
            $product->img
            $product->price
            $product->publisher
            $time('Y-m-d H:i:s');
            )";
        $this->db->get_results($command);
    }
    public function end()
    {
        $this->db->close(); 
    }
    
}