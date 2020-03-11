<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
  <h1>Dashboard</h1>
  <form action="/admin" method="post" enctype="multipart/form-data">
    <input type="text" name="product" value="testing product">
    <br>
    <input type="file" name="image">
    <br>
    <input type="submit" name="submit" value="Go">
  </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\ecommerce\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>