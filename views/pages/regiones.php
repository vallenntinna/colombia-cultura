<?php
/** @var array $regiones */
require VIEW_PATH . '/partials/page-hero.php';
?>

<section class="container-x py-16 lg:py-20">
    <div class="grid gap-8">
        <?php foreach ($regiones as $i => $r): ?>
            <article class="reveal card overflow-hidden lg:grid lg:grid-cols-[0.9fr_1.1fr]">
                <div class="relative min-h-[220px] overflow-hidden" style="<?= e(gradient($r['color_ini'], $r['color_fin'])) ?>">
                    <div class="absolute inset-0 bg-grid opacity-30"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-[7rem] opacity-90 drop-shadow-lg transition-transform duration-700 hover:scale-110" aria-hidden="true"><?= e($r['emoji']) ?></span>
                    </div>
                    <span class="absolute left-5 top-5 rounded-full bg-black/30 px-3 py-1 text-xs font-bold uppercase tracking-wider text-white backdrop-blur">
                        Región <?= $i + 1 ?>
                    </span>
                </div>
                <div class="p-7 lg:p-9">
                    <div class="flex flex-wrap items-center gap-3">
                        <h2 class="font-display text-2xl font-extrabold text-slate-900"><?= e($r['nombre']) ?></h2>
                        <span class="badge">🏛 <?= e($r['capital']) ?></span>
                    </div>
                    <p class="mt-1 text-sm font-semibold text-col-blue"><?= e($r['subtitulo']) ?></p>
                    <p class="prose-col mt-4"><?= e($r['descripcion']) ?></p>

                    <p class="mt-5 text-xs font-bold uppercase tracking-wider text-slate-400">Departamentos</p>
                    <p class="mt-1 text-sm text-slate-600"><?= e($r['departamentos']) ?></p>

                    <a href="<?= e(url('region', $r['slug'])) ?>" class="btn-primary mt-6">
                        Descubrir la región
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m0 0l-6-6m6 6l-6 6"/></svg>
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
