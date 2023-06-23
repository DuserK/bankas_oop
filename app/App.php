<?php

namespace Bank;

use Bank\Controllers\AccountsController;
use Bank\Controllers\HomeController;

class App {

    static public function start()
    {
        
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        
        return self::router($url);
    }

    static private function router($url)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 1 && $url[0] == '') { // jei metodas get ir url tuscias
            return (new HomeController)->index();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) ==1 && $url[0] == 'account') { 
            return (new AccountsController)->index();
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 2 && $url[0] == 'account') 
        {
            return (new AccountsController)->show($url[1]);
        }

        else {
            echo '<h1>Error 404</h1>';
        }
    }

    static public function view($path, $data = null)
    {
        if ($data) {
            extract($data);
        }
        require __DIR__ . '/../views/top.php';
        require __DIR__ . '/../views/' . $path . '.php';
        require __DIR__ . '/../views/bottom.php';
    }
}