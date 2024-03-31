<?php

use GuzzleHttp\Psr7\Header;

require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/LoginUser.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php');
require_once '/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/Header/HeaderController.php';
class LoginController extends ABController
{
    private $view;
    private $model;
    private $email;
    private $password;
    private $comfirm;
    private $header;
    public function __construct()
    {
        $this->model = new LoginUser;
        $this->view = new View;  
        $this->header = new HeaderController; 
    }
    public function login()
    {
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->model->get_password($this->email);
        $res = $this->model->res;
        $this->check_password($res);
    }
    private function check_password($res)
    {
        if($res != null) //if user exists
        {
            while($result = $res->fetch(PDO::FETCH_ASSOC))
            {
                $encro = $result['password'];
            }
            if(password_verify($this->password, $encro))
            {
                $this->send_email();
                $this->comfirm = true;
                $_POST['username'] = $this->email;
            }
        }
    }
    public function fufill_login() //i made this public and not private. May be a security risk, but idk
    {
        $_Session['email'] = $_POST['username'];
        header('location: index.php?page=acounthome');
    }
    private function send_email()
    {
        $to = $this->email;
        $subject = ('Login');
        $message = include("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/pages/account/acountapproved.php");
        mail($to, $subject, $message);
    }
    public function show()
    {
        $this->header->show();
        $this->view->render("/account/login");
        $this->view->render("/webbshop/standard/footer");
    }
}
