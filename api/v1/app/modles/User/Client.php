<?php

require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/LoginUser.php");
class Client extends LoginUser
{
    private $db;
    public $res;
    public function __connstrict()
    {
        $this->db = new db;
    }
    public function get_user_info()
    {
        $email = $_SESSION['email'];
        $command = "SELECT * FROM accounts WHERE email = '$email'";
        $this->db->get_results($command);
        $this->res = $this->db->command;
    }
    public function get_user_products($username)
    {
        $command = "SELECT * FROM products WHERE username = '$username'";
        $this->db->get_results($command);
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