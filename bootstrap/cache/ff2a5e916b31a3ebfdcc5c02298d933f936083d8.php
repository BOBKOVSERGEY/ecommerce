<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">

<?php echo $__env->make('includes.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="off-canvas-content" data-off-canvas-content>
    <div class="dashboard">
        <div class="row expanded">
            <div class="title-bar">
                <div class="title-bar-left">
                    <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
                    <span class="title-bar-title"><?php echo e(getenv('APP_NAME')); ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
</div>
<script src="/js/lib.js"></script>

<script src="/js/main.js"></script>
<script src="/js/admin/update.js"></script>
</body>
</html><?php /**PATH C:\OSPanel\domains\ecommerce\resources\views/admin/layout/base.blade.php ENDPATH**/ ?>