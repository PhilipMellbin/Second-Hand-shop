<?php
require_once __DIR__. "/../db/ABdb.php";
class ProductCart extends ABdb
{
    public $res;
    protected $db;

    public function con_process() //selects everything from the shoppertrack
    {
        $sess_id = session_id();
        $this->con_start();
        $this->res = $this->con->prepare("SELECT * FROM shoppertrack WHERE sess_id = :sess_id");
        $this->res->bindParam(":sess_id" , $sess_id );
        $this->res->execute();
        $this->con_end();
    }
    function con_delete() //deletes a specific product from the cart
    {
        $sess_id = session_id();
        $this->con_start();
        $this->res = $this->con->prepare("DELETE FROM shoppertrack WHERE sess_id = :sess_id AND prod_id = :prod_id");
        $this->res->bindParam(":sess_id", $sess_id );
        $this->res->bindParam(":prod_id", $_GET['prod_id']);
        $this->res->execute();
        $this->con_end();

        header('location: index.php?page=checkout'); //goes automaticaly to checkout.
    }
}