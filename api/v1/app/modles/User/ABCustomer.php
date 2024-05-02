<?php

require_once(__DIR__ . "/ABUser.php");
abstract class ABCustomer extends ABUser
{
    abstract function payment(array $products);
}

//payment for others?
//