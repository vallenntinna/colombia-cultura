<?php
/** @var array $regiones */
/** @var array $gastronomia */
/** @var array $musica */
/** @var array $festividades */
/** @var array $personajes */
/** @var array $simbolos */
/** @var array $datos */
/** @var array $stats */

$heroPills = ['Cumbia', 'Vallenato', 'Ajiaco', 'Carnaval', 'Café', 'Marimba'];
?>

<!-- ============================ HERO ============================ -->
<section class="relative overflow-hidden bg-[#0b1f4b] text-white">
    <div class="absolute inset-0 bg-grid opacity-40"></div>
    <div class="absolute inset-0" style="background-image:radial-gradient(circle at 20% 20%, rgba(0,56,147,0.55), transparent 45%), radial-gradient(circle at 85% 25%, rgba(252,209,22,0.18), transparent 40%), radial-gradient(circle at 60% 100%, rgba(206,17,38,0.25), transparent 45%)"></div>
    <div class="pointer-events-none absolute -left-24 top-10 h-72 w-72 animate-float rounded-full bg-col-blue/40 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-1/3 h-80 w-80 rounded-full bg-col-yellow/10 blur-3xl"></div>

    <div class="container-x relative grid items-center gap-14 py-20 lg:grid-cols-[1.05fr_0.95fr] lg:py-28">
        <div class="animate-fade-up">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-col-yellow backdrop-blur">
                <span class="h-2 w-2 animate-pulse rounded-full bg-col-yellow"></span>
                Orgullo colombiano
            </span>

            <h1 class="mt-6 font-display text-4xl font-extrabold leading-[1.05] tracking-tight text-balance sm:text-5xl lg:text-6xl">
                La cultura de
                <span class="bg-gradient-to-r from-col-yellow via-amber-300 to-col-yellow bg-clip-text text-transparent">Colombia</span>
                en un solo lugar
            </h1>

            <p class="mt-6 max-w-xl text-base leading-relaxed text-slate-300 sm:text-lg">
                De las playas del Caribe a la selva amazónica, de la cumbia al joropo y del ajiaco a la bandeja paisa.
                Recorre la diversidad que hace de Colombia <span class="font-semibold text-white">el país más acogedor del mundo</span>.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="<?= e(url('regiones')) ?>" class="btn-sun">
                    Explorar regiones
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m0 0l-6-6m6 6l-6 6"/></svg>
                </a>
                <a href="<?= e(url('gastronomia')) ?>" class="btn-ghost">Probar la gastronomía</a>
            </div>

            <div class="mt-8 flex flex-wrap gap-2">
                <?php foreach ($heroPills as $pill): ?>
                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-300"><?= e($pill) ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="relative animate-fade-in">
            <div class="grid grid-cols-2 gap-4">
                <?php
                $heroCards = array_slice($regiones, 0, 4);
                $offsets = ['', 'translate-y-8', '', 'translate-y-8'];
                foreach ($heroCards as $i => $r):
                ?>
                    <a href="<?= e(url('region', $r['slug'])) ?>"
                       class="group relative overflow-hidden rounded-3xl border border-white/10 p-5 shadow-glow transition-transform duration-500 hover:-translate-y-2 <?= $offsets[$i] ?? '' ?>"
                       style="<?= e(gradient($r['color_ini'], $r['color_fin'])) ?>">
                        <div class="absolute inset-0 bg-grid opacity-30"></div>
                        <div class="relative">
                            <div class="text-4xl transition-transform duration-500 group-hover:scale-125" aria-hidden="true"><?= e($r['emoji']) ?></div>
                            <p class="mt-3 font-display text-sm font-bold text-white"><?= e($r['nombre']) ?></p>
                            <p class="text-xs text-white/80"><?= e($r['subtitulo']) ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/10 bg-black/20 backdrop-blur">
        <div class="container-x grid grid-cols-2 gap-6 py-8 sm:grid-cols-4">
            <?php
            $statItems = [
                ['value' => $stats['regiones'],     'label' => 'Regiones'],
                ['value' => $stats['gastronomia'],  'label' => 'Platos típicos'],
                ['value' => $stats['musica'],       'label' => 'Ritmos'],
                ['value' => $stats['festividades'], 'label' => 'Festividades'],
            ];
            foreach ($statItems as $s): ?>
                <div class="text-center">
                    <p class="font-display text-3xl font-extrabold text-col-yellow sm:text-4xl"><?= (int) $s['value'] ?>+</p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-slate-400"><?= e($s['label']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================ DATOS ============================ -->
