<?php $__env->startSection('content'); ?>
    <form action="ApplController@store" method="POST">
        <?php echo csrf_field(); ?>
        <br><br>
        <input type="hidden" name="user" value="b160320">
        <input type="text" name="comments" placeholder="Description">
        <input type="text" name="materil_provider" placeholder="Material Provider">
        <input type="file" name="img" placeholder="Design">
        <input type="number" name="cost" placeholder="Cost">
        <input type="submit">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>