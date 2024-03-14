<?php

require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/IUser.php");
abstract class ABCustomer implements IUser
{
    abstract function fill_credentials();
    abstract function payment(array $products);
}

//payment for others?
//