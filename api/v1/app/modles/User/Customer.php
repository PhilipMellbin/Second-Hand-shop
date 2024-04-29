<?php
use Olssonm\Swish\Certificate;
use Olssonm\Swish\Client;
use Olssonm\Swish\Payment;
//need swish handel
//create recite
//fill credentials
//pay
require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/ABCustomer.php");
class Customer extends ABCustomer
{
    protected $db;
    private string $sess_id;
    private string $user_name;
    private int $user_phone;
    private string $user_email;
    public string $location;
    public array $products;
    private bool $filled_credentials;
    public function __construct()
    {
        $this->db = new db;
    }
    public function swish(array $products)
    {
        $this->payment($products);
    }
    public function fill_credentials()
    {
        $this->sess_id = session_id();
        $this->user_name = $_POST['fullname'];
        $this->user_phone = $_POST['phone'];
        $this->user_email = $_POST['email'];
        $this->filled_credentials = true;
    }
    public function payment(array $products)
    {
        $command = "INSERT INTO recite
        (
            customer_sess_id,
            customer_name,
            customer_phone,
            customer_email,
            products
        )
        VALUES
        (
            '$this->sess_id',
            '$this->user_name',
            '$this->user_phone'
            '$this->user_email'
            '$products'
        )
        ";
        $this->db->get_results($command, "");
        $this->get_recite_info();
        /*acces recite database
        insert products
        send email
         */
    }
    private function get_recite_info()
    {
        
    }
    public function end()
    {
        $this->db->close();
    }
}