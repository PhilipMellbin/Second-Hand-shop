<?php
use Olssonm\Swish\Certificate;
use Olssonm\Swish\Client;
use Olssonm\Swish\Payment;
//need swish handel
//create recite
//fill credentials
//pay
class Customer
{
    private string $sess_id;
    private string $user_name;
    private int $user_phone;
    private string $user_email;
    public string $location;
    public array $products;
    private bool $filled_credentials;
    /*public function swish()
    {
        $certificate = new Certificate(
            '/path/to/client.pem', 
            'client-passphrase'
        );
        $client = new Client($certificate);
        $payment = new Payment([
            'callbackUrl' => 'https://callback.url',
            'payeePaymentReference' => 'XVY77',
            'payeeAlias' => '123xxxxx',
            'payerAlias' => '321xxxxx',
            'amount' => '100',
            'currency' => 'SEK',
            'message' => 'A purchase of my product',
        ]);
        
        // Perform the request
        $response = $client->create($payment);
        
        if($this->filled_credentials == true)
        {
            //swish and await response
            //return response
            //if not payed, send message
            //if payed
            $this->compleate_payment();
        }
    }*/
    public function fill_credentials($sess_id, $username, $phonenumber, $email)
    {
        $this->sess_id = $sess_id;
        $this->user_name = $username;
        $this->user_phone = $phonenumber;
        $this->user_email = $email;
        $this->filled_credentials = true;
    }
    private function compleate_payment()
    {
        /*acces recite database
        insert products
        send email
         */
    }
}