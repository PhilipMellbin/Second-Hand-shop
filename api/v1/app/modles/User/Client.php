<?php

require_once(__DIR__ . "/LoginUser.php");
class Client extends LoginUser
{
    public $res;
    private $option;
    public function con_get($option)
    {
        $this->option = $option;
        $this->con_process();
    }
    public function con_process()
    {
        $this->con_start();
        if($this->option == "user")
        {
            $this->con_get_user_info();
        }
        else
        {
            $this->con_get_user_products();
        }
        $this->con_end();
    }
    public function con_get_user_info()
    {
        $this->res = $this->con->prepare("SELECT * FROM accounts WHERE email = :email");
        $this->res->bindParam(":email", $_SESSION['email']);
        $this->res->execute();
    }
    public function con_get_user_products()
    {
        $this->res = $this->con->prepare("SELECT * FROM product WHERE publisher = :usr");
        $this->res->bindParam(':usr', $_POST['username']);
        $this->res->execute();
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