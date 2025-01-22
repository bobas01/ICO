<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $pageTitle = "Accueil - ICO Board Game";
        $content = $this->render('home/index', compact('pageTitle'), true);
        $this->renderLayout($content);
    }

    
}

