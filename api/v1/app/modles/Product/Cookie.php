<?php
/*
NOT IN USE! May use at another date
*/
class Cookie
{
    public $estimated_bias;
    public $allow_cookies = True;
    public function toggle_coolie(int $answer)
    {
        if($answer == 0)
        {
            $this->allow_cookies = False;
        }
    }
    public function uppdate_bias()
    {
        
    }
}