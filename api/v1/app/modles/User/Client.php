<?php

require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/LoginUser.php");
require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/db/db.php");
class Client extends LoginUser
{
    protected $db;
    public $res;
    public function __construct()
    {
        $this->db = new db;
    }
    public function get_user_info($email)
    {
        $command = "SELECT * FROM accounts WHERE email = '$email'";
        $this->db->get_results($command, "");
        $this->res = $this->db->command;
    }
    public function get_user_products($username)
    {
        $command = "SELECT * FROM product WHERE publisher = '$username'";
        $this->db->get_results($command, "");
        $this->res = $this->db->command;
    }
    public function eddit_credentials($username, $editted_sections)
    {
        //for every 
    }
    public function end()
    {
        $this->db->close();
    }
    //get_user_info
    //get_user_products
    //change_user_info
}