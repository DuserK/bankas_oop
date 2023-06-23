<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;

class AccountsController {
    
  public function index()
  {
    $data = new FileWriter;
  }
  public function show(int $id)
  {
    echo '<h1>AccountsController</h1>';
    echo '<h2>Show</h2>';
    echo '<p>Account ' . $id . '</p>';
  }
}