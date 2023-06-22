<?php

namespace Bank\Controllers\AccountsController;

class AccountsController {
    
  public function index()
  {
    echo '<h1>Accounts</h1>';
  }
  public function show(int $id)
  {
    echo '<h1>AccountsController</h1>';
    echo '<h2>Show</h2>';
    echo '<p>Account ' . $id . '</p>';
  }
}