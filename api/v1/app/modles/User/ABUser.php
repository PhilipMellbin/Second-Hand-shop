<?php

require_once(__DIR__ . "/IUser.php");
require_once(__DIR__ . "/../db/ABdb.php");
abstract class ABUser extends ABdb implements IUser
{
    abstract function fill_credentials();
}