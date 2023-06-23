<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;

class AccountsController {
    
  public function index()
  {
    $data = new FileWriter('accounts');

    return App::view('accountsList/index', [
      'pageTitle' => 'Accounts list',
      'accounts' => $data->showAll()
    ]);
  }
  public function show(int $id)
  {

  }
}