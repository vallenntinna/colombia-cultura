<?php
/** @var string $content */
/** @var string $pageTitle */
/** @var string $pageDescription */
$navRuta = current_route();
?>
<!DOCTYPE html>
<html lang="es" class="scroll-pt-24">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#003893">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="author" content="<?= e((string) config('name')) ?>">

    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:locale" content="es_CO">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="<?= e(asset('img/favicon.svg')) ?>" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?= e(asset('img/favicon.svg')) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?= e(asset('css/styles.css')) ?>">
</head>
<body class="min-h-screen flex flex-col bg-slate-50">
    <a href="#contenido" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[100] focus:rounded-full focus:bg-col-blue focus:px-5 focus:py-2 focus:text-white">
        Saltar al contenido
    </a>

    <?php require VIEW_PATH . '/partials/header.php'; ?>

    <main id="contenido" class="flex-1">
        <?= $content ?>
    </main>

    <?php require VIEW_PATH . '/partials/footer.php'; ?>

    <button id="toTop" type="button" aria-label="Volver arriba"
            class="fixed bottom-6 right-6 z-40 hidden h-12 w-12 items-center justify-center rounded-full bg-col-blue text-white shadow-glow transition hover:-translate-y-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" class="h-5 w-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0l-7 7m7-7l7 7"/>
        </svg>
    </button>

    <script src="<?= e(asset('js/app.js')) ?>" defer></script>
</body>
</html>
