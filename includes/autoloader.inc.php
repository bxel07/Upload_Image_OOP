<?php
    spl_autoload_register('myautoLoader');

    function myAutoLoader($className) {

        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        
        if (strpos($url, 'includes') !== false) {
            $path = '../classes/';
        } else {
            $path = 'classes/';
        }

        $ext = '.class.php';
        require_once $path.$className.$ext;
    }
  
?>