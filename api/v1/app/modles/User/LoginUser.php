<?php

require_once(__DIR__ . "/ABUser.php");
class LoginUser extends ABUser
{
    protected $db;
    public $res;
    private $email;
    public function __construct()
    {
        $this->email = $_SESSION['email'];
        $this->con_process();
    }
    public function con_process()
    {
        $this->con_start();
        $this->res = $this->con->prepare("SELECT password FROM accounts WHERE email = ':email'");
        $this->res->bindParam(":email", $this->email);
        $this->res->execute();
        $this->con_end();
    }  
    public function fill_credentials()
    {

    }
    
}