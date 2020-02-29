<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Project</div>
                <div class="card-body">
                  <?php echo e(Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


                  <div class="form-group">
                     <label for="project_name">Project Name</label>
                     <input type="text" name="project_name" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="project_name">Designated Client</label>
                    <input type="text" name="designated_client" id="" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="project_name">Start Date</label>
                    <input type="date" name="start_date" id="" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="project_name">Supposed Finish Date</label>
                    <input type="date" name="finish_date" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="project_name">Link to Project</label>
                    <input type="text" name="project_link" id="" placeholder="example google drive link" class="form-control">
                </div>
                  <div class="form-group">
                     <label for="description">Description</label>
                     <textarea name="description" class="form-control ckeditor" cols="30" rows="10"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <?php echo e(Form::label('project_image', 'Project image')); ?>

                    <?php echo e(Form::file('project_image', ['class' => 'form-control'])); ?>

                </div>
                  <?php echo e(Form::submit('Add', ['class' => 'btn btn-primary'])); ?>

   
                  <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Projects</h3></div>
                  
                <div class="card-body">
                    <?php if(count($projects) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Project Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><img style="border: 1px solid white; width: 3.6rem; height: 2.6rem;" src="<?php echo e(asset('storage/project_images')); ?>/<?php echo e($project->project_image); ?>"> </td>
                                        <td><span class="text-ellipsis"><?php echo e($project->project_name); ?></span></td>
                                        <td><span class="text-ellipsis"><?php echo substr($project->description,0, 50); ?></span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal<?php echo e($project->id); ?>"  class=" mb-1" data-toggle="modal" data-target="#editModal<?php echo e($project->id); ?>"><i class="fa fa-edit text-success text-active"></i></a> 

                                        
                                            
                                        <div class="modal fade" id="editModal<?php echo e($project->id); ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo e(Form::open(['action' => ['ProjectsController@update', $project->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                    <?php echo e(Form::hidden('_method', 'PUT')); ?>

                                                    <div class="form-group">
                                                    <label for="project_name">Project Name</label>
                                                    <input type="text" name="project_name" value="<?php echo e($project->project_name); ?>" id="" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="project_name">Designated Client</label>
                                                    <input type="text" name="designated_client" id="" value="<?php echo e($project->designated_client); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="project_name">Start Date</label>
                                                    <input type="date" name="start_date" id="" value="<?php echo e($project->start_date); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="project_name">Supposed Finish Date</label>
                                                    <input type="date" name="finish_date" id="" value="<?php echo e($project->finish_date); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="project_name">Link to Project</label>
                                                    <input type="text" name="project_link" id="" value="<?php echo e($project->project_link); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" class="form-control ckeditor" id="" cols="30" rows="10" required><?php echo $project->description; ?></textarea>
                                                       
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                    <?php echo e(Form::label('project_image', 'Project image')); ?>

                                                    <?php echo e(Form::file('project_image', ['class' => 'form-control'])); ?>

                                                    </div>      
                                                    
                                                    <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary'])); ?>

                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                <?php echo e(Form::close()); ?>

                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        
                                        <?php echo e(Form::open(['action' => ['ProjectsController@destroy', $project->id], 'method' => 'POST', 'class' => 'float-right'])); ?>

                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                        <?php echo e(Form::close()); ?> 
                                        <td>
                                    <tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($projects->links()); ?>

                        </div>
                    <?php else: ?>
                        <p class="m-t-10" style="text-align:center;"><i>No Project yet...</i></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/admin/project.blade.php ENDPATH**/ ?>