<?php $__env->startSection('content'); ?>
    <h1>Applications</h1>
    <?php if(count($appls) > 1): ?>
        <?php $__currentLoopData = $appls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="well">
                <h3><?php echo $appl->comments; ?></h3>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>No applications found</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>