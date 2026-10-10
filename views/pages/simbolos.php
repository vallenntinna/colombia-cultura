<?php
/** @var array $simbolos */
$heroEyebrow = 'Identidad';
$heroEmoji   = '🇨🇴';
require VIEW_PATH . '/partials/page-hero.php';

$categorias = [];
foreach ($simbolos as $s) {
    $categorias[$s['categoria'] ?? 'Otros'][] = $s;
}
?>
<section class="container-x py-16 lg:py-20">
    <?php foreach ($categorias as $categoria => $items): ?>
        <div class="mb-14">
            <h2 class="reveal font-display text-2xl font-extrabold text-slate-900">
                <span class="mr-2 inline-block h-6 w-1.5 translate-y-0.5 rounded-full bg-col-yellow"></span>
                <?= e($categoria) ?>
            </h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($items as $s): ?>
                    <div class="reveal card card-hover p-6">
                        <div class="flex items-start gap-4">
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl text-3xl" style="<?= e(gradient($s['color_ini'], $s['color_fin'])) ?>" aria-hidden="true"><?= e($s['emoji']) ?></div>
                            <div>
                                <h3 class="font-display text-lg font-bold text-slate-900"><?= e($s['nombre']) ?></h3>
                                <p class="prose-col mt-2 text-sm"><?= e($s['descripcion']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>
