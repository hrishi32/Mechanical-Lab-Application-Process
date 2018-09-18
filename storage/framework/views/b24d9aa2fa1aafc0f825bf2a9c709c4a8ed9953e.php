<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(url('applstore')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <br><br>
        <input type="hidden" name="user" value="b16032">
        <textarea name="comments" placeholder="Description" id="article-ckeditor"></textarea>
        <input type="text" name="material_provider" placeholder="Material Provider">
        <input type="file" name="img" placeholder="Design">
        <input type="number" name="cost" placeholder="Cost">
        <input type="submit">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>