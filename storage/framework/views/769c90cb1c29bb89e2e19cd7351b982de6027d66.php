<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <title> <?php echo e(config('app.name'), 'Laravel'); ?> </title>
      
        
    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>
    </body>
</html>
