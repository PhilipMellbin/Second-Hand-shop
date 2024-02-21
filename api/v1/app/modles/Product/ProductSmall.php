<?php
//Need to require all of these files
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/db/db.php';
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/app/modles/Product/Cookie.php';
require_once '/XAMPP/htdocs/Second_Academia_Shop/api/v1/app/modles/Product/IProduct.php';
Class ProductSmall extends Cookie implements IProduct
{
    //proposal:
    /*Develop on: construct 
    */
    public $res;
    protected $db;
    public string $subject;
    public string $title;
    private function fill_results($command)
    {
        $this->db->get_results($command);
        $this->res = $this->db->command; 
    }

    function __construct($filter, $type) {
        $this->db = new db;
        switch($type)
        {
            case "BySubject":
                $command = "SELECT * FROM product WHERE subject = '$filter'";
                break;
            case "BySearch":
                $command = "SELECT * FROM product WHERE title LIKE '$filter'";
                break;
            case "ByType":
                $command = "SELECT * FROM product WHERE prod_type = '$filter'";
           default:
           $command = "SELECT *  FROM product LIMIT 10";
           break;
        }
        $this->fill_results($command);
    }
    public function end()
    {
        $this->db->close(); 
    }
    //construct function that sets items
    //fetch into array
    //for every array, render product
    //close con with model...or maby throu controler?
}