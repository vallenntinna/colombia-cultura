<?php
declare(strict_types=1);

/**
 * Funciones de apoyo: escape, URLs, assets, consultas y render.
 */

/** Escapa texto para HTML. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Devuelve un valor de configuración. */
function config(string $key, ?string $default = null): ?string
{
    return $GLOBALS['config'][$key] ?? $default;
}

/** Construye una URL interna. Ej: url('regiones') o url('region', 'caribe'). */
function url(string $route = '', ?string $param = null, array $query = []): string
{
    $base = BASE_URL;
    $path = $route === '' ? '/' : '/' . rawurlencode($route);
    if ($param !== null && $param !== '') {
        $path .= '/' . rawurlencode($param);
    }
    $qs = $query ? '?' . http_build_query($query) : '';
    return ($base === '' ? '' : $base) . $path . $qs;
}

/** Ruta absoluta a un asset, con cache-busting por fecha de modificación. */
function asset(string $path): string
{
    $path = ltrim($path, '/');
    $full = ASSET_PATH . '/' . str_replace('/', DIRECTORY_SEPARATOR, $path);
    $version = file_exists($full) ? filemtime($full) : time();
    return url_ltrim('assets/' . $path) . '?v=' . $version;
}

/** Convierte una ruta relativa en URL (respetando BASE_URL). */
function url_ltrim(string $path): string
{
    $path = ltrim($path, '/');
    return (BASE_URL === '' ? '' : BASE_URL) . '/' . $path;
}

/** Ruta activa actual. */
function current_route(): string
{
    return $GLOBALS['route'] ?? 'inicio';
}

/** Compara la ruta activa. */
function is_active(string $route): bool
{
    return current_route() === $route;
}

/** Clase "active" de navegación. */
function nav_active(string $route, string $class = 'text-col-blue'): string
{
    return is_active($route) ? $class : '';
}

/** Primeros N caracteres de un texto. */
function excerpt(?string $text, int $length = 120): string
{
    $text = trim((string) $text);
    if (mb_strlen($text) <= $length) {
        return $text;
    }
    return rtrim(mb_substr($text, 0, $length), ' ') . '…';
}

/** Genera un degradado CSS a partir de dos colores. */
function gradient(string $from, string $to): string
{
    return "background-image:linear-gradient(135deg, {$from} 0%, {$to} 100%)";
}

// ---------------------------------------------------------------------
// Accesos a datos
// ---------------------------------------------------------------------
function get_regiones(): array
{
    return db_all('SELECT * FROM regiones ORDER BY orden, nombre');
}

function get_region(string $slug): ?array
{
    return db_one('SELECT * FROM regiones WHERE slug = :slug', ['slug' => $slug]);
}

function get_gastronomia(?int $regionId = null): array
{
    if ($regionId) {
        return db_all('SELECT g.*, r.nombre AS region_nombre, r.slug AS region_slug
                       FROM gastronomia g LEFT JOIN regiones r ON r.id = g.region_id
                       WHERE g.region_id = :id ORDER BY g.orden, g.nombre', ['id' => $regionId]);
    }
    return db_all('SELECT g.*, r.nombre AS region_nombre, r.slug AS region_slug
                   FROM gastronomia g LEFT JOIN regiones r ON r.id = g.region_id
                   ORDER BY g.orden, g.nombre');
}

function get_musica(?int $regionId = null): array
{
    if ($regionId) {
        return db_all('SELECT m.*, r.nombre AS region_nombre, r.slug AS region_slug
                       FROM musica m LEFT JOIN regiones r ON r.id = m.region_id
                       WHERE m.region_id = :id ORDER BY m.orden, m.nombre', ['id' => $regionId]);
    }
    return db_all('SELECT m.*, r.nombre AS region_nombre, r.slug AS region_slug
                   FROM musica m LEFT JOIN regiones r ON r.id = m.region_id
                   ORDER BY m.orden, m.nombre');
}

function get_festividades(?int $regionId = null): array
{
    if ($regionId) {
        return db_all('SELECT f.*, r.nombre AS region_nombre, r.slug AS region_slug
                       FROM festividades f LEFT JOIN regiones r ON r.id = f.region_id
                       WHERE f.region_id = :id ORDER BY f.orden, f.nombre', ['id' => $regionId]);
    }
    return db_all('SELECT f.*, r.nombre AS region_nombre, r.slug AS region_slug
                   FROM festividades f LEFT JOIN regiones r ON r.id = f.region_id
                   ORDER BY f.orden, f.nombre');
}

function get_personajes(): array
{
    return db_all('SELECT * FROM personajes ORDER BY orden, nombre');
}

function get_simbolos(): array
{
    return db_all('SELECT * FROM simbolos ORDER BY orden, nombre');
}

function get_sitios(?int $regionId = null): array
{
    if ($regionId) {
        return db_all('SELECT s.*, r.nombre AS region_nombre, r.slug AS region_slug
                       FROM sitios s LEFT JOIN regiones r ON r.id = s.region_id
                       WHERE s.region_id = :id ORDER BY s.orden, s.nombre', ['id' => $regionId]);
    }
    return db_all('SELECT s.*, r.nombre AS region_nombre, r.slug AS region_slug
                   FROM sitios s LEFT JOIN regiones r ON r.id = s.region_id
                   ORDER BY s.orden, s.nombre');
}

function get_datos_curiosos(): array
{
    return db_all('SELECT * FROM datos_curiosos ORDER BY orden');
}

function contar(string $tabla): int
{
    $permitidas = ['regiones', 'gastronomia', 'musica', 'festividades', 'personajes', 'simbolos', 'sitios', 'datos_curiosos'];
    if (!in_array($tabla, $permitidas, true)) {
        return 0;
    }
    $row = db_one("SELECT COUNT(*) AS total FROM {$tabla}");
    return (int) ($row['total'] ?? 0);
}

/**
 * Renderiza una vista dentro del layout principal.
 */
function render(string $view, array $data = [], string $title = '', string $description = ''): void
{
    extract($data, EXTR_SKIP);

    $pageTitle = $title !== '' ? $title . ' · ' . config('name') : config('name');
    $pageHeading = $title !== '' ? $title : (string) config('name');
    $pageDescription = $description !== '' ? $description : (string) config('description');

    ob_start();
    $file = VIEW_PATH . '/pages/' . $view . '.php';
    if (!file_exists($file)) {
        $file = VIEW_PATH . '/pages/404.php';
        http_response_code(404);
    }
    require $file;
    $content = ob_get_clean();

    require VIEW_PATH . '/layout.php';
}
