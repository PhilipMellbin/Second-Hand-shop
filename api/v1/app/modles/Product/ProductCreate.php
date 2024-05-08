<?php


require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/Cookie.php';
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/Product/IProduct.php';

class ProductCreate extends ABdb
{
    public $res;
    public function con_get_subjects()
    {
        $this->con_start();
        $this->res = $this->con->prepare("SELECT * FROM subjects");
        $this->res->execute();
        $this->con_end();
    }
    public function con_process()
    {

    }
    public function create_product($title, $subject, $img, $desc, $price, $publisher)
{
    $id = $this->gen_random_id(6);
    $this->con_start();
    $publish_date = date('Y/m/d');
    try
    {
        $this->res = $this->con->prepare("INSERT INTO product (prod_id, subject, tiltle, description, price, publisher, publish_date) 
        VALUES (:prod_id, :subject, :title, :img, :description, :price, :publisher, :publish_date)");
        $this->res->bindParam(':prod_id', $id);
        $this->res->bindParam(':subject', $subject);
        $this->res->bindParam(':title', $title);
        $this->res->bindParam(':img', $img);
        $this->res->bindParam(':description', $desc);
        $this->res->bindParam(':price', $price);
        $this->res->bindParam('publisher', $publisher);
        $this->res->bindParam(':publish_date', $publish_date);
        $this->res->execute();
    }
    catch(PDOException $e) {
        echo "Exception caught: " . $e->getMessage() . "\n";
    }

}
    private function gen_random_id($n)
    {
        $valid = false;
        $chars = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFTGIJKLMNOPQRSTUVWXYZ';
        while($valid == false)
        {
            $prod_id = '';

            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($chars) - 1);
                $prod_id .= $chars[$index];
            }
            $valid = $this->valid_id($prod_id);
        }
        return $prod_id;
    }
    private function valid_id(string $str)
    { 
        $valid = false;
        $this->con_start();
        $this->res = $this->con->prepare("SELECT * FROM product WHERE prod_id = :id");
        $this->res->bindParam(":id" , $str);
        $this->res->execute();
        if($this->res->rowCount() >= 0)
        {
            $valid = (true);
        }
        $this->res = null;
        return($valid);
    }
}