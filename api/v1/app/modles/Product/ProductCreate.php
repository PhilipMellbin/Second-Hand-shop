<?php


require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/db/db.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/Cookie.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/IProduct.php';

class ProductCreate implements IProduct
{
    protected $db;
    public $res;
    private $atempts;
    public function get_subjects()
    {
        $this->db = new db;
        $command = "SELECT * FROM subjects";
        $this->db->get_results($command);
        $this->res = $this->db->command;
        $this->end();
    }
    public function create_product($title, $subject, $img ,$desc, $price, $publisher)
    {
        $this->db = new db;
        $str = $this->random_id(6);
        
        $command = "INSERT INTO product
        (
            prod_id,
            subject,
            title,
            img,
            description,
            price,
            publisher,
            publish_date,
        )
        VALUES
        (
            '$str',
            '$subject',
            '$title',
            '$img',
            '$desc',
            '$price',
            '$publisher',
            'date(Y/m/d)'
        )
        ";
        echo($command);
        $this->db->get_results($command);
        $this->end();
    }
    private function random_id($n)
    {
        $check = false;
        $chars = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFTGIJKLMNOPQRSTUVWXYZ';
        while($check == false)
        {
            $randstr = '';

            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($chars) - 1);
                $randstr .= $chars[$index];
            }
            $check = $this->id_does_not_exist($randstr);
        }
        return $randstr;
    }
    private function id_does_not_exist(string $str)
    { 
        $not_exist = false;
        $this->db = new db;
        $command = "SELECT * FROM product WHERE prod_id = '$str'";
        $this->db->get_results($command);
        $res = $this->db->command;
        if($res->rowCount() >= 0)
        {
            $not_exist = (true);
        }
        $res->closeCursor();
        $this->db->close();
        return($not_exist);
    }
    public function end()
    {
        $this->db->close();
    }
}