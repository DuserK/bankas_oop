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
  public function edit(int $id)
  {
    $data = new FileWriter('accounts');
    $account = $data->show($id);

    return App::view('accounts/edit', [
      'pageTitle' => 'Edit account',
      'account' => $account
    ]);
  }
  public function update(int $id, array $request)
  {
    $data = new FileWriter('accounts');
    $account = $data->show($id);

    $amount = $request['amount'];

      if(isset($request['add']) && $amount >= 0) {
        $account['balance'] += $amount;

        $data->update($id, $account);
        header('Location: /accounts/edit/'.$id);
      }
      if(isset($request['withdraw'])&& $amount >= 0) {

        if($account['balance'] >= $amount) { 

          $account['balance'] -= $amount;
          $data->update($id, $account);
          header('Location: /accounts/edit/'.$id);
        }
        else {
         echo 'Not enough money';
         header('Location: /accounts/edit/'.$id);
        }
        
      }
    }
  public function delete(int $id)
  {
    $account = (new FileWriter('accounts'))->show($id);
    return App::view('accounts/delete', [
      'pageTitle' => 'Ištrinti sąskaitą',
      'account' => $account
     ]);
  }
}