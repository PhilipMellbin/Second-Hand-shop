<?php


abstract class ABCustomer implements IUser
{
    abstract function fill_credentials();
    abstract function payment();
}

//payment for others?
//