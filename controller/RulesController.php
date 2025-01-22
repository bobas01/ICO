<?php

namespace App\Controller;

class RulesController extends Controller
{
    public function index()
    {
        $this->renderPage('règles_du_jeu/index', 'Règles des jeux - ICO Board Game');
    }
}