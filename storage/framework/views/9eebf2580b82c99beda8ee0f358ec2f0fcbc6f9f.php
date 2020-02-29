 

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Work Experience</div>
                <div class="card-body">
                  <?php echo e(Form::open(['action' => 'ExperienceController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


                <div class="form-group">
                    <label for="title">Job Title</label>
                    <input type="text" placeholder="Graphics Designer" name="title" id="" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" id="" placeholder="From feb 2020 to june 2023" class="form-control">
                 </div>
                    <div class="form-group">
                    <label for="duration">Company/Organisation</label>
                    <input type="text" name="company" id="" placeholder="Andela" class="form-control">
                 </div>
                  <div class="form-group">
                     <label for="description">Description</label>
                     <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                  </div>
                  
    
                  <?php echo e(Form::submit('Add', ['class' => 'btn btn-primary'])); ?>

   
                  <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Work Experience</h3></div>
                  
                <div class="card-body">
                    <?php if(count($experiences) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Title</th>
                                      <th>Duration</th>
                                      <th>Company/Organisation</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><span class="text-ellipsis"><?php echo e($experience->title); ?></span></td>
                                        <td><span class="text-ellipsis"><?php echo e($experience->duration); ?></span></td>
                                           <td><span class="text-ellipsis"><?php echo e($experience->company); ?></span></td>
                                        <td><span class="text-ellipsis"><?php echo substr($experience->description,0, 50); ?></span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal<?php echo e($experience->id); ?>"  class=" mb-1" data-toggle="modal" data-target="#editModal<?php echo e($experience->id); ?>"><i class="fa fa-edit text-success text-active"></i></a> 

                                        
                                            
                                        <div class="modal fade" id="editModal<?php echo e($experience->id); ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo e(Form::open(['action' => ['ExperienceController@update', $experience->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                    <?php echo e(Form::hidden('_method', 'PUT')); ?>

                                                    <div class="form-group">
                                                    <label for="title">Job Title</label>
                                                    <input type="text" name="title" value="<?php echo e($experience->title); ?>" id="" class="form-control" required>
                                                    </div>
                                                
                                                
                                                    <div class="form-group">
                                                        <label for="duration">Duration</label>
                                                    <input type="text" name="duration" id="" value="<?php echo e($experience->duration); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="duration">Company/Organisation</label>
                                                    <input type="text" name="company" id="" value="<?php echo e($experience->company); ?>" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" class="form-control" id="" cols="30" rows="10" required><?php echo $experience->description; ?></textarea>
                                                    </div>
                                                      
                                                    
                                                    <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary'])); ?>

                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                <?php echo e(Form::close()); ?>

                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        

                                        <?php echo e(Form::open(['action' => ['ExperienceController@destroy', $experience->id], 'method' => 'POST', 'class' => 'float-right'])); ?>

                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                        <?php echo e(Form::close()); ?> 
                                        <td>
                                    <tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($experiences->links()); ?>

                        </div>
                    <?php else: ?>
                        <p class="m-t-10" style="text-align:center;"><i>No Data yet...</i></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/admin/experience.blade.php ENDPATH**/ ?>