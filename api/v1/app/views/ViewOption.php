<?php

class ViewOption extends View
{
    public $option_name;
    public $option_id;
    public function __construct($subject)
    {
        $this->option_name = $subject['subject_name'];
        $this->option_id = $subject['id'];
    }
    public function render_option()
    {
        $this->render("/webbshop/standard/options");
    }
}