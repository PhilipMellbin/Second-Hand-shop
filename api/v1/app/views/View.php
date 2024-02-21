<?php

class View {
    public function render($dir, $data = []) {
        extract($data);
        include __DIR__ . "/../../public_html/pages/webbshop/{$dir}.php";
        /*if(isset($data))
        include __DIR__ . "url?data = $data"
        */
        //include __DIR__ . "/../../public_html/pages/webbshop/{$dir}.php";
    }
}