<?php $__env->startSection('content'); ?>
<div>



<link rel="stylesheet" href=" <?php echo e(asset('css/app.css')); ?> ">
<div style="margin:2%">
    <h1>Applications</h1>
    <?php if(count($appls) > 1): ?>
        <?php $__currentLoopData = $appls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class= "well">
                    <small>Applicant: <?php echo e($appl->sender); ?> | </small>
                    <small>Material Provider: <?php echo e($appl->material_provider); ?> | </small>
                    <small>Estimated Cost: ₹<?php echo e($appl->cost); ?></small>
                <h3><?php echo $appl->comments; ?></h3>
                <?php if(($appl->status == 0 && $appl->sender == Auth::user()->roll_no)): ?>
                    <hr>
                    <a href="/appl/<?php echo e($appl->id); ?>/edit" class="btn btn-default">Edit Application</a>
                    <?php echo Form::open(['action' => ['ApplController@destroy', $appl->id], 'method' =>'POST', 'class' => 'pull-right']); ?>

                    <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                    <?php echo e(Form::submit('Delete', ['class'=>'btn btn-danger'])); ?>

                    <?php echo Form::close(); ?>

                <?php elseif(Auth::user()->level < 3 && $appl->status == 0 ): ?>
                    <hr>
                    <a href="/appl/<?php echo e($appl->id); ?>/edit" class="btn btn-default">Suggest Changes</a>
                    <a href="" class="btn btn-default">Forward</a>
                <?php elseif(Auth::user()->level == 1 && $appl->status == 1): ?>
                    <?php echo Form::open(['action' => ['ApplController@approve', $appl->id], 'method' =>'POST', 'class' => 'pull-right']); ?>

                    <?php echo e(Form::hidden('_method', 'PUT')); ?>

                    <?php echo e(Form::submit('Approve', ['class'=>'btn btn-primary'])); ?>

                    <?php echo Form::close(); ?>


                    <?php echo Form::open(['action' => ['ApplController@decline', $appl->id], 'method' =>'POST', 'class' => 'pull-right']); ?>

                    <?php echo e(Form::hidden('_method', 'PUT')); ?>

                    <?php echo e(Form::submit('Decline', ['class'=>'btn btn-danger'])); ?>

                    <?php echo Form::close(); ?>

                <?php elseif($appl->status == 1): ?>
                    <p>Status: Application Forarded</p>

                <?php elseif($appl->status == 2): ?>
                    <h3 style="color:darkcyan">Status: Approved</h3>

                <?php elseif($appl->status == -1): ?>
                    <h3 style="color:crimson">Status: Declined</h3>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>No applications found</p>
    <?php endif; ?>
</div>
</div>
<?php $__env->stopSection(); ?>

    

<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>