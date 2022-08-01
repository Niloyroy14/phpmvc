<?php

namespace App\Controllers;

use App\Base\Controller;
use App\Models\Portfolio;

class PortfolioController extends Controller
{

    public function index()
    {

        try {
            $portfolio = new Portfolio();
            $status = isset($_GET['status']) ? intval($_GET['status']) : 1;
            $portfolios = $portfolio->get($status);
        } catch (\Throwable $th) {
            throw $th;
        }

        //return view('portfolio/index.php',['portfolios'=>$portfolios]); //same
        return view('portfolio/index.php', compact('portfolios'));
    }
}
