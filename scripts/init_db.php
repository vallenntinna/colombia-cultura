<?php
declare(strict_types=1);

/**
 * Inicializa la base de datos SQLite del sitio.
 * Uso:
 *   php scripts/init_db.php          -> crea la BD si no existe
 *   php scripts/init_db.php --fresh  -> borra y recrea desde schema + seed
 */

require __DIR__ . '/../app/bootstrap.php';

$fresh = in_array('--fresh', $argv ?? [], true);

if ($fresh && file_exists(DB_PATH)) {
    unlink(DB_PATH);
    echo "Base de datos anterior eliminada.\n";
}

try {
    db(); // dispara la creación/seed automático si hace falta
} catch (Throwable $e) {
    fwrite(STDERR, 'Error al inicializar: ' . $e->getMessage() . "\n");
    exit(1);
}

$tablas = ['regiones', 'gastronomia', 'musica', 'festividades', 'personajes', 'simbolos', 'sitios', 'datos_curiosos'];

echo "Base de datos lista en: " . DB_PATH . "\n";
echo str_repeat('-', 42) . "\n";
foreach ($tablas as $t) {
    printf("  %-16s %4d registros\n", $t, contar($t));
}
echo str_repeat('-', 42) . "\n";
echo "Total cargado correctamente.\n";
