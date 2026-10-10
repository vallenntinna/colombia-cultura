<?php
/** @var array $sitios */
/** @var array $regiones */

$heroEyebrow = 'Turismo';
$heroEmoji   = '🏞️';
require VIEW_PATH . '/partials/page-hero.php';
?>

<section class="container-x py-14 lg:py-16">
    <div class="reveal flex flex-wrap items-center gap-2" data-filters data-target="destinosGrid">
        <button type="button" data-filter="all" class="filter-btn is-active">Todos los destinos</button>
        <?php foreach ($regiones as $r): ?>
            <button type="button" data-filter="<?= e($r['slug']) ?>" class="filter-btn"><?= e($r['emoji']) ?> <?= e($r['nombre']) ?></button>
        <?php endforeach; ?>
    </div>

    <div id="destinosGrid" class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($sitios as $s): ?>
            <div data-region="<?= e($s['region_slug'] ?? '') ?>" class="h-full">
                <?php
                $card = [
                    'emoji' => $s['emoji'], 'color_ini' => $s['color_ini'], 'color_fin' => $s['color_fin'],
                    'tag' => $s['categoria'] ?? '', 'title' => $s['nombre'],
                    'text' => excerpt($s['descripcion'], 150),
                    'chips' => array_filter([$s['ciudad'], $s['region_nombre']]),
                ];
                require VIEW_PATH . '/partials/card.php';
                ?>
            </div>
        <?php endforeach; ?>
    </div>

    <p id="destinosEmpty" class="hidden py-16 text-center text-slate-500">No hay destinos en esta región.</p>
</section>
