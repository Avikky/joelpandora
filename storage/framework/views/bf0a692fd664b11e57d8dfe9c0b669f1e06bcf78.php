<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="card">
      <h3 class="card-header text-center">General Site Settings</h3> 
      <div class="justify-content-center card-body">
         <?php if($feature): ?>
      <form action="<?php echo e(route('updateSettings', ['id' => 1])); ?>" method="POST" class="row">
               <?php echo csrf_field(); ?>
               <input type="hidden" name="_method" value="PUT">
               <div class="col-md-6">
                  <div class="form-group"  >
                     <label for="site_name">Site Name</label>
                     <input type="text" name="site_name" value="<?php echo e($feature->site_name); ?>" class="form-control" required>
                  </div>
   
                  <div class="form-group"  >
                     <label for="slogan">Slogan</label>
                     <input type="text" name="slogan" value="<?php echo e($feature->slogan); ?>" class="form-control" required>
                  </div>
   
                  <div class="form-group"  >
                     <label for="email">Email</label>
                     <input type="email" name="email" value="<?php echo e($feature->email); ?>" class="form-control" required>
                  </div>
   
                  <div class="form-group">
                     <label for="phone">Phone</label>
                     <input type="text" name="phone" value="<?php echo e($feature->phone); ?>" class="form-control" required>
                  </div>
   
                  <div class="form-group">
                     <label for="address">Address</label>
                  <input type="text" name="address" value="<?php echo e($feature->address); ?>" class="form-control" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="mission">Mission</label>
                     <textarea name="mission" required  class="form-control" cols="10" rows="2">
                        <?php echo e($feature->mission); ?>

                     </textarea>
                  </div>
   
                  <div class="form-group">
                     <label for="mission">Vision</label>
                     <textarea name="vision" required  class="form-control" cols="10" rows="2">
                        <?php echo e($feature->vision); ?>

                     </textarea>
                  </div>
   
                  <div class="form-group">
                     <label for="about">About us</label>
                     <textarea name="about" required  class="form-control ckeditor" cols="10" rows="2">
                        <?php echo e($feature->about); ?>

                     </textarea>
                  </div>
               </div>
               <input type="submit" value="Update" class="btn btn-primary">
            </form>
         <?php else: ?>
            <form action="<?php echo e(route('storeSettings')); ?>" method="POST" class="row">
               <?php echo csrf_field(); ?>
               <div class="col-md-6">
                  <div class="form-group"  >
                     <label for="site_name">Site Name</label>
                     <input type="text" name="site_name" class="form-control" required>
                  </div>

                  <div class="form-group"  >
                     <label for="slogan">Slogan</label>
                     <input type="text" name="slogan" class="form-control" required>
                  </div>

                  <div class="form-group"  >
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                  </div>

                  <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                  </div>

                  <div class="form-group">
                     <label for="address">Address</label>
                     <input type="text" name="address" class="form-control" required>
                  </div>
                  
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="mission">Mission</label>
                     <textarea name="mission" required  class="form-control" cols="10" rows="2">
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label for="vision">Vision</label>
                     <textarea name="vision" required  class="form-control" cols="10" rows="2">
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label for="about">About us</label>
                     <textarea name="about" required  class="form-control ckeditor" cols="10" rows="2">
                     </textarea>
                  </div>
               </div>
               <input type="submit" value="Submit" class="btn btn-primary">
            </form>
         <?php endif; ?>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/admin/settings.blade.php ENDPATH**/ ?>