<?php

function controllers_autoload($className) {
    $file = __DIR__ . '/app/controllers/' . $className . '.php';
    if (file_exists($file)) {
        include_once $file;
    } else {
        throw new Exception("Controller file not found: " . $file);
    }
}
