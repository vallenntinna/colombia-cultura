<?php
$heroEyebrow = 'Error 404';
$heroEmoji   = '🧭';
$pageHeading = 'Página no encontrada';
$pageDescription = 'La ruta que buscas no existe o fue movida.';
require VIEW_PATH . '/partials/page-hero.php';
?>
<section class="container-x py-20 text-center">
    <p class="font-display text-7xl font-extrabold text-slate-200 sm:text-9xl">404</p>
    <h2 class="mt-4 font-display text-2xl font-extrabold text-slate-900">Ups, te perdiste en el camino</h2>
    <p class="prose-col mx-auto mt-3 max-w-xl">No encontramos esa página, pero hay mucho por descubrir. Vuelve al inicio o explora nuestras regiones.</p>
    <div class="mt-8 flex flex-wrap justify-center gap-3">
        <a href="<?= e(url('inicio')) ?>" class="btn-primary">Ir al inicio</a>
        <a href="<?= e(url('regiones')) ?>" class="btn border border-slate-200 text-slate-700 hover:bg-slate-50">Ver regiones</a>
    </div>
</section>
