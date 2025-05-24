<?php $__env->startSection('title', 'Cursos'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Cursos</h1>
    <a href="<?php echo e(route('cursos.create')); ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Novo Curso
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-0">Lista de Cursos</h5>
            </div>
            <div class="col-md-6">
                <form action="<?php echo e(route('cursos.index')); ?>" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar curso..." value="<?php echo e(request('search')); ?>">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Nível</th>
                        <th>Carga Horária</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($curso->id); ?></td>
                        <td><?php echo e($curso->nome); ?></td>
                        <td><?php echo e($curso->categoria->nome ?? 'N/A'); ?></td>
                        <td><?php echo e($curso->nivel->nome ?? 'N/A'); ?></td>
                        <td><?php echo e($curso->carga_horaria); ?> horas</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="<?php echo e(route('cursos.show', $curso->id)); ?>" class="btn btn-sm btn-info text-white" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('cursos.edit', $curso->id)); ?>" class="btn btn-sm btn-warning text-white" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('cursos.destroy', $curso->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este curso?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum curso encontrado.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Exibindo <?php echo e($cursos->count()); ?> de <?php echo e($cursos->total()); ?> cursos
            </div>
            <div>
                <?php echo e($cursos->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Leandro\BaguiDaYoshi\sigac-trabalho-semestral-yoshimidevz\sigac\resources\views/cursos/index.blade.php ENDPATH**/ ?>