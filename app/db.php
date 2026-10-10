<?php
declare(strict_types=1);

/**
 * Conexión a la base de datos SQLite mediante PDO.
 * Si el archivo .sqlite no existe, se crea y se cargan schema.sql + seed.sql.
 */
function db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dir = dirname(DB_PATH);
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }

    $isNew = !file_exists(DB_PATH) || filesize(DB_PATH) === 0;

    $pdo = new PDO('sqlite:' . DB_PATH, null, null, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
    $pdo->exec('PRAGMA foreign_keys = ON');

    if ($isNew) {
        db_seed($pdo);
    }

    return $pdo;
}

/**
 * Crea la estructura y carga los datos iniciales.
 */
function db_seed(PDO $pdo): void
{
    $schema = file_get_contents(SCHEMA_PATH);
    $seed   = file_exists(SEED_PATH) ? file_get_contents(SEED_PATH) : '';

    $pdo->exec('BEGIN');
    try {
        $pdo->exec($schema);
        if ($seed !== '') {
            $pdo->exec($seed);
        }
        $pdo->exec('COMMIT');
    } catch (Throwable $e) {
        $pdo->exec('ROLLBACK');
        throw $e;
    }
}

/**
 * Ejecuta una consulta preparada y devuelve todas las filas.
 */
function db_all(string $sql, array $params = []): array
{
    $stmt = db()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

/**
 * Ejecuta una consulta preparada y devuelve la primera fila o null.
 */
function db_one(string $sql, array $params = []): ?array
{
    $stmt = db()->prepare($sql);
    $stmt->execute($params);
    $row = $stmt->fetch();
    return $row === false ? null : $row;
}

/**
 * Ejecuta una sentencia (INSERT/UPDATE/DELETE) y devuelve filas afectadas.
 */
function db_run(string $sql, array $params = []): int
{
    $stmt = db()->prepare($sql);
    $stmt->execute($params);
    return $stmt->rowCount();
}
