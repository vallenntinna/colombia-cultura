<?php
declare(strict_types=1);

/**
 * Front controller del sitio "Cultura de Colombia".
 * Todas las peticiones pasan por aquí y se enrutan a su vista.
 */

require __DIR__ . '/app/bootstrap.php';

/** @var array<string, callable> $routes */
$routes = require APP_PATH . '/routes.php';

// Resolver la ruta a partir de la URL (limpia o ?p=slug).
$path = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

if (BASE_URL !== '' && str_starts_with($path, BASE_URL)) {
    $path = substr($path, strlen(BASE_URL));
}

$path = trim($path, '/');
$segments = $path === '' ? [] : explode('/', $path);

$route = $segments[0] ?? '';
$route = $route === '' ? 'inicio' : $route;
$param = $segments[1] ?? null;

// Compatibilidad con index.php?p=regiones
if (($path === '' || $route === 'index.php') && isset($_GET['p'])) {
    $route = (string) $_GET['p'];
    $param = $_GET['slug'] ?? null;
}

$GLOBALS['route'] = $route;

if (!isset($routes[$route])) {
    http_response_code(404);
    render('404', [], 'Página no encontrada');
    exit;
}

($routes[$route])($param);
