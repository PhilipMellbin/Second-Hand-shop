<?php
require_once __DIR__. "/../db/ABdb.php";
class ProductCart extends ABdb
{
    public $res;
    protected $db;

    public function con_process()
    {
        $this->con_start();
        $this->res = $this->con->prepare("SELECT * FROM shoppertrack WHERE sess_id = :sess_id");
        $this->res->bindParam(":sess_id" , session_id());
        $this->res->execute();
        $this->con_end();
    }
    function con_delete()
    {
        $this->con_start();
        $this->res = $this->con->prepare("DELETE FROM shoppertrack WHERE sess_id = :sess_id AND prod_id = :prod_id");
        $this->res->bindParam(":sess_id", session_id());
        $this->res->bindParam(":prod_id", $_GET['prod_id']);
        $this->res->execute();
        $this->con_end();

        header('location: index.php?page=checkout'); //may add to the controllers instead
    }
    //same select function
    //maby i should have a product interface. like IProduct.php
}