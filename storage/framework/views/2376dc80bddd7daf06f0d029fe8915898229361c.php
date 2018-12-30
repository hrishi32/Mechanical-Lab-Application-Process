<?php $__env->startSection('content'); ?>
<div>



<link rel="stylesheet" href=" <?php echo e(asset('css/app.css')); ?> ">
<div style="margin:2%">
    <h1>Applications</h1>
    <a href = "#"><button  style="border:none; background: #81ba80 ; color: white"><u>All</u></button></a>
    <a href = "/requests/pending"><button  style="border:none">Pending</button></a>
    <a href = "/requests/approved"><button style="border:none">Approved</button></a>
    <br><br>
    <?php if(count($appls) > 1): ?>
        <?php $__currentLoopData = $appls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class= "well">
                    <small>Applicant: <?php echo e($appl->sender); ?> | </small>
                    <small>Material Provider: <?php echo e($appl->material_provider); ?> | </small>
                    <small>Estimated Cost: ₹<?php echo e($appl->cost); ?></small>
                <div><?php echo $appl->comments; ?></div>
                <?php if(($appl->status == 0 && $appl->sender == Auth::user()->roll_no)): ?>
                    <hr>
                    <a href="/appl/<?php echo e($appl->id); ?>/edit"  style="display: inline-block"><button class="btn btn-default">Edit Application</button></a>
                    <?php echo Form::open(['action' => ['ApplController@destroy', $appl->id], 'method' =>'POST', 'style' => 'display:inline-block']); ?>

                    <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                    <?php echo e(Form::submit('Delete', ['class'=>'btn btn-danger'])); ?>

                    <?php echo Form::close(); ?>

                <?php endif; ?>
                <?php if(Auth::user()->level == 2 && $appl->status == 0 ): ?>
                    <hr>
                    <a href="/appl/<?php echo e($appl->id); ?>/edit" class="btn btn-default">Suggest Changes</a>
                    <a href="" class="btn btn-default">Forward</a>
                <?php endif; ?>
                 <?php if(Auth::user()->level == 1 && ($appl->status == 1 ||$appl->status == 0 )): ?>
                    

                    <form method="POST", action="<?php echo e(url('applapprove')); ?>" style="display: inline-block">
                        <?php echo csrf_field(); ?>
                        <input type="hidden", value="<?php echo e($appl->id); ?>" name="id">
                        <input type="submit" class="btn btn-primary" value="Approve">
                    </form>

                    
                    <form method="POST", action="<?php echo e(url('appldecline')); ?>" class="pull-right" style="display: inline-block">
                        <?php echo csrf_field(); ?>
                        <input type="hidden", value="<?php echo e($appl->id); ?>" name="id">
                        <input type="submit" class="btn btn-danger" value="Decline">
                    </form>
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