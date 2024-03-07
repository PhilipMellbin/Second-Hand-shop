<?php


abstract class ABLoginUser implements IUser
{
    abstract function fill_credentials();
    abstract function fill_login_info($username, $password);
}