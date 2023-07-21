<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\Messages;
use Bank\OldData;

class AccountsController {
    
  public function index()
  {
    $data = App::get('accounts');

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
    $old = OldData::getFlashData();
    extract($request);

    $error1 = 0;
    $error2 = 0;
    $error3 = 0;

    if (strlen($name) < 3 || strlen($surname) < 3) {
      Messages::addMessage('warning', 'Vardą ir pavardę turi sudaryti bent 3 simboliai');
      $error1 = 1;
  }

  if (!ctype_digit($personID) || strlen(trim($personID)) !== 11) {
      Messages::addMessage('warning', 'Asmens kodą turi sudaryti 11 skaitmenų');
      $error2 = 1;
  }

  foreach ($accounts as $account) {
      if ($account['personID'] === $personID) {
        Messages::addMessage('warning', 'Vartotojas tokiu asmens kodu jau įvestas');
        $error3 = 1;
      }
      
    }
    
      if ($error1 || $error2 || $error3) {
        OldData::flashData($request);
        header("Location: /accounts/create");
        die;
      }
    $data = App::get('accounts');
    $data->create($request);
    Messages::addMessage('success', 'Nauja sąskaita sėkmingai sukurta');
    header('Location: /accounts');
  }
  public function edit(int $id)
  {
    $data = App::get('accounts');
    $account = $data->show($id);

    return App::view('accounts/edit', [
      'pageTitle' => 'Edit account',
      'account' => $account
    ]);
  }
  public function update(int $id, array $request)
  {
    $data = App::get('accounts');
    $account = $data->show($id);

    $amount = $request['amount'];

      if(isset($request['add']) && $amount >= 0) {
        $account['balance'] += $amount;

        $data->update($id, $account);
        Messages::addMessage('success', 'Suma sėkmingai pridėta prie sąskaitos');
        header('Location: /accounts/edit/'.$id);
        print_r($_SESSION);
      }
      if(isset($request['withdraw'])&& $amount >= 0) {

        if($account['balance'] >= $amount) { 

          $account['balance'] -= $amount;
          $data->update($id, $account);
          Messages::addMessage('success', 'Suma sėkmingai nuskaičiuota');
          header('Location: /accounts/edit/'.$id);
        }
        else {
          Messages::addMessage('danger', 'Nepakankamas sąskaitos likutis');
         header('Location: /accounts/edit/'.$id);
        }
        
      }
    }
  public function delete(int $id)
  {
    $account = (App::get('accounts'))->show($id);
    return App::view('accounts/delete', [
      'pageTitle' => 'Ištrinti sąskaitą',
      'account' => $account
     ]);
  }

  public function destroy(int $id)
  {
    $data = App::get('accounts');
    $account = $data->show($id);
    if($account['balance'] == 0) {
      $data->delete($id);
      Messages::addMessage('success', 'Sąskaita sėkmingai ištrinta');
      header('Location: /accounts');
    }
    else {
      Messages::addMessage('danger', 'Sąskaitoje yra lėšų. Ištrinti negalima');
      header('Location: /accounts/delete/'.$id);
    }

  }
}