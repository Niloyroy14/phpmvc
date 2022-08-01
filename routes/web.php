<?php

use App\Base\Route;
use App\Controllers\PortfolioController;
use App\Controllers\WelcomeController;

// Route::get('phpmvc/', function() {
//     return view('index.php');
// });

Route::get('/', [WelcomeController::class, 'index']);

Route::get('portfolio', [PortfolioController::class, 'index']);
