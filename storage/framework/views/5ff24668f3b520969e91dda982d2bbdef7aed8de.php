<?php if(Auth::user()->level < 3 || (Auth::user()->roll_no == $appl->sender && $appl->status == 0)): ?>
    <?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><?php echo e(__('Add Application')); ?> </div>

                    <div class="card-body" style="width : 100%">
                        
                            <?php echo Form::open(['action'=> ['ApplController@update', $appl->id], 'method' => 'POST']); ?>

                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="material_provider" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('Material Provider')); ?></label>

                                <div class="col-md-6">
                                <input id="material_provider" type="text"  name="material_provider" value="<?php echo e($appl->material_provider); ?>" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cost" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cost')); ?></label>

                                <div class="col-md-6">
                                    <input id="cost" type="number"  name="cost" required value="<?php echo e($appl->cost); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="img" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Image')); ?></label>
        
                                    <div class="col-md-6">
                                        <input id="img" type="file"  name="img" >
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Description')); ?></label>

                                <div class="col-md-6">
                                    <textarea class="ckeditor" name="comments" id="description" ><?php echo e($appl->comments); ?></textarea>
                                </div>
                            </div>
                            <?php echo e(Form::hidden('_method', 'PUT')); ?>

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
<?php else: ?>
    <?php $__env->startSection('content'); ?>
        <h2>Permission Denied</h2>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>