<?php

namespace App\Controller;

class Controller
{
    protected function render($view, $data = [], $returnContent = false)
{
    extract($data);
    ob_start();
    include "pages/$view.php";
    $content = ob_get_clean();
    if ($returnContent) {
        return $content;
    } else {
        echo $content;
    }
}

protected function renderLayout($content)
{
    include "pages/layout.php";
}

public function renderPage($view, $pageTitle)
{
    $content = $this->render($view, compact('pageTitle'), true);
    $this->renderLayout($content);
}

}
