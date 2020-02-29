<?php $__env->startSection('content'); ?>
  <div class="title" style="padding: 1.5rem;">
    <h2>Blog Posts</h2>
  </div>
  <br><br>
  <div class="container">
  <p class="float-right"><a href="<?php echo e(route('showAddPost')); ?>" class="btn btn-primary">Add Post</a></p>
  <p class="float-left"><a href="<?php echo e(route('draft')); ?>" class="btn btn-primary">View Draft</a></p>
  </div>
  <div class="container">
    <div class="panel panel-default">
      <?php if(count($posts) > 0): ?>

        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">order by date</option>
              <option value="1">order by last post</option>
            </select>            
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
            </div>
          </div>
          </div>
          <hr>
          <br>
          <div class="table-responsive">
            <table class="table table-striped table-dark b-t b-light" id="table_id" class="display">
              <thead>
                <tr>
                  <th>Cover image</th>
                  <th>title</th>
                  <th>Post</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><img style="border: 1px solid white; width: 3rem; height: 3rem;" src="<?php echo e(asset('storage/cover_images')); ?>/<?php echo e($post->cover_image); ?>"> </td>
                    <td><span class="text-ellipsis"><?php echo e($post->title); ?></span></td>
                    <td><span class="text-ellipsis"><?php echo substr($post->body,0,50); ?></span></td>
                    <td><span class="text-ellipsis"><?php echo e($post->category->name); ?></span></td>
                    <td style="desplay:flex;">
                      <a href="<?php echo e(url('admin/posts/edit')); ?>/<?php echo e($post->id); ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a> &nbsp;&nbsp;
                      <?php echo e(Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])); ?>

                          <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                          <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i></button>
                        <?php echo e(Form::close()); ?>

                      <td>
                    <tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
          <br>
          <footer class="panel-footer">
            <div class="row">
              <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
              </div>
              <div class="col-sm-7 text-right text-center-xs">                
                  <?php echo e($posts->links()); ?>      
              </div>        
            </div>
          </footer>
        </div>
   
      <?php else: ?>
        
        <p class="text-lg-center" style="padding-top: 3rem;"><i>You have No Post Yet...</i></p>

      <?php endif; ?>
    </div>
    <br>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>