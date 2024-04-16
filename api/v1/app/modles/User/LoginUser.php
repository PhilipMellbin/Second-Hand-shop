<?php

require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/ABLoginUser.php");
class LoginUser extends ABLoginUser
{
    protected $db;
    public $res;
    public function fill_credentials()
    {

    }
    public function get_password($email)
    {
        $this->db = new db;
        $command = "SELECT password FROM accounts WHERE email = '$email'";
        $this->db->get_results($command);
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
    public function get_user_products()
    {

    }
    
}