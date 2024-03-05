<?php
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/db/db.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/Cookie.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/IProduct.php';
class ProductCart extends Cookie
{
    public $res;
    protected $db;

    function __construct()
    {
        $this->db = new db;
        $sess_id = session_id();
        $command = "SELECT * FROM shoppertrack WHERE sess_id='$sess_id'";
        $this->db->get_results($command);
        $this->res = $this->db->command;
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
    function delete()
    {
        $prod_id = $_GET['prod_id'];
        $sess_id = session_id();
        $command = "DELETE FROM shoppertrack WHERE sess_id='$sess_id' AND prod_id = '$prod_id'";
        $this->db->get_results($command);
        header('location: http://localhost:2005/Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/index.php?page=checkout');
    }
    //same select function
    //maby i should have a product interface. like IProduct.php
}