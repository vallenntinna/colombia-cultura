<?php
/** @var array $personajes */
$heroEyebrow = 'Talento';
$heroEmoji   = '⭐';
require VIEW_PATH . '/partials/page-hero.php';
?>
<section class="container-x py-16 lg:py-20">
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($personajes as $p): ?>
            <?php
            $vida = $p['nacimiento'] ?: '—';
            if (!empty($p['fallecimiento'])) {
                $vida .= ' – ' . $p['fallecimiento'];
            }
            $card = [
                'emoji' => $p['emoji'], 'color_ini' => $p['color_ini'], 'color_fin' => $p['color_fin'],
                'tag' => $p['profesion'] ?? '', 'title' => $p['nombre'],
                'text' => excerpt($p['descripcion'], 160),
                'chips' => [$vida],
            ];
            require VIEW_PATH . '/partials/card.php';
            ?>
        <?php endforeach; ?>
    </div>
</section>
