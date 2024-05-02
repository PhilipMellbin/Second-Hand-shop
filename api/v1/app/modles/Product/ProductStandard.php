<?php
require_once __DIR__ . "/../db/ABdb.php";
class ProductStandard extends ABdb
{
    public $res;
    protected $db;
    private $prod_id;
    public function __construct(string $prod_id)
    {
        $this->prod_id = $prod_id;
        $this->con_start();
    }
    public function con_process()
    {
        $this->con_start();
        $this->res = $this->con->prepare("SELECT * FROM product WHERE prod_id = :prod_id");
        $this->res->bindParam(":prod_id" , $this->prod_id);
        $this->res->execute();
        $this->con_end();
    }
    function con_add_to_cart(ViewProduct $product)
    {
        $this->con_start();
        $this->res = $this->con->prepare("INSERT INTO 
        shoppertrack
        (
            sess_id, prod_id, title, img, price, publisher, prod_added_date
        )
        VALUES
        (
            :sess_id, :prod_id, :title, :img, :price, :publisher, :prod_added_date
        )
        ");
        $this->res->bindParam(":sess_id", session_id());
        $this->res->bindParam(":prod_id", $product->prod_id);
        $this->res->bindParam(":title", $product->title);
        $this->res->bindParam(":img", $product->img);
        $this->res->bindParam(":img", $product->price);
        $this->res->bindParam(":img", $product->publisher);
        $this->res->bindParam(":prod_added_date", date('Y-m-d H:i:s'));
        $this->res->execute();
        $this->con_end();
    }  
}