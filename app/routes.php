<?php
declare(strict_types=1);

/**
 * Definición de rutas del sitio.
 * Cada ruta recibe el segundo segmento de la URL (param) y renderiza una vista.
 */

return [

    'inicio' => function (): void {
        render('inicio', [
            'regiones'     => get_regiones(),
            'gastronomia'  => array_slice(get_gastronomia(), 0, 6),
            'musica'       => array_slice(get_musica(), 0, 6),
            'festividades' => array_slice(get_festividades(), 0, 6),
            'personajes'   => array_slice(get_personajes(), 0, 4),
            'simbolos'     => get_simbolos(),
            'datos'        => get_datos_curiosos(),
            'stats'        => [
                'regiones'     => contar('regiones'),
                'gastronomia'  => contar('gastronomia'),
                'musica'       => contar('musica'),
                'festividades' => contar('festividades'),
            ],
        ], 'Inicio', 'Explora las regiones, la gastronomía, la música y las festividades que hacen de Colombia un país único.');
    },

    'regiones' => function (): void {
        render('regiones', [
            'regiones' => get_regiones(),
        ], 'Regiones', 'Las seis regiones naturales y culturales de Colombia.');
    },

    'region' => function (?string $slug): void {
        $region = $slug ? get_region($slug) : null;
        if (!$region) {
            http_response_code(404);
            render('404', [], 'Región no encontrada');
            return;
        }
        $id = (int) $region['id'];
        render('region', [
            'region'       => $region,
            'gastronomia'  => get_gastronomia($id),
            'musica'       => get_musica($id),
            'festividades' => get_festividades($id),
            'sitios'       => get_sitios($id),
        ], $region['nombre'], (string) $region['subtitulo']);
    },

    'gastronomia' => function (): void {
        render('gastronomia', [
            'platos'   => get_gastronomia(),
            'regiones' => get_regiones(),
        ], 'Gastronomía', 'Sabores, platos típicos e ingredientes de la cocina colombiana.');
    },

    'musica' => function (): void {
        render('musica', [
            'ritmos'   => get_musica(),
            'regiones' => get_regiones(),
        ], 'Música', 'Cumbia, vallenato, currulao, joropo y muchos ritmos más.');
    },

    'festividades' => function (): void {
        render('festividades', [
            'fiestas'  => get_festividades(),
            'regiones' => get_regiones(),
        ], 'Festividades', 'Carnavales, ferias y festivales que celebran la identidad colombiana.');
    },

    'personajes' => function (): void {
        render('personajes', [
            'personajes' => get_personajes(),
        ], 'Personajes', 'Artistas, escritores y músicos que han marcado la cultura colombiana.');
    },

    'simbolos' => function (): void {
        render('simbolos', [
            'simbolos' => get_simbolos(),
        ], 'Símbolos', 'Símbolos patrios, naturales y culturales de Colombia.');
    },

    'destinos' => function (): void {
        render('destinos', [
            'sitios'   => get_sitios(),
            'regiones' => get_regiones(),
        ], 'Destinos', 'Lugares imperdibles de la geografía colombiana.');
    },

    'contacto' => function (): void {
        $errores = [];
        $exito   = false;
        $old     = ['nombre' => '', 'email' => '', 'asunto' => '', 'mensaje' => ''];

        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
            $old['nombre']  = trim((string) ($_POST['nombre'] ?? ''));
            $old['email']   = trim((string) ($_POST['email'] ?? ''));
            $old['asunto']  = trim((string) ($_POST['asunto'] ?? ''));
            $old['mensaje'] = trim((string) ($_POST['mensaje'] ?? ''));

            if ($old['nombre'] === '' || mb_strlen($old['nombre']) < 3) {
                $errores['nombre'] = 'Escribe tu nombre (mínimo 3 caracteres).';
            }
            if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'Ingresa un correo electrónico válido.';
            }
            if (mb_strlen($old['mensaje']) < 10) {
                $errores['mensaje'] = 'El mensaje debe tener al menos 10 caracteres.';
            }

            if (!$errores) {
                try {
                    db_run(
                        'INSERT INTO mensajes (nombre, email, asunto, mensaje, ip)
                         VALUES (:nombre, :email, :asunto, :mensaje, :ip)',
                        [
                            'nombre'  => $old['nombre'],
                            'email'   => $old['email'],
                            'asunto'  => $old['asunto'] !== '' ? $old['asunto'] : 'Sin asunto',
                            'mensaje' => $old['mensaje'],
                            'ip'      => $_SERVER['REMOTE_ADDR'] ?? null,
                        ]
                    );
                    $exito = true;
                    $old = ['nombre' => '', 'email' => '', 'asunto' => '', 'mensaje' => ''];
                } catch (Throwable $e) {
                    $errores['general'] = 'No pudimos guardar tu mensaje. Intenta de nuevo.';
                }
            }
        }

        render('contacto', [
            'errores' => $errores,
            'exito'   => $exito,
            'old'     => $old,
        ], 'Contacto', 'Escríbenos y comparte tu experiencia con la cultura colombiana.');
    },

];
