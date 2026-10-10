<?php
/**
 * Tarjeta de contenido reutilizable.
 * Espera la variable $card con las claves:
 *   emoji, color_ini, color_fin, tag, title, text, chips (array), link, link_label
 */
/** @var array $card */
$cardGrad  = gradient($card['color_ini'] ?? '#003893', $card['color_fin'] ?? '#0b1f4b');
$cardLink  = $card['link'] ?? null;
$cardChips = $card['chips'] ?? [];
$Tag       = $cardLink ? 'a' : 'div';
?>
<article class="card card-hover reveal group flex h-full flex-col">
    <div class="relative h-36 overflow-hidden" style="<?= e($cardGrad) ?>">
        <div class="absolute inset-0 bg-grid opacity-30"></div>
        <div class="absolute -right-4 -top-6 text-8xl opacity-25 transition-transform duration-500 group-hover:scale-110 group-hover:rotate-6"
             aria-hidden="true"><?= e($card['emoji'] ?? '✨') ?></div>
        <div class="absolute left-5 top-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 text-3xl backdrop-blur-sm ring-1 ring-white/25"
             aria-hidden="true"><?= e($card['emoji'] ?? '✨') ?></div>
        <?php if (!empty($card['tag'])): ?>
            <span class="absolute bottom-4 left-5 rounded-full bg-white/90 px-3 py-1 text-[0.7rem] font-bold uppercase tracking-wider text-slate-700">
                <?= e($card['tag']) ?>
            </span>
        <?php endif; ?>
    </div>

    <div class="flex flex-1 flex-col p-6">
        <<?= $Tag ?> <?= $cardLink ? 'href="' . e($cardLink) . '"' : '' ?> class="font-display text-lg font-bold text-slate-900 <?= $cardLink ? 'transition-colors group-hover:text-col-blue' : '' ?>">
            <?= e($card['title'] ?? '') ?>
        </<?= $Tag ?>>

        <p class="prose-col mt-2 flex-1"><?= e($card['text'] ?? '') ?></p>

        <?php if ($cardChips): ?>
            <div class="mt-4 flex flex-wrap gap-2">
                <?php foreach ($cardChips as $chip): ?>
                    <span class="badge"><?= e((string) $chip) ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($cardLink): ?>
            <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-col-blue">
                <?= e($card['link_label'] ?? 'Ver más') ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m0 0l-6-6m6 6l-6 6"/>
                </svg>
            </span>
        <?php endif; ?>
    </div>
</article>
