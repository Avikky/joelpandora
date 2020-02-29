<?php $__env->startSection('content'); ?>
      <div class=" title-bar">
      <h3>Edit : <?php echo e($post->title); ?></h3>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php echo e(Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="form-group">
                  <label for="title">Title</label>
            <input type="text" name="title" value="<?php echo e($post->title); ?>" class="form-control" placeholder="Post title">
            </div>
            <div class="form-group">
                  <label for="tags">Choose Tags:<small class="text-info">(optional)</small></label>
                  <select name="tags[]"  class="form-control select2-multi" multiple="true">
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                              <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 </select>
            
            </div>
            <div class="form-group">
                  <label for="body">Body</label>
            <textarea name="body"  class="form-control ckeditor" cols="30" rows="10"><?php echo e($post->body); ?></textarea>
            </div>
            <div class="form-group">
                  <label for="tag">Select Category:</label>
                  <select class="form-control" name="category_id">
                   <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
            </div>
            <div class="form-group">
                  
                  <?php echo e(Form::label('cover_image', 'Add cover image')); ?>

                  <?php echo e(Form::file('cover_image', ['class' => 'form-control'])); ?>

            </div>
           <div class="form-group">
              <label for="tag">Would You like to save this post as a draft and Publish it later</label>
              <select class="form-control" name="draft">
                  <option value="0">No</option>
                   <option value="1">Yes</option>
              </select>
          </div>
            <?php echo e(Form::hidden('_method', 'PUT')); ?>

            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>


            <?php echo e(Form::close()); ?>

            <br>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
      
<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script>
      $('.select2-multi').select2();
      $('.select2-multi').select2().val(<?php echo json_encode($post->tags()->allRelatedIds()->toArray()); ?>).triger('change');
 </script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/admin/posts/edit.blade.php ENDPATH**/ ?>