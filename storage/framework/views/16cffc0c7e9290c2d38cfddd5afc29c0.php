

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="Container mt-2 align-items-center">
        <?php if(Auth::check() && Auth::user()->is_admin): ?>
            <div class="text-center py-2">
                <a href="<?php echo e(route('projects.create')); ?>" class="btn btn-outline-primary btn-sm">CREATE</a>
            </div>
        <?php endif; ?>
        <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mx-auto mb-3 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
            <div class="card-body">
                <h2 class="text-lg font-bold mb-2"><?php echo e($project->title); ?></h2>
                <p class="text-gray-600 mb-4"><?php echo e($project->description); ?></p>
            </div>
            <?php if(Auth::check() && Auth::user()->is_admin): ?>
                <hr>
                <div class="text-center py-2 d-flex justify-content-center gap-2">
                    <div class="text-center">
                        <a href="<?php echo e(route('projects.edit', $project->id)); ?>" class="btn btn-outline-primary btn-sm">EDIT</a>
                    </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($project->id); ?>">DELETE</button>
                        </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?php echo e($project->id); ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo e($project->id); ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel<?php echo e($project->id); ?>">Confirm Action: Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this education record? This action cannot be undone.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">CANCEL</button>
                                <form action="<?php echo e(route('projects.destroy', $project->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger">DELETE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="card mx-auto mt-3 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
                <div class="card-body">
                    <p class="text-gray-600 mb-4">No items available.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>           
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_profile\resources\views/projects/index.blade.php ENDPATH**/ ?>