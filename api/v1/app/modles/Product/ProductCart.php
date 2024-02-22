<?php

class ProductCart extends Cookie
{
    public $res;
    protected $db;
    private $sess_id;
    private $prod_id;

    function __construct($sess_id)
    {
        $this->sess_id = $sess_id;
        $command = "SELECT * FROM shopptertrack WHERE session_id='$this->sess_id'";
        $this->db->get_results($command);
        if($this->db->command->rowCount() > 0)
        {
            $this->res = $this->db->command; 
        }
        else
        {
            $this->res = null;
        }
    }
    public function end()
    {
        $this->db->close(); 
    }
    function delete($prod_id)
    {
        $command = "DELETE FROM shopertrack WHERE session_id='$this->sess_id'";
        $this->db->get_results($command);
    }
    //same select function
    //maby i should have a product interface. like IProduct.php
}