<section class="container-x -mt-8 relative z-10">
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
        <?php foreach ($datos as $d): ?>
            <div class="reveal card card-hover p-5 text-center">
                <div class="text-3xl" aria-hidden="true"><?= e($d['icono']) ?></div>
                <p class="mt-2 font-display text-2xl font-extrabold text-col-blue"><?= e($d['valor']) ?></p>
                <p class="text-sm font-bold text-slate-800"><?= e($d['titulo']) ?></p>
                <p class="mt-1 text-xs leading-relaxed text-slate-500"><?= e($d['descripcion']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================ REGIONES ============================ -->
<section class="container-x py-20">
    <div class="reveal flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
        <div class="max-w-2xl">
            <span class="eyebrow">Territorio</span>
            <h2 class="section-title">Seis regiones, mil culturas</h2>
            <p class="prose-col mt-3">Cada región de Colombia tiene su propio acento, su música, su comida y su manera de celebrar la vida.</p>
        </div>
        <a href="<?= e(url('regiones')) ?>" class="link-underline shrink-0">Ver todas</a>
    </div>

    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($regiones as $r): ?>
            <a href="<?= e(url('region', $r['slug'])) ?>" class="reveal card card-hover group">
                <div class="relative h-44 overflow-hidden" style="<?= e(gradient($r['color_ini'], $r['color_fin'])) ?>">
                    <div class="absolute inset-0 bg-grid opacity-30"></div>
                    <div class="absolute -right-3 -bottom-4 text-8xl opacity-30 transition-transform duration-500 group-hover:scale-110" aria-hidden="true"><?= e($r['emoji']) ?></div>
                    <div class="absolute left-5 top-5 rounded-2xl bg-white/15 px-3 py-2 text-3xl backdrop-blur-sm ring-1 ring-white/25" aria-hidden="true"><?= e($r['emoji']) ?></div>
                    <span class="absolute bottom-4 left-5 rounded-full bg-white/90 px-3 py-1 text-[0.7rem] font-bold uppercase tracking-wider text-slate-700"><?= e($r['capital']) ?></span>
                </div>
                <div class="p-6">
                    <h3 class="font-display text-xl font-bold text-slate-900 transition-colors group-hover:text-col-blue"><?= e($r['nombre']) ?></h3>
                    <p class="mt-1 text-sm font-semibold text-col-blue"><?= e($r['subtitulo']) ?></p>
                    <p class="prose-col mt-2"><?= e(excerpt($r['descripcion'], 140)) ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================ GASTRONOMÍA ============================ -->
<section class="bg-white py-20">
    <div class="container-x">
        <div class="reveal flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
            <div class="max-w-2xl">
                <span class="eyebrow">Sabores</span>
                <h2 class="section-title">Gastronomía que enamora</h2>
                <p class="prose-col mt-3">Una cocina mestiza, colorida y generosa. Del ajiaco bogotano a la carne a la llanera.</p>
            </div>
            <a href="<?= e(url('gastronomia')) ?>" class="link-underline shrink-0">Ver platos</a>
        </div>
        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($gastronomia as $p):
                $card = [
                    'emoji' => $p['emoji'], 'color_ini' => $p['color_ini'], 'color_fin' => $p['color_fin'],
                    'tag' => $p['region_nombre'] ?? '', 'title' => $p['nombre'],
                    'text' => excerpt($p['descripcion'], 130),
                ];
                require VIEW_PATH . '/partials/card.php';
            endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================ MÚSICA ============================ -->
<section class="relative overflow-hidden bg-slate-900 py-20 text-white">
    <div class="absolute inset-0 bg-grid opacity-30"></div>
    <div class="pointer-events-none absolute -right-20 top-0 h-72 w-72 rounded-full bg-col-blue/40 blur-3xl"></div>
    <div class="container-x relative">
        <div class="reveal flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
            <div class="max-w-2xl">
                <span class="eyebrow !text-col-yellow">Ritmos</span>
                <h2 class="section-title !text-white">La banda sonora del país</h2>
                <p class="mt-3 text-slate-300">Cumbia, vallenato, currulao, joropo y bambuco: músicas que cuentan nuestra historia.</p>
            </div>
            <a href="<?= e(url('musica')) ?>" class="link-underline !text-col-yellow shrink-0">Ver ritmos</a>
        </div>
        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($musica as $m):
                $card = [
                    'emoji' => $m['emoji'], 'color_ini' => $m['color_ini'], 'color_fin' => $m['color_fin'],
                    'tag' => $m['region_nombre'] ?? '', 'title' => $m['nombre'],
                    'text' => excerpt($m['descripcion'], 130),
                ];
                require VIEW_PATH . '/partials/card.php';
            endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================ FESTIVIDADES ============================ -->
<section class="container-x py-20">
    <div class="reveal flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
        <div class="max-w-2xl">
            <span class="eyebrow">Celebración</span>
            <h2 class="section-title">Fiestas y carnavales</h2>
            <p class="prose-col mt-3">Colombia es un país que celebra todo: la vida, la música, la historia y la diversidad.</p>
        </div>
        <a href="<?= e(url('festividades')) ?>" class="link-underline shrink-0">Ver calendario</a>
    </div>
    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($festividades as $f):
            $chips = array_filter([$f['ciudad'], $f['mes']]);
            if ((int) $f['es_patrimonio'] === 1) {
                $chips[] = 'Patrimonio UNESCO';
            }
            $card = [
                'emoji' => $f['emoji'], 'color_ini' => $f['color_ini'], 'color_fin' => $f['color_fin'],
                'tag' => $f['region_nombre'] ?? '', 'title' => $f['nombre'],
                'text' => excerpt($f['descripcion'], 130), 'chips' => $chips,
            ];
            require VIEW_PATH . '/partials/card.php';
        endforeach; ?>
    </div>
</section>

<!-- ============================ PERSONAJES ============================ -->
<section class="bg-white py-20">
    <div class="container-x">
        <div class="reveal flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
            <div class="max-w-2xl">
                <span class="eyebrow">Talento</span>
                <h2 class="section-title">Colombianos que inspiran</h2>
                <p class="prose-col mt-3">Escritores, artistas y músicos que llevaron el nombre de Colombia por todo el mundo.</p>
            </div>
            <a href="<?= e(url('personajes')) ?>" class="link-underline shrink-0">Ver todos</a>
        </div>
        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($personajes as $persona):
                $card = [
                    'emoji' => $persona['emoji'], 'color_ini' => $persona['color_ini'], 'color_fin' => $persona['color_fin'],
                    'tag' => $persona['profesion'] ?? '', 'title' => $persona['nombre'],
                    'text' => excerpt($persona['descripcion'], 110),
                ];
                require VIEW_PATH . '/partials/card.php';
            endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================ SÍMBOLOS ============================ -->
<section class="container-x py-20">
    <div class="reveal text-center">
        <span class="eyebrow justify-center">Identidad</span>
        <h2 class="section-title">Símbolos que nos representan</h2>
    </div>
    <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($simbolos as $s): ?>
            <div class="reveal card card-hover p-6 text-center">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl text-3xl" style="<?= e(gradient($s['color_ini'], $s['color_fin'])) ?>" aria-hidden="true"><?= e($s['emoji']) ?></div>
                <h3 class="mt-4 font-display text-base font-bold text-slate-900"><?= e($s['nombre']) ?></h3>
                <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-col-blue"><?= e($s['categoria']) ?></p>
                <p class="prose-col mt-2 text-sm"><?= e(excerpt($s['descripcion'], 100)) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="container-x pb-8">
    <div class="reveal relative overflow-hidden rounded-[2rem] px-8 py-14 text-center text-white shadow-glow sm:px-16" style="background-image:linear-gradient(120deg,#003893 0%,#0b1f4b 55%,#ce1126 130%)">
        <div class="absolute inset-0 bg-grid opacity-30"></div>
        <div class="pointer-events-none absolute -left-16 -top-16 h-56 w-56 rounded-full bg-col-yellow/20 blur-3xl"></div>
        <div class="relative">
            <h2 class="font-display text-3xl font-extrabold text-balance sm:text-4xl">¿Listo para descubrir Colombia?</h2>
            <p class="mx-auto mt-4 max-w-2xl text-slate-200">Sumérgete en nuestras regiones, sabores y tradiciones. Y si quieres, cuéntanos qué es lo que más te gusta de esta tierra.</p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="<?= e(url('destinos')) ?>" class="btn-sun">Ver destinos</a>
                <a href="<?= e(url('contacto')) ?>" class="btn-ghost">Contáctanos</a>
            </div>
        </div>
    </div>
</section>
