<?php

require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/ABLoginUser.php");
require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/db/db.php");
class LoginUser extends ABLoginUser
{
    protected $db;
    public $res;
    public function __construct()
    {
        $this->db = new db;
    }
    public function fill_credentials()
    {

    }
    public function get_password($email)
    {
        $command = "SELECT password FROM accounts WHERE email = '$email'";
        $this->db->get_results($command, "");
        $this->res = $this->db->command;
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
    
}