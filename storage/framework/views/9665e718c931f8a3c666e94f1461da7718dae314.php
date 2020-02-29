<br>
<?php if(count($errors) > 0): ?>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
        <?php echo e($error); ?>

      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="col-md-2"></div>
  </div>

<?php endif; ?>
      
<?php if(session('success')): ?>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <?php echo e(session('success')); ?>

    </div>
    </div>
    <div class="col-md-2"></div>
  </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class=" alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
       <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/inc/messages.blade.php ENDPATH**/ ?>