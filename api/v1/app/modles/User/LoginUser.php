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
            $this->con_end();
        }
        catch(PDOException $e) {
            echo "Exception caught: " . $e->getMessage() . "\n";
        }
    }
    public function con_create_account($name, $password, $email, $phone, $address)
    {
        $creation_date = date('Y/m/d');
        try
        {
            $this->con_start();
            $this->res = $this->con->prepare("INSERT INTO accounts
            (
                account_name, 
                password, 
                email, 
                phone_number,
                address,
                created
            ) 
            VALUES 
            (
                :name,
                :pass,
                :email,
                :phone,
                :address,
                :created
            )");
            $this->res->bindParam(':name', $name);
            $this->res->bindParam(':pass', $password);
            $this->res->bindParam(':email', $email);
            $this->res->bindParam(':phone', $phone);
            $this->res->bindParam(':address', $address);
            $this->res->bindParam(':created', $creation_date);
            $this->res->execute();
            $this->con_end();
        }
        catch(PDOException $e) {
            echo "Exception caught: " . $e->getMessage() . "\n";
        }
    }  
    public function fill_credentials()
    {

    }
    
}