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
        $con =  new PDO("mysql:host=". HOST. ";dbname=". DB , USER, PASS);
        $sess_id = session_id();
        $command = "SELECT * FROM shoppertrack WHERE sess_id='$sess_id'";
        $a = $con->prepare($command);
        $a->execute();
        print_r($a);

        echo($command);
        $this->db->get_results($command);
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
    function delete($title)
    {
        $sess_id = session_id();
        $command = "DELETE FROM shoppertrack WHERE session_id='$sess_id' AND prod_title = '$title'";
        $this->db->get_results($command);
    }
    //same select function
    //maby i should have a product interface. like IProduct.php
}