<?php

class ViewUser extends View
{
    public $username;
    public $email;
    public $pfp;
    public $created;
    public $rating;
    protected $phone;
    protected $bankcard; //to private
    protected $address;
    protected $password; //to private
    public $profits_month;
    public function __construct($user)
    {
        $this->username = isset($user['account_name']) ? $user['account_name'] : null;
        $this->email = isset($user['email']) ? $user['email'] : null;
        $this->phone = isset($user['phone']) ? $user['phone'] : null;
        $this->bankcard = isset($user['bankcard']) ? $user['bankcard'] : null;
        $this->address = isset($user['address']) ? $user['address'] : null;
        $this->password = isset($user['password']) ? $user['password'] : null;
        $this->pfp = isset($user['pfp']) ? $user['pfp'] : null;
        $this->created = isset($user['created']) ? $user['created'] : null;
        $this->rating = isset($user['rating']) ? $user['rating'] : null;
        $this->profits_month = isset($user['profits_month']) ? $user['profits_month'] : null;
        
    }
    public function render_user()
    {
        $this->render("/account/accountheader/accountheader"); //
    }
}