<?php

require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/LoginUser.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/views/View.php');
require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/controlers/ABController.php');
class LoginController extends ABController
{
    private $view;
    private $model;
    private $email;
    private $password;
    private $comfirm;
    public function __construct()
    {
        $this->model = new LoginUser;
        $this->view = new View;   
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
                $_SESSION['name'] = $this->email;
            }
        }
    }
    private function send_email()
    {
        $to = $this->email;
        $subject = ('Login');
        $message = $this->view->render('');
    }
    public function show()
    {

    }
}
