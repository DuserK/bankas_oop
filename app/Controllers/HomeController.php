<?php

namespace Bank\Controllers;

use Bank\App;

class HomeController {
    
  public function index()
  {
    App::view('home/index',['pageTitle' => 'Home']);
  }
  
}