<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
    <title><?php echo $__env->yieldContent('title', 'SIGAC'); ?></title>
</head>
<body>
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="container">
        <h1>SIGAC - Sistema de Gerenciamento de Atividades Complementares</h1>
        <button type="button" class="btn btn-warning">Start</button>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\yoshimi\OneDrive\Documentos\TRABALHOS ACADEMICOS\TADS 3 SEMESTRE\WEBII\view-blade-bootstrap-sigac\view-blade-boostrap-sigac-yoshimidevz\sigac\resources\views/layouts/app.blade.php ENDPATH**/ ?>