<?php

namespace Bank;

use Bank\Controllers\AccountsController;
use Bank\Controllers\HomeController;
use Bank\Controllers\LoginController;
use Bank\FileWriter;
use Bank\DatabaseWriter;

class App {

    const DB = 'database';

    static public function start()
    {
        
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        
        return self::router($url);
    }
    
    static public function get($table)
    {
        if (self::DB == 'file') {
            return new FileWriter($table);
        }
        if (self::DB == 'database') {
            return new DatabaseWriter($table);
        }
    }

    static private function router($url)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 1 && $url[0] == '') { // jei metodas get ir url tuscias
            return (new HomeController)->index();
        }

        /// LOGIN
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 1 && $url[0] == 'login') { 
            return (new LoginController)->index();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 1 && $url[0] == 'login') {
            return (new LoginController)->login($_POST);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 1 && $url[0] == 'logout') {
            return (new LoginController)->logout($_POST);
        }
     

        // Auth middleware
        if(!isset($_SESSION['email'])) {
            header('Location: /login');
            die;

        }

        /// ACCOUNTS
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) ==1 && $url[0] == 'accounts') { 
            return (new AccountsController)->index();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) ==2 && $url[0] == 'accounts' && $url[1] == 'create') { 
            return (new AccountsController)->create();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) ==2 && $url[0] == 'accounts' && $url[1] == 'store') { 
            return (new AccountsController)->store($_POST);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) ==3 && $url[0] == 'accounts' && $url[1] == 'edit') { 
            return (new AccountsController)->edit($url[2]);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) ==3 && $url[0] == 'accounts' && $url[1] == 'update') { 
            return (new AccountsController)->update($url[2],$_POST);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) ==3 && $url[0] == 'accounts' && $url[1] == 'delete') { 
            return (new AccountsController)->delete($url[2]);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) ==3 && $url[0] == 'accounts' && $url[1] == 'destroy') { 
            return (new AccountsController)->destroy($url[2]);
        }
        /// ACCOUNTS END

        
        else {
            return self::view('404',[
                'pageTitle' => 'Page not found'
              ]);
        }
    }

    static public function view($path, $data = null)
    {
        if ($data) {
            extract($data);
        }

        ob_start();

        require __DIR__ . '/../views/top.php';
        require __DIR__ . '/../views/' . $path . '.php';
        require __DIR__ . '/../views/bottom.php';

        
        return ob_get_clean();
    }
}