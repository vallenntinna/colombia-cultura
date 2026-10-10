<?php
/** @var array $region */
/** @var array $gastronomia */
/** @var array $musica */
/** @var array $festividades */
/** @var array $sitios */

$heroEyebrow = 'Región';
$heroEmoji   = $region['emoji'];
$heroImage   = gradient($region['color_ini'], $region['color_fin']);
require VIEW_PATH . '/partials/page-hero.php';

$secciones = [
    ['id' => 'gastronomia', 'eyebrow' => 'Sabores', 'titulo' => 'Gastronomía típica', 'items' => $gastronomia],
    ['id' => 'musica',      'eyebrow' => 'Ritmos',  'titulo' => 'Música y bailes',  'items' => $musica],
    ['id' => 'fiestas',     'eyebrow' => 'Fiestas', 'titulo' => 'Festividades',     'items' => $festividades],
    ['id' => 'destinos',    'eyebrow' => 'Destinos','titulo' => 'Lugares para visitar', 'items' => $sitios],
];
?>

<section class="container-x py-16 lg:py-20">
    <div class="reveal mx-auto max-w-3xl text-center">
        <p class="prose-col"><?= e($region['descripcion']) ?></p>
        <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
            <span class="badge">🏛 Capital: <?= e($region['capital']) ?></span>
            <span class="badge">📍 <?= count(explode(',', (string) $region['departamentos'])) ?> departamentos</span>
        </div>
        <p class="mt-4 text-sm text-slate-500"><strong class="font-semibold text-slate-700">Departamentos:</strong> <?= e($region['departamentos']) ?></p>
    </div>
</section>

<?php foreach ($secciones as $sec): ?>
    <?php if (!empty($sec['items'])): ?>
        <section id="<?= e($sec['id']) ?>" class="border-t border-slate-200/70 py-16 even:bg-white">
            <div class="container-x">
                <div class="reveal">
                    <span class="eyebrow"><?= e($sec['eyebrow']) ?></span>
                    <h2 class="section-title"><?= e($sec['titulo']) ?></h2>
                </div>
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach ($sec['items'] as $item): ?>
                        <?php
                        $card = [
                            'emoji'      => $item['emoji'] ?? '✨',
                            'color_ini'  => $item['color_ini'] ?? $region['color_ini'],
                            'color_fin'  => $item['color_fin'] ?? $region['color_fin'],
                            'tag'        => $item['ciudad'] ?? $item['mes'] ?? $region['nombre'],
                            'title'      => $item['nombre'],
                            'text'       => excerpt($item['descripcion'], 140),
                            'chips'      => isset($item['instrumentos']) ? array_slice(array_map('trim', explode(',', (string) $item['instrumentos'])), 0, 3) : [],
                        ];
                        require VIEW_PATH . '/partials/card.php';
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endforeach; ?>

<section class="container-x pb-8 pt-16">
    <div class="reveal flex flex-wrap items-center justify-between gap-4 rounded-3xl border border-slate-200 bg-white p-6 shadow-soft sm:p-8">
        <div>
            <p class="font-display text-lg font-bold text-slate-900">Sigue explorando</p>
            <p class="text-sm text-slate-500">Vuelve al mapa de regiones o descubre un nuevo destino.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="<?= e(url('regiones')) ?>" class="btn-primary">Todas las regiones</a>
            <a href="<?= e(url('destinos')) ?>" class="btn border border-slate-200 text-slate-700 hover:bg-slate-50">Ver destinos</a>
        </div>
    </div>
</section>
