<?php
/*
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/Cookie.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/IProduct.php';
class ProductSold implements IProduct
{
    public $res;
    protected $db;
    public function __construct()
    {
        $this->db = new db;
        $email = $_SESSION['email'];
        $command = "SELECT username FROM accounts WHERE email = '$email'";
        $this->db->get_results($command, "");
        $this->res = $this->db->command;
    }
    public function get_sold_products(string $name)
    {
        $command = "SELECT * FROM products WHERE publisher = '$name'";
        $this->db->get_results($command, "");
        if($this->db->command->rowCount() > 0)
        {
            $this->res = $this->db->command; 
        }
        else
        {
            $this->res = null;
        }
    }
    public function end()
    {
        $this->db->close();
    }
}*/