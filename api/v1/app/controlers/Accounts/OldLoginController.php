<?php
//!This was my atempt at 2 step verification. The code is not intended to be used. I will
//use it when i understand mercury and smtp servers
/*require_once('/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/LoginUser.php');
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
    private $atempts;
    private $header;
    public function __construct()
    {
        $this->comfirm = null;
        $this->model = new LoginUser;
        $this->view = new View;  
        $this->header = new HeaderController; 
        $this->atempts = isset($_SESSION['attempts']) ? $_SESSION['attempts'] : 3;
        $_POST['no_more_login'] = false;
        $_POST['msg'] = 2;
        
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
                echo($this->password. $encro);
            }
            if(password_verify($this->password, $encro))
            {
                $this->send_email();
                $this->comfirm = 1;
                $_POST['msg'] = 0;
            }
            else
            {
                $this->comfirm = 0;
                $this->atempts = $this->atempts - 1;
                if($this->atempts == 0)
                {
                    $_POST['no_more_login'] = true;
                }
                $_SESSION['attempts'] = $this->atempts;

            }
        }
        else
        {
            $this->atempts = $this->atempts - 1;
            if($this->atempts == 0)
            {
                $_POST['no_more_login'] = true;
            }
            $_SESSION['attempts'] = $this->atempts;

        }
    }
    private function warningmail()
    {

    }
    public function fufill_login() //i made this public and not private. May be a security risk, but idk
    {
        $SESSION['email'] = $_POST['username'];
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
        if($_POST['no_more_login'] == null)
        {
            $this->view->render("/account/acountlogin/acountlogin");
            if($this->comfirm == 1)
            {
                $this->view->render("");
            }
            else if ($this->comfirm == 0)
            {
                $this->view->render("");
            }
        }
        else
        {
            $this->view->render("/account/acountlogin/lotalowed");
        }
        $this->view->render("/webbshop/standard/footer");
    }
}*/
