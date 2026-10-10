<?php
/**
 * Router para el servidor embebido de PHP:
 *   php -S localhost:8000 scripts/router.php
 *
 * Sirve archivos estáticos directamente y el resto lo manda a index.php.
 */

$root = realpath(__DIR__ . '/..');
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';

// Bloquear acceso directo a carpetas internas.
$protegidas = ['/app/', '/views/', '/database/', '/scripts/', '/src/'];
foreach ($protegidas as $p) {
    if (str_starts_with($path, $p)) {
        require $root . '/index.php';
        return true;
    }
}

$file = realpath($root . $path);
if ($path !== '/' && $file && is_file($file) && str_starts_with($file, $root)) {
    return false; // dejar que el servidor sirva el archivo
}

require $root . '/index.php';
return true;
