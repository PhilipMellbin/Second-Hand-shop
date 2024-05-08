<?php

require_once(__DIR__ . "/ABUser.php");
class LoginUser extends ABUser
{
    protected $db;
    public $res;
    private $email;
    public function con_set_email($email)
    {
        $this->email = $email;
    }
    public function con_process()
    {
        try
        {
            $this->con_start();
            $this->res = $this->con->prepare("SELECT password FROM accounts WHERE email = :email");
            $this->res->bindParam(":email", $this->email);
            $this->res->execute();
        }
        catch(PDOException $e) {
            echo "Exception caught: " . $e->getMessage() . "\n";
        }
        $this->con_end();
    }  
    public function fill_credentials()
    {

    }
    
}