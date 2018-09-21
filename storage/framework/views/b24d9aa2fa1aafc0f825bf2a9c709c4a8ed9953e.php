<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ><?php echo e(__('Add Application')); ?></div>

                <div class="card-body" style="width : 100%">
                    <form method="POST" action="<?php echo e(url('applstore')); ?>" aria-label="<?php echo e(__('Add Application')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="material_provider" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('Material Provider')); ?></label>

                            <div class="col-md-6">
                                <input id="material_provider" type="text"  name="material_provider" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cost" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cost(₹)')); ?></label>

                            <div class="col-md-6">
                                <input id="cost" type="number"  name="cost" required>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Description')); ?></label>

                            <div class="col-md-6">
                                <textarea class="ckeditor" name="comments" id="description" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Submit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>