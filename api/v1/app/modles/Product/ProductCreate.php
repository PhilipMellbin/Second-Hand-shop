<?php


require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/db/db.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/Cookie.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/IProduct.php';

class ProductCreate implements IProduct
{
    protected $db;
    public $res;
    public function get_subjects()
    {
        $this->db = new db;
        $command = "SELECT * FROM subjects";
        $this->db->get_results($command);
        $this->res = $this->db->command;
        $this->end();
    }
    public function create_product($product)
    {
        $this->db = new db;
        $str = $this->random_id(6);
        
        $command = "INSERT INTO products 
        (
            prod_id,
            subject,
            type,
            title,
            img,
            description,
            price,
            publisher,
            publish_date
        )
        VALUES
        (
            '$str',
            '$product->subject',
            '$product->type',
            '$product->title',
            '$product->description',
            '$product->price',
            '$product->publisher',
            'date(Y/m/d);'
        )
        ";
        $this->db->get_results($command);
        $this->end();
    }
    private function random_id($n)
    {
        $check = false;
        $chars = '1234567890+abcdefghijklmnopqrstuvwxyzABCDEFTGIJKLMNOPQRSTUVWXYZ!"#¤%&/()=?@£${[]}¨^~*,.-_<>|';
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
        $localdb = new db;
        $command = "SELECT * FROM products WHERE prod_id = '$str'";
        $localdb->get_results($command);
        $res = $localdb->command;
        if(($res) <= 0)
        {
            return(true);
        }
        $res->closeCursor();
        $localdb->close();
    }
    public function end()
    {
        $this->db->close();
    }
}