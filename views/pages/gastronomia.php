<?php
/** @var array $platos */
/** @var array $regiones */

$heroEyebrow = 'Sabores';
$heroEmoji   = '🍽️';
require VIEW_PATH . '/partials/page-hero.php';
?>

<section class="container-x py-14 lg:py-16">
    <div class="reveal flex flex-wrap items-center gap-2" data-filters data-target="gastronomiaGrid">
        <button type="button" data-filter="all" class="filter-btn is-active">Todas las regiones</button>
        <?php foreach ($regiones as $r): ?>
            <button type="button" data-filter="<?= e($r['slug']) ?>" class="filter-btn"><?= e($r['emoji']) ?> <?= e($r['nombre']) ?></button>
        <?php endforeach; ?>
    </div>

    <div id="gastronomiaGrid" class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($platos as $p): ?>
            <div data-region="<?= e($p['region_slug'] ?? '') ?>" class="h-full">
                <?php
                $card = [
                    'emoji' => $p['emoji'], 'color_ini' => $p['color_ini'], 'color_fin' => $p['color_fin'],
                    'tag' => $p['region_nombre'] ?? '', 'title' => $p['nombre'],
                    'text' => excerpt($p['descripcion'], 150),
                    'chips' => array_slice(array_map('trim', explode(',', (string) $p['ingredientes'])), 0, 3),
                ];
                require VIEW_PATH . '/partials/card.php';
                ?>
            </div>
        <?php endforeach; ?>
    </div>

    <p id="gastronomiaEmpty" class="hidden py-16 text-center text-slate-500">No hay platos en esta región.</p>
</section>
