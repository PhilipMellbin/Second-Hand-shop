<?php

class Product_cart extends Cookie
{
    public $res;
    protected $db;
    private $sess_id;
    private $prod_id;

    function __construct($sess_id)
    {
        try
        {
            $this->sess_id = $sess_id;
            $command = "SELECT * FROM shopptertrack WHERE session_id='$this->sess_id'";
            $this->db->get_results($command);
            $this->res = $this->db->command; 
        }
        catch(Exception $e)
        {
            echo("Internal server error: $e");
            die;
        }
    }
    function delete($prod_id)
    {
        $command = "DELETE FROM shopertrack WHERE session_id='$this->sess_id'";
        $this->db->get_results($command);
    }
    //same select function
    //maby i should have a product interface. like IProduct.php
}