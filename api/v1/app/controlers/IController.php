<?php

interface IController
{
    public function __construct();
    public function show();
    //Make so that every controller renders header and footer.
}