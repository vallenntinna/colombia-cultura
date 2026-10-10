<?php
/** @var array $errores */
/** @var bool $exito */
/** @var array $old */
$heroEyebrow = 'Hablemos';
$heroEmoji   = '✉️';
require VIEW_PATH . '/partials/page-hero.php';

$inputBase = 'w-full rounded-2xl border bg-white px-4 py-3 text-sm text-slate-800 shadow-sm transition placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-col-blue/40';
?>
<section class="container-x py-16 lg:py-20">
    <div class="grid gap-10 lg:grid-cols-[1fr_1.3fr]">
        <aside class="reveal">
            <span class="eyebrow">Contacto</span>
            <h2 class="section-title">Cuéntanos qué te gusta de Colombia</h2>
            <p class="prose-col mt-4">Déjanos tus comentarios, sugerencias o preguntas sobre la cultura colombiana. Nos encantaría leerte.</p>

            <div class="mt-8 grid gap-4">
                <?php
                $info = [
                    ['icon' => '✉️', 'title' => 'Correo', 'text' => 'info@culturacolombia.co'],
                    ['icon' => '📞', 'title' => 'Teléfono', 'text' => '+57 (601) 555 0123'],
                    ['icon' => '📍', 'title' => 'Ubicación', 'text' => 'Bogotá D.C., Colombia'],
                    ['icon' => '🕘', 'title' => 'Horario', 'text' => 'Lun a Vie · 8:00 a.m. – 5:00 p.m.'],
                ];
                foreach ($info as $item): ?>
                    <div class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-soft">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-col-blue/5 text-xl" aria-hidden="true"><?= e($item['icon']) ?></span>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400"><?= e($item['title']) ?></p>
                            <p class="text-sm font-semibold text-slate-800"><?= e($item['text']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </aside>

        <div class="reveal">
            <div class="card p-6 sm:p-8">
                <?php if ($exito): ?>
                    <div class="mb-6 flex items-start gap-3 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                        <span class="text-xl" aria-hidden="true">✅</span>
                        <div>
                            <p class="font-semibold">¡Mensaje enviado!</p>
                            <p class="text-sm">Gracias por escribirnos. Muy pronto te responderemos.</p>
                        </div>
                    </div>
                <?php elseif (isset($errores['general'])): ?>
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <?= e($errores['general']) ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= e(url('contacto')) ?>" novalidate class="grid gap-5">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="nombre" class="mb-1.5 block text-sm font-semibold text-slate-700">Nombre *</label>
                            <input type="text" id="nombre" name="nombre" value="<?= e($old['nombre']) ?>" required
                                   class="<?= e($inputBase) ?> <?= isset($errores['nombre']) ? 'border-red-300 focus:ring-red-300' : 'border-slate-200' ?>"
                                   placeholder="Tu nombre completo">
                            <?php if (isset($errores['nombre'])): ?><p class="mt-1 text-xs font-medium text-red-600"><?= e($errores['nombre']) ?></p><?php endif; ?>
                        </div>
                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-semibold text-slate-700">Correo *</label>
                            <input type="email" id="email" name="email" value="<?= e($old['email']) ?>" required
                                   class="<?= e($inputBase) ?> <?= isset($errores['email']) ? 'border-red-300 focus:ring-red-300' : 'border-slate-200' ?>"
                                   placeholder="tucorreo@ejemplo.com">
                            <?php if (isset($errores['email'])): ?><p class="mt-1 text-xs font-medium text-red-600"><?= e($errores['email']) ?></p><?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label for="asunto" class="mb-1.5 block text-sm font-semibold text-slate-700">Asunto</label>
                        <input type="text" id="asunto" name="asunto" value="<?= e($old['asunto']) ?>"
                               class="<?= e($inputBase) ?> border-slate-200" placeholder="¿Sobre qué quieres hablar?">
                    </div>

                    <div>
                        <label for="mensaje" class="mb-1.5 block text-sm font-semibold text-slate-700">Mensaje *</label>
                        <textarea id="mensaje" name="mensaje" rows="5" required
                                  class="<?= e($inputBase) ?> resize-y <?= isset($errores['mensaje']) ? 'border-red-300 focus:ring-red-300' : 'border-slate-200' ?>"
                                  placeholder="Escribe tu mensaje (mínimo 10 caracteres)"><?= e($old['mensaje']) ?></textarea>
                        <?php if (isset($errores['mensaje'])): ?><p class="mt-1 text-xs font-medium text-red-600"><?= e($errores['mensaje']) ?></p><?php endif; ?>
                    </div>

                    <button type="submit" class="btn-primary w-full sm:w-auto">
                        Enviar mensaje
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
