<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <h1>Applications</h1>
    <?php if(count($appls) > 1): ?>
        <?php $__currentLoopData = $appls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class= "well">
                <h3><?php echo $appl->comments; ?></h3>
                <small>Applicant: <?php echo e($appl->sender); ?></small>
            <small>Material Provider: <?php echo e($appl->material_provider); ?>,</small>
            <small>Estimated Cost: ₹<?php echo e($appl->cost); ?></small>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>No applications found</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

    

<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>