

<?php $__env->startSection('content'); ?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card mx-auto mt-4 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
            <img src="<?php echo e($user->image ? asset(Storage::url($user->image)) : asset('default-avatar.png')); ?>" 
                 class="card-img-top rounded-circle mx-auto shadow" 
                 alt="User Image" 
                 style="width: 150px; height: 150px; object-fit: cover; margin-top: -75px; border: 5px solid white;">
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo e($user->name); ?></h5>
                <div class="d-flex justify-content-center gap-2"> 
                    <a href="tel:+306973212894" class="text-dark-emphasis"><i class="fa-solid fa-phone"></i> 6973212894</a> |
                    <a href="mailto:kostaskats4@gmail.com" class="text-dark-emphasis"><i class="fa-solid fa-at"></i> Email</a> |
                    <a href="https://www.linkedin.com/in/konstantinos-k-07956014a/" class="text-dark-emphasis"> <i class="fa-brands fa-linkedin-in"></i> Linkedin</a> |
                    <a href="https://github.com/kostas3V" class="text-dark-emphasis"><i class="fa-brands fa-github"> </i> Github</a> 
                </div>  
                <hr>
                <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <label for="image" class="form-label">Update Image</label>
                    <input type="file" name="image" id="image" class="form-control mb-3" style="background: linear-gradient(315deg, #ffffff, #d7e1ec);">
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary btn-sm">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_profile\resources\views/users/edit.blade.php ENDPATH**/ ?>