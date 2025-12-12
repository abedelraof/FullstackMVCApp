<?php
// app/core/Controller.php

class Controller
{
    protected function render($view, $data = [])
    {
        // $view format: 'posts/index'
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            die('View not found: ' . htmlspecialchars($view));
        }

        // Expose $data keys as variables in the view
        extract($data);

        require __DIR__ . '/../views/layout/header.php';
        require $viewPath;
        require __DIR__ . '/../views/layout/footer.php';
    }

    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
