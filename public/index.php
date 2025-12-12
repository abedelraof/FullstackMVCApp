<?php

const APP_ROOT = __DIR__ . '/../app';


// public/index.php
// Front controller + tiny router

spl_autoload_register(function ($class) {
    $paths = [
        APP_ROOT . DIRECTORY_SEPARATOR .  'controllers' .  DIRECTORY_SEPARATOR .  $class . '.php',
        APP_ROOT . DIRECTORY_SEPARATOR .  'models' . DIRECTORY_SEPARATOR . $class . '.php',
        APP_ROOT . DIRECTORY_SEPARATOR .  'core' . DIRECTORY_SEPARATOR . $class . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

$controllerKey = isset($_GET['c']) ? $_GET['c'] : 'posts';
$action        = isset($_GET['a']) ? $_GET['a'] : 'index';
$controllerCls = ucfirst($controllerKey) . 'Controller';

if (!class_exists($controllerCls)) {
    die('Controller not found: ' . htmlspecialchars($controllerCls));
}

$controller = new $controllerCls();

if (!method_exists($controller, $action)) {
    die('Action not found: ' . htmlspecialchars($action));
}

// If an id is provided, pass it to actions that need it (like show)
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($id !== null && $action === 'show') {
    $controller->{$action}($id);
} else {
    $controller->{$action}();
}
