<?php
/** @var array $ritmos */
/** @var array $regiones */

$heroEyebrow = 'Ritmos';
$heroEmoji   = '🎵';
require VIEW_PATH . '/partials/page-hero.php';
?>

<section class="container-x py-14 lg:py-16">
    <div class="reveal flex flex-wrap items-center gap-2" data-filters data-target="musicaGrid">
        <button type="button" data-filter="all" class="filter-btn is-active">Todos los ritmos</button>
        <?php foreach ($regiones as $r): ?>
            <button type="button" data-filter="<?= e($r['slug']) ?>" class="filter-btn"><?= e($r['emoji']) ?> <?= e($r['nombre']) ?></button>
        <?php endforeach; ?>
    </div>

    <div id="musicaGrid" class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($ritmos as $m): ?>
            <div data-region="<?= e($m['region_slug'] ?? '') ?>" class="h-full">
                <?php
                $card = [
                    'emoji' => $m['emoji'], 'color_ini' => $m['color_ini'], 'color_fin' => $m['color_fin'],
                    'tag' => $m['region_nombre'] ?? '', 'title' => $m['nombre'],
                    'text' => excerpt($m['descripcion'], 150),
                    'chips' => array_slice(array_map('trim', explode(',', (string) $m['instrumentos'])), 0, 3),
                ];
                require VIEW_PATH . '/partials/card.php';
                ?>
            </div>
        <?php endforeach; ?>
    </div>

    <p id="musicaEmpty" class="hidden py-16 text-center text-slate-500">No hay ritmos en esta región.</p>
</section>
