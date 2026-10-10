<?php
$regionesFooter = get_regiones();
$anio = date('Y');
$explorar = [
    ['route' => 'regiones',     'label' => 'Regiones'],
    ['route' => 'gastronomia',  'label' => 'Gastronomía'],
    ['route' => 'musica',       'label' => 'Música'],
    ['route' => 'festividades', 'label' => 'Festividades'],
    ['route' => 'personajes',   'label' => 'Personajes'],
    ['route' => 'destinos',     'label' => 'Destinos'],
];
?>
<footer class="relative mt-24 overflow-hidden bg-[#0b1f4b] text-slate-300">
    <div class="tricolor-bar absolute inset-x-0 top-0 h-1"></div>
    <div class="pointer-events-none absolute inset-0 bg-grid opacity-40"></div>
    <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-col-blue/40 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-col-yellow/10 blur-3xl"></div>

    <div class="container-x relative grid gap-12 py-16 md:grid-cols-2 lg:grid-cols-4">
        <div class="lg:col-span-1">
            <div class="flex items-center gap-3">
                <img src="<?= e(asset('img/logo.svg')) ?>" alt="" class="h-11 w-11">
                <div>
                    <p class="font-display text-lg font-extrabold text-white">Cultura de Colombia</p>
                    <p class="text-xs uppercase tracking-[0.2em] text-col-yellow"><?= e((string) config('tagline')) ?></p>
                </div>
            </div>
            <p class="mt-5 text-sm leading-relaxed text-slate-400">
                Un recorrido por la riqueza cultural de Colombia: sus regiones, sabores,
                ritmos, fiestas y personajes que definen nuestra identidad.
            </p>
            <div class="mt-6 flex gap-3">
                <?php
                $social = [
                    ['M18.9 2H5.1A3.1 3.1 0 002 5.1v13.8A3.1 3.1 0 005.1 22h13.8a3.1 3.1 0 003.1-3.1V5.1A3.1 3.1 0 0018.9 2zM8.3 18.3H5.9V9.7h2.4v8.6zM7.1 8.6a1.4 1.4 0 110-2.8 1.4 1.4 0 010 2.8zm11.2 9.7h-2.4v-4.2c0-1 0-2.3-1.4-2.3s-1.6 1.1-1.6 2.2v4.3H10.5V9.7H13v1.2h.03a2.6 2.6 0 012.4-1.3c2.6 0 3 1.7 3 3.9v4.8z', 'LinkedIn'],
                    ['M22 5.9a8.2 8.2 0 01-2.4.7 4.1 4.1 0 001.8-2.3 8.2 8.2 0 01-2.6 1 4.1 4.1 0 00-7 3.7A11.6 11.6 0 013 4.8a4.1 4.1 0 001.3 5.5 4 4 0 01-1.9-.5v.05a4.1 4.1 0 003.3 4 4.1 4.1 0 01-1.8.07 4.1 4.1 0 003.8 2.8A8.2 8.2 0 012 18.6a11.6 11.6 0 006.3 1.8c7.5 0 11.6-6.2 11.6-11.6v-.5A8.3 8.3 0 0022 5.9z', 'Twitter'],
                    ['M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.9h2.54V9.85c0-2.5 1.5-3.9 3.77-3.9 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.89h2.78l-.44 2.9h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z', 'Facebook'],
                ];
                ?>
                <?php foreach ($social as $s): ?>
                    <a href="#" aria-label="<?= e($s[1]) ?>" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/15 bg-white/5 text-slate-300 transition hover:-translate-y-1 hover:border-col-yellow hover:text-col-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="<?= e($s[0]) ?>"/></svg>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <div>
            <h3 class="font-display text-sm font-bold uppercase tracking-[0.2em] text-white">Explorar</h3>
            <ul class="mt-5 space-y-3 text-sm">
                <?php foreach ($explorar as $link): ?>
                    <li>
                        <a href="<?= e(url($link['route'])) ?>" class="group inline-flex items-center gap-2 text-slate-400 transition hover:text-col-yellow">
                            <span class="h-1.5 w-1.5 rounded-full bg-col-yellow/50 transition group-hover:bg-col-yellow"></span>
                            <?= e($link['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h3 class="font-display text-sm font-bold uppercase tracking-[0.2em] text-white">Regiones</h3>
            <ul class="mt-5 space-y-3 text-sm">
                <?php foreach ($regionesFooter as $r): ?>
                    <li>
                        <a href="<?= e(url('region', $r['slug'])) ?>" class="group inline-flex items-center gap-2 text-slate-400 transition hover:text-col-yellow">
                            <span aria-hidden="true"><?= e($r['emoji']) ?></span>
                            <?= e($r['nombre']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h3 class="font-display text-sm font-bold uppercase tracking-[0.2em] text-white">Contacto</h3>
            <ul class="mt-5 space-y-4 text-sm text-slate-400">
                <li class="flex items-start gap-3">
                    <span class="text-col-yellow">✉</span>
                    <span>info@culturacolombia.co</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-col-yellow">📍</span>
                    <span>Bogotá D.C., Colombia</span>
                </li>
            </ul>
            <a href="<?= e(url('contacto')) ?>" class="btn-sun mt-6 w-full text-sm">
                Envíanos un mensaje
            </a>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container-x flex flex-col items-center justify-between gap-3 py-6 text-center text-xs text-slate-500 sm:flex-row sm:text-left">
            <p>© <?= e((string) $anio) ?> Cultura de Colombia. Proyecto académico sin fines comerciales.</p>
            <p>Hecho con <span class="text-col-red">♥</span> en Colombia · PHP · SQLite · Tailwind CSS</p>
        </div>
    </div>
</footer>
