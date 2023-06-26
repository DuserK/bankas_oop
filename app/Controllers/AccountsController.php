<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;

class AccountsController {
    
  public function index()
  {
    $data = new FileWriter('accounts');

    return App::view('accounts/index', [
      'pageTitle' => 'Accounts list',
      'accounts' => $data->showAll()
    ]);
  }
  public function create()
  {
    return App::view('accounts/create', [
      'pageTitle' => 'Create account'
    ]);

  }
  public function store(array $request)
  {
    $data = new FileWriter('accounts');
    $data->create($request);
    
    header('Location: /accounts');
  }
}