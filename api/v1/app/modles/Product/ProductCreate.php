<?php


require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/Cookie.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/IProduct.php';

/*class ProductCreate implements IProduct
{
    protected $db;
    public $res;
    public function __construct()
    {
        $this->db = new db;
    }
    public function get_subjects()
    {
        $command = "SELECT * FROM subjects";
        $this->db->get_results($command, "");
        $this->res = $this->db->command;
        $this->end();
    }
    public function create_product($title, $subject, $img, $desc, $price, $publisher)
{
    $str = $this->random_id(6);
    $publish_date = date('Y/m/d'); // Get current date
    $command = "INSERT INTO product (prod_id, subject, title, img, description, price, publisher, publish_date) 
                VALUES (:prod_id, :subject, :title, :img, :description, :price, :publisher, :publish_date)";
    
    try {
        $stmt = $this->db->con->prepare($command);
        $stmt->bindParam(':prod_id', $str);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':description', $desc);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':publisher', $publisher);
        $stmt->bindParam(':publish_date', $publish_date);
        
        $stmt->execute();
        echo "Product created successfully.\n";
    } catch(PDOException $e) {
        echo "Exception caught: " . $e->getMessage() . "\n";
    }

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
        $command = "SELECT * FROM product WHERE prod_id = '$str'";
        $this->db->get_results($command, "");
        $res = $this->db->command;
        if($res->rowCount() >= 0)
        {
            $not_exist = (true);
        }
        $command = "";
        return($not_exist);
    }
    public function end()
    {
        $this->db->close();
    }
}*/