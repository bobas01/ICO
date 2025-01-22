<?php

namespace App\Controller;

class RulesController extends Controller
{
    public function index()
    {   
        $pageTitle = "Règles des jeux - ICO Board Game";
        $content = $this->render('regles_du_jeu/index', compact('pageTitle'), true);
        $this->renderLayout($content);
    }
}