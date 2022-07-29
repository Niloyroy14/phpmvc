<?php

use Pecee\SimpleRouter\SimpleRouter;
use App\Controllers\PortfolioController;
use App\Controllers\WelcomeController;

// SimpleRouter::get('phpmvc/', function() {
//     return view('index.php');
// });

SimpleRouter::get('phpmvc/', [WelcomeController::class, 'index']);

SimpleRouter::get('phpmvc/portfolio', [PortfolioController::class, 'index']);