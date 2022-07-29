<?php

 namespace App\Controllers;

use App\Base\Controller;

 class WelcomeController extends Controller{

    public function index(){
        //require_once VIEWS . '/index.php';
         return view('index.php');
    }

 }