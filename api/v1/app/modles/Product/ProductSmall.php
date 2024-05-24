<?php
require_once __DIR__ . '/../db/ABdb.php';
Class ProductSmall extends ABdb
{
    public $res;
    protected $db;
    private $filter;
    private $type;
    function __construct($filter, $type) {
        $this->filter = $filter;
        $this->type = $type;
        $this->con_process();
    }
    public function con_process() 
    {
        $this->con_start();
        switch($this->type) 
        {
            case "subject":
                if(!is_int($this->filter))
                {
                    echo("Error(422): Bad input! Only int values are allowed! (contact philip.mellbin@elev.ga.lbs.se for help)");
                }
                $this->res = $this->con->prepare("SELECT * FROM product WHERE subject = :filter");
                $this->res->res->bindParam(':filter', $this->filter);
                $this->res->execute();
                break;
            case "search":
                $this->res = $this->con->prepare("SELECT * FROM product WHERE LIKE = :filter");
                $this->res->res->bindParam(':filter', $this->filter);
                $this->res->execute();
                break;
            default:
            try{
                $this->res = $this->con->prepare("SELECT * FROM product LIMIT 10");
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
}