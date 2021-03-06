<?php $__env->startSection('title', 'Product Categories'); ?>
<?php $__env->startSection('data-page-id', 'adminCategories'); ?>

<?php $__env->startSection('content'); ?>
  <div class="category">
    <div class="grid-x grid-padding-x">
      <div class="cell">
        <h1>Product Categories</h1>
      </div>
    </div>
    <?php if($message): ?>
      <div class="grid-x grid-padding-x">
        <div class="cell">
          <div class="callout success" data-closable="slide-out-right">
            <h5>This a friendly message.</h5>
            <p><?php echo e($message); ?></p>
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if(isset($errors)): ?>
      <div class="grid-x grid-padding-x">
        <div class="cell">
          <div class="callout alert" data-closable="slide-out-right">
            <h5>This is an alert callout</h5>
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorArray): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $errorArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="grid-x grid-padding-x">
      <div class="cell small-12 medium-6">
        <form action="/admin/product/categories" method="post">
          <div class="input-group">
            <input type="text" class="input-group-field" placeholder="Search by name">
            <div class="input-group-button">
              <input type="submit" class="button" value="Search">
            </div>
          </div>
        </form>
      </div>
      <div class="cell small-12 medium-6">
        <form action="/admin/product/categories" method="post">
          <div class="input-group">
            <input type="text" class="input-group-field" name="name" placeholder="Category name">
            <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
            <div class="input-group-button">
              <input type="submit" class="button" value="Create">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="grid-x grid-padding-x">
      <div class="cell">
        <?php if(count($categories)): ?>
          <table class="hover">
            <tbody>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($category['name']); ?></td>
                  <td><?php echo e($category['slug']); ?></td>
                  <td><?php echo e($category['added']); ?></td>
                  <td width="100" class="text-right">
                    <a data-open="item-<?php echo e($category['id']); ?>"><i class="fas fa-edit"></i></a>
                    <a href="#"><i class="fas fa-times"></i></a>
                    <div class="reveal" id="item-<?php echo e($category['id']); ?>" data-animation-in="scale-in-up" data-animation-out="spin-out" data-reveal  >
                      <h1>Edit Category</h1>
                      <div class="notification callout"></div>

                          <form>
                            <div class="input-group">
                              <input type="text" id="item-name-<?php echo e($category['id']); ?>" class="input-group-field" name="name" value="<?php echo e($category['name']); ?>">
                            </div>
                            <div class="text-center">
                              <input type="submit" class="button update-category" id="<?php echo e($category['id']); ?>" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>" value="Update">
                            </div>
                          </form>

                      <button class="close-button" data-close aria-label="Close modal" type="button">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <?php echo $links; ?>

          <?php else: ?>
          <h3>You have not created any category</h3>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\ecommerce\resources\views/admin/products/categories.blade.php ENDPATH**/ ?>