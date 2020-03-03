<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
  <h1>Dashboard</h1>
  <form action="/admin" method="post" enctype="multipart/form-data">
    <input type="text" name="product" value="testing product">
    <br>
    <input type="file" name="file">
    <br>
    <input type="submit" name="submit" value="Go">
  </form>

  <?php echo e(\App\Classes\Request::all()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>