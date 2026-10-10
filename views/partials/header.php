<?php
$nav = [
    ['route' => 'inicio',       'label' => 'Inicio'],
    ['route' => 'regiones',     'label' => 'Regiones'],
    ['route' => 'gastronomia',  'label' => 'Gastronomía'],
    ['route' => 'musica',       'label' => 'Música'],
    ['route' => 'festividades', 'label' => 'Festividades'],
    ['route' => 'personajes',   'label' => 'Personajes'],
    ['route' => 'simbolos',     'label' => 'Símbolos'],
    ['route' => 'destinos',     'label' => 'Destinos'],
];
?>
<header id="siteHeader" class="sticky top-0 z-50">
    <div class="tricolor-bar h-1 w-full"></div>
    <div class="border-b border-slate-200/70 bg-white/85 backdrop-blur-xl transition-shadow duration-300" id="headerBar">
        <div class="container-x flex h-16 items-center justify-between gap-4 lg:h-[4.5rem]">
            <a href="<?= e(url('inicio')) ?>" class="group flex items-center gap-2.5" aria-label="Inicio">
                <img src="<?= e(asset('img/logo.svg')) ?>" alt="" class="h-9 w-9 transition-transform duration-300 group-hover:rotate-6 lg:h-10 lg:w-10">
                <span class="flex flex-col leading-none">
                    <span class="font-display text-base font-extrabold tracking-tight text-slate-900 lg:text-lg">Cultura</span>
                    <span class="text-[0.65rem] font-semibold uppercase tracking-[0.25em] text-col-blue">de Colombia</span>
                </span>
            </a>

            <nav class="hidden items-center gap-0.5 lg:flex" aria-label="Navegación principal">
                <?php foreach ($nav as $item): ?>
                    <?php $active = is_active($item['route']); ?>
                    <a href="<?= e(url($item['route'])) ?>"
                       class="relative rounded-full px-3 py-2 text-sm font-semibold transition-colors <?= $active ? 'text-col-blue' : 'text-slate-600 hover:text-col-blue' ?>">
                        <?= e($item['label']) ?>
                        <span class="absolute inset-x-3 -bottom-0.5 h-0.5 rounded-full bg-col-yellow transition-transform duration-300 <?= $active ? 'scale-x-100' : 'scale-x-0' ?>"></span>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex items-center gap-2">
                <a href="<?= e(url('contacto')) ?>" class="hidden rounded-full bg-col-blue px-5 py-2.5 text-sm font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-col-blue/90 sm:inline-flex">
                    Contáctanos
                </a>
                <button id="menuBtn" type="button" aria-label="Abrir menú" aria-expanded="false" aria-controls="mobileMenu"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-700 transition hover:bg-slate-100 lg:hidden">
                    <svg id="menuIconOpen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-5 w-5">
                        <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="menuIconClose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="hidden h-5 w-5">
                        <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobileMenu" class="hidden border-t border-slate-200 bg-white lg:hidden">
            <nav class="container-x grid gap-1 py-4" aria-label="Navegación móvil">
                <?php foreach ($nav as $item): ?>
                    <a href="<?= e(url($item['route'])) ?>"
                       class="rounded-2xl px-4 py-3 text-sm font-semibold transition-colors <?= is_active($item['route']) ? 'bg-col-blue/5 text-col-blue' : 'text-slate-700 hover:bg-slate-100' ?>">
                        <?= e($item['label']) ?>
                    </a>
                <?php endforeach; ?>
                <a href="<?= e(url('contacto')) ?>" class="mt-1 rounded-2xl bg-col-blue px-4 py-3 text-center text-sm font-semibold text-white">
                    Contáctanos
                </a>
            </nav>
        </div>
    </div>
</header>
