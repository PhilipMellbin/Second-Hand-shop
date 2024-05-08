<?php
//To ad in the furure: once i get the hang of mercury, i will use it to deliver mail to the user upon login.
//The plan was that the user would first fill in username and password, and as a second percausion, the link to
//log in will be sent via email to the user. So two step verification. 
require_once(__DIR__ . '/../../modles/User/LoginUser.php');
require_once(__DIR__ . '/../../views/View.php');
require_once(__DIR__ .'/../ABController.php');
require_once (__DIR__ .'/../Header/HeaderController.php');
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
        if(isset($_SESSION['email']))
        {
            header("location: index.php?page=accounthome");
        }
        $this->model = new LoginUser; //models and views
        $this->view = new View;  
        $this->header = new HeaderController; 
        
        $this->comfirm = 2; //prevent bruteforcing
        $this->atempts = isset($_SESSION['attempts']) ? $_SESSION['attempts'] : 3; //each user gets 3 attempts
        $_POST['msg'] = 2;
        if(!isset($_SESSION['no_more_login']))
        {
            $_SESSION['no_more_login'] = false;
        };

        if(isset($_SESSION['pennaltytime']) and time() - $_SESSION['pennaltytime'] == 28800) //after 8 hours of failed logins, the user will be able to log in again
        {
            $_SESSION['attempts'] = 3;
            $_SESSION['no_more_login'] = false;
        }
        
    }
    public function login()
    {
        $this->email = $_POST['email']; //get email and password
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            header("location: index.php?page=login");   
        }
        $this->password = $_POST['password'];
        $this->model->con_process($this->email);
        $res = $this->model->res;
        $this->check_password($res);
    }
    private function penalty()
    {
        $this->atempts = $this->atempts - 1;
        if($this->atempts <= 0)
        {
            $_SESSION['no_more_login'] = true; //if you run out of atempts, you will be prohibited from loging in
            //to add, a function alarming the target of ip adress and location of the attack
        }
        else
        {
            $_POST['attempts'] = $_SESSION['attempts'] = $this->atempts;
            $_SESSION['penaltytime'] = time();
            $this->comfirm = 0;
        }
        $this->show();
    }
    private function check_password($res)
    {
        if($res != null) //if user exists
        {
            $encro = "";
            while($result = $res->fetch(PDO::FETCH_ASSOC))
            {
                $encro = $result['password'];
            }
            if(password_verify($this->password, $encro))
            {
                $_SESSION['email'] = $this->email;
                echo($_SESSION['email']);
                $_SESSION['attempts'] = 3;
                header('location: index.php?page=accounthome');
            }
            else
            {
                $this->penalty();
            }
        }
        else
        {
            $this->penalty();
        }
        $this->comfirm = 0;
    }
    public function show()
    {
        $this->header->show();
        if(isset($_SESSION['no_more_login']) and $_SESSION['no_more_login'] == true)
        {
            $this->view->render("/account/acountlogin/notalowed");
        }
        else
        {
            $this->view->render("/account/acountlogin/acountlogin");
            if($this->comfirm == 1)
            {
                $this->view->render("/account/acountlogin/comfirm");
            }
            else if ($this->comfirm == 0)
            {
                $this->view->render("/account/acountlogin/denied");
            }
            $this->comfirm = 2;
        }
        $this->view->render("/webbshop/standard/footer");
    }
}
