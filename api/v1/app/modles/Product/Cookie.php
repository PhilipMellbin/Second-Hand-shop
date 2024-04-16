<?php
//will work on later when there are plenty of products
/*

will probably use a controler instead once i'm done whith the lazy-load.


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