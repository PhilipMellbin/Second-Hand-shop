<?php
//To ad in the furure: once i get the hang of mercury, i will use it to deliver mail to the user upon login.
//The plan was that the user would first fill in username and password, and as a second percausion, the link to
//log in will be sent via email to the user. So two step verification. 
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
    private $atempts;
    private $header;
    public function __construct()
    {
        $_SESSION['attempts'] = 3;
        $this->comfirm = 2;
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
    private function penalty()
    {
        $this->atempts = $this->atempts - 1;
        $_POST['attempts'] = $this->atempts;
        if($this->atempts <= 0)
        {
            $_POST['no_more_login'] = true;
        }
        else
        {
            $_SESSION['attempts'] = $this->atempts;
        }
        $this->show();
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
                $_SESSION['email'] = $_POST['username'];
                header('location: http://localhost:2005/Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/index.php?page=accounthome');
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
        if($_POST['no_more_login'] == null)
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
        else
        {
            $this->view->render("/account/acountlogin/notalowed");
        }
        $this->view->render("/webbshop/standard/footer");
    }
}
