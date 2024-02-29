<?php
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/db/db.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/Cookie.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/IProduct.php';
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
        print_r($product);
        $sess_id = session_id();
        $time = date('Y-m-d H:i:s');
        $this->db = new db;
        $command = "INSERT INTO shoppertrack 
        (
            sess_id, 
            prod_id,
            title,
            img, 
            price, 
            publisher, 
            prod_added_date
        ) 
        VALUES
        (
            '$sess_id',
            '$product->prod_id',
            '$product->title',
            '$product->img',
            '$product->price',
            '$product->publisher',
            '$time'
        )";
        $this->db->get_results($command);
    }
    public function end()
    {
        $this->db->close(); 
    }
    
}