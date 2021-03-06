<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href=" <?php echo e(asset('css/app.css')); ?> ">   

        <title> <?php echo e(config('app.name'), 'Laravel'); ?> </title>
      
        <style>
                html, body {
                    background-color: #fff;
                    color: #636b6f;
                    font-family: 'Raleway', sans-serif;
                    font-weight: 100;
                    height: 100vh;
                    margin: 0;
                }
        </style>
    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>
    </body>
</html>
