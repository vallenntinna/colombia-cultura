<?php
declare(strict_types=1);

/**
 * Bootstrap del sitio "Cultura de Colombia".
 * Carga configuración, conexión PDO/SQLite y funciones de apoyo.
 */

// ---------------------------------------------------------------------
// Rutas base del proyecto
// ---------------------------------------------------------------------
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEW_PATH', ROOT_PATH . '/views');
define('ASSET_PATH', ROOT_PATH . '/assets');
define('DB_PATH', ROOT_PATH . '/database/cultura_colombia.sqlite');
define('SCHEMA_PATH', ROOT_PATH . '/database/schema.sql');
define('SEED_PATH', ROOT_PATH . '/database/seed.sql');

// ---------------------------------------------------------------------
// Configuración general
// ---------------------------------------------------------------------
$config = [
    'name'        => 'Cultura de Colombia',
    'tagline'     => 'Colombia, la magia de lo diverso',
    'description' => 'Descubre la cultura de Colombia: sus regiones, gastronomía, música, festividades, personajes, símbolos y destinos.',
    'locale'      => 'es_CO',
];
$GLOBALS['config'] = $config;

// Zona horaria y errores (en producción puedes silenciar los errores).
date_default_timezone_set('America/Bogota');
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Base URL detectada automáticamente (funciona en raíz o subcarpeta).
if (!defined('BASE_URL')) {
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
    $scriptDir = rtrim($scriptDir === '/' ? '' : $scriptDir, '/');
    define('BASE_URL', $scriptDir);
}

require_once APP_PATH . '/db.php';
require_once APP_PATH . '/functions.php';
