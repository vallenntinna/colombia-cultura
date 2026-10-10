<?php
/** @var array $fiestas */
/** @var array $regiones */

$heroEyebrow = 'Celebración';
$heroEmoji   = '🎉';
require VIEW_PATH . '/partials/page-hero.php';
?>

<section class="container-x py-14 lg:py-16">
    <div class="reveal flex flex-wrap items-center gap-2" data-filters data-target="fiestasGrid">
        <button type="button" data-filter="all" class="filter-btn is-active">Todas</button>
        <?php foreach ($regiones as $r): ?>
            <button type="button" data-filter="<?= e($r['slug']) ?>" class="filter-btn"><?= e($r['emoji']) ?> <?= e($r['nombre']) ?></button>
        <?php endforeach; ?>
    </div>

    <div id="fiestasGrid" class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($fiestas as $f): ?>
            <div data-region="<?= e($f['region_slug'] ?? '') ?>" class="h-full">
                <?php
                $chips = array_filter([$f['ciudad'], $f['mes']]);
                if ((int) $f['es_patrimonio'] === 1) {
                    $chips[] = 'Patrimonio UNESCO';
                }
                $card = [
                    'emoji' => $f['emoji'], 'color_ini' => $f['color_ini'], 'color_fin' => $f['color_fin'],
                    'tag' => $f['region_nombre'] ?? '', 'title' => $f['nombre'],
                    'text' => excerpt($f['descripcion'], 150), 'chips' => $chips,
                ];
                require VIEW_PATH . '/partials/card.php';
                ?>
            </div>
        <?php endforeach; ?>
    </div>

    <p id="fiestasEmpty" class="hidden py-16 text-center text-slate-500">No hay festividades en esta región.</p>
</section>
