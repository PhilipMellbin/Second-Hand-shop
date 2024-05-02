<?php
//Need to require all of these files
require_once __DIR__ . '/../db/ABdb.php';
Class ProductSmall extends ABdb
{
    //proposal:
    /*Develop on: construct 
    */
    public $res;
    protected $db;
    private $filter;
    private $type;
    public function con_process()
    {
        $this->con_start();
        switch($this->type) 
        {
            case "subject":
                if(!is_int($this->filter))
                {
                    echo("<script> console.log(Error(422): Bad input! Only int values are allowed! (contact philip.mellbin@elev.ga.lbs.se for help));</script>");
                }
                $this->res = $this->con->prepare("SELECT * FROM product WHERE subject = :filter");
                $this->res->res->bindParam(':prod_id', $this->filter);
                $this->res->execute();
                break;
            case "search":
                $this->res = $this->con->prepare("SELECT * FROM product WHERE LIKE = :filter");
                $this->res->res->bindParam(':prod_id', $this->filter);
                $this->res->execute();
                break;
            default:
            try{
                $this->res = $this->con->prepare("SELECT * FROM product LIMIT 10"); //<--To add: check if there is a cookie value. if there is, display products that are similar to the value
                $this->res->execute();
            }
            catch(PDOException $e)
            {
                echo("caught error!!" . $e->getMessage());
            }
            break;

        }
        $this->con_end();
    }
    function __construct($filter, $type) {
        $this->filter = $filter;
        $this->type = $type;
        $this->con_process();
    }
}