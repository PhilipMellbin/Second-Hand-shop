<?php

require_once("/xampp/htdocs/Second_Academia_Shop/Second-Hand-shop/api/v1/app/modles/User/IUser.php");
abstract class ABLoginUser implements IUser
{
    abstract function fill_credentials();
    abstract function get_password($username);
}