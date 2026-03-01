<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Page d'accueil
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Page des fonctionnalités
     */
    public function features()
    {
        return view('pages.features');
    }
}