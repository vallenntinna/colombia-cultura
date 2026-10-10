<?php
/**
 * Encabezado reutilizable para páginas internas.
 * Variables opcionales: $heroEyebrow, $heroEmoji, $heroImage (gradiente css)
 */
$heroEyebrow = $heroEyebrow ?? 'Cultura de Colombia';
$heroEmoji   = $heroEmoji ?? null;
$heroStyle   = $heroImage ?? 'background-image:linear-gradient(120deg,#003893 0%,#0b1f4b 60%,#111827 100%)';
?>
<section class="relative overflow-hidden text-white">
    <div class="absolute inset-0" style="<?= e($heroStyle) ?>"></div>
    <div class="absolute inset-0 bg-grid opacity-30"></div>
    <div class="absolute inset-0" style="background-image:radial-gradient(circle at 80% 15%, rgba(252,209,22,0.18), transparent 40%)"></div>
    <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-col-blue/30 blur-3xl"></div>

    <div class="container-x relative py-16 lg:py-20">
        <nav class="mb-5 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-300" aria-label="Ruta de navegación">
            <a href="<?= e(url('inicio')) ?>" class="transition hover:text-col-yellow">Inicio</a>
            <span aria-hidden="true" class="text-slate-500">/</span>
            <span class="text-col-yellow"><?= e($pageHeading ?? '') ?></span>
        </nav>

        <div class="flex items-center gap-4">
            <?php if ($heroEmoji): ?>
                <span class="flex h-16 w-16 items-center justify-center rounded-3xl border border-white/15 bg-white/10 text-4xl backdrop-blur-sm" aria-hidden="true"><?= e($heroEmoji) ?></span>
            <?php endif; ?>
            <div>
                <span class="eyebrow !text-col-yellow"><?= e($heroEyebrow) ?></span>
                <h1 class="font-display text-3xl font-extrabold tracking-tight text-balance sm:text-4xl lg:text-5xl"><?= e($pageHeading ?? '') ?></h1>
            </div>
        </div>

        <?php if (!empty($pageDescription)): ?>
            <p class="mt-4 max-w-2xl text-base leading-relaxed text-slate-300 sm:text-lg"><?= e($pageDescription) ?></p>
        <?php endif; ?>
    </div>
</section>
