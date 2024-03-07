<?php

abstract class ABController
{
    abstract function __construct();
    abstract function show();
    //Make so that every controller renders header and footer.
}