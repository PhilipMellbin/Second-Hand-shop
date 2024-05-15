<?php


require_once __DIR__ . '/../db/ABdb.php';

class ProductCreate extends ABdb
{
    public $res;
    private $title;
    private $subject;
    private $img;
    private $desc;
    private $price;
    private $publisher;
    public function con_get_subj()
    {
        $this->con_start();
        $this->res = $this->con->prepare("SELECT * FROM subjects");
        $this->res->execute();
        $this->con_end();
    }
    public function con_process()
    {
        $id = $this->gen_random_id(6);
        $publish_date = date('Y/m/d');
        $this->con_start();
        try
        {
            $this->res = $this->con->prepare("INSERT INTO product (prod_id, subject, title, img, description, price, publisher, publish_date) 
            VALUES (:prod_id, :subject, :title, :img, :description, :price, :publisher, :publish_date)");
            $this->res->bindParam(':prod_id', $id);
            $this->res->bindParam(':subject', $this->subject);
            $this->res->bindParam(':title', $this->title);
            $this->res->bindParam(':img', $this->img);
            $this->res->bindParam(':description', $this->desc);
            $this->res->bindParam(':price', $this->price);
            $this->res->bindParam('publisher', $this->publisher);
            $this->res->bindParam(':publish_date', $publish_date);
            $this->res->execute();
            echo("executet successfully");
        }
        catch(PDOException $e) {
            echo "Exception caught: " . $e->getMessage() . "\n";
        }
    }
    public function create_product($title, $subject, $img, $desc, $price, $publisher)
    {
        $this->title = $title;
        $this->subject = $subject;
        $this->img = $img;
        $this->desc = $desc;
        $this->price = $price;
        $this->publisher = $publisher;
        $this->con_process();
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