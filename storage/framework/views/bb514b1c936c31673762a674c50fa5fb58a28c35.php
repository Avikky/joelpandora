<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
       <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">Personal Data</div>
                <div class="card-body">
                  <?php echo e(Form::open(['action' => 'ProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


                  <div class="form-group">
                     <label for="firstname">First Name</label>
                     <input type="text" name="firstname" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" name="phone" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="address">Nationality</label>
                    <input type="text" name="nationality" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">State</label>
                    <input type="text" name="state" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">City</label>
                    <input type="text" name="city" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">Language</label>
                    <input type="text" name="language" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">Open for Freelancing</label>
                    <select name="freelance" id="" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                 </div>
                <div class="form-group">
                    <label for="linkedin">Linkedin handle</label>
                    <input type="text" name="linkedin_handle" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="facebook">facebook handle</label>
                    <input type="text" name="facebook_handle" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="facebook">facebook handle</label>
                    <input type="text" name="facebook_handle" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="twitter">Twitter handle</label>
                    <input type="text" name="twitter_handle" id="" class="form-control">
                 </div>
                     <div class="form-group">
                    <label for="instagram">Instagram handle</label>
                    <input type="text" name="instagram_handle" id="" class="form-control">
                 </div>
                  <div class="form-group">
                     <label for="address">Brief Bio </label>
                     <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
                  </div>       
                  <div class="form-group">
                    <?php echo e(Form::label('resume', 'Resume` File')); ?>

                    <?php echo e(Form::file('resume', ['class' => 'form-control'])); ?>

                </div>
                  <div class="form-group">
                    <?php echo e(Form::label('profile_image', 'Profile image')); ?>

                    <?php echo e(Form::file('profile_image', ['class' => 'form-control'])); ?>

                </div>
                  <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

   
                  <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3>Profile Details</h3></div>
                    
                <div class="card-body">
                    <?php if(count($profiles) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Resume` file</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Nationality</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Language</th>
                                    <th>Bio</th>
                                    <th>LinkedIn</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <img style="border: 1px solid white; width: 3.6rem; height: 2.6rem;" src="<?php echo e(asset('storage/profile_images')); ?>/<?php echo e($profile->profile_image); ?>">
                                        </td>
                                        <td>
                                            <?php if($profile->resume != null): ?>
                                            <img style="border: 1px solid white; width: 3.6rem; height: 2.6rem;" src="<?php echo e(asset('admin_assets/images/resume-img.png')); ?>">
                                            <span><?php echo e($profile->resume); ?></span>
                                            <?php else: ?>
                                            <span class="text-ellipsis">No File</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->firstname); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->lastname); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->email); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->phone); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->nationality); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->state); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->city); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->address); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->language); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo substr($profile->bio, 0, 50); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->linkedin_handle); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->facebook_handle); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->twitter_handle); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis"><?php echo e($profile->instagram_handle); ?></span>
                                        </td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal<?php echo e($profile->id); ?>"  class=" mb-1" data-toggle="modal" data-target="#editModal<?php echo e($profile->id); ?>"><i class="fa fa-edit text-success text-active"></i></a> 

                                            
                                            
                                            <div class="modal fade" id="editModal<?php echo e($profile->id); ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php echo e(Form::open(['action' => ['ProfileController@update', $profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                            <?php echo e(Form::hidden('_method', 'PUT')); ?>

                                                        
                                                            <div class="form-group">
                                                                <label for="firstname">First Name</label>
                                                                <input type="text" value="<?php echo e($profile->firstname); ?>" name="firstname" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="lastname">Last Name</label>
                                                                <input type="text" name="lastname" value="<?php echo e($profile->lastname); ?>" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">E-mail</label>
                                                                <input type="email" value="<?php echo e($profile->email); ?>" name="email" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="phone">phone</label>
                                                                <input type="text" value="<?php echo e($profile->phone); ?>" name="phone" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="language">Nationality</label>
                                                                <input type="text" value="<?php echo e($profile->nationality); ?>" name="nationality" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="language">State</label>
                                                                <input type="text" value="<?php echo e($profile->state); ?>" name="state" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="language">City</label>
                                                                <input type="text" value="<?php echo e($profile->city); ?>" name="city" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" value="<?php echo e($profile->address); ?>" name="address" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="language">Language</label>
                                                                <input type="text" value="<?php echo e($profile->language); ?>" name="language" id="" class="form-control">
                                                            </div>
                                                       
                                                            <!-- <div class="form-group">
                                                                <label for="address">Open for Freelancing</label>
                                                                <select name="freelance" id="" class="form-control">
                                                                    <option value="<?php echo e($profile->freelance); ?>">
                                                                        <?php echo e($profile->freelance); ?>

                                                                    </option>
                                                                    <?php if($profile->freelance == "Yes"): ?>
                                                                    <option value="No">No</option>
                                                                    <?php else: ?>
                                                                    <option value="Yes">Yes</option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div> -->
                                                            <div class="form-group">
                                                                <label for="linkedin_handle">Linkedin handle</label>
                                                                <input type="text" value="<?php echo e($profile->linkedin_handle); ?>" name="linkedin_handle" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="facebook">Facebook handle</label>
                                                                <input type="text" value="<?php echo e($profile->facebook_handle); ?>" name="facebook_handle" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="twitter">Twitter handle</label>
                                                                <input type="text" value="<?php echo e($profile->twitter_handle); ?>" name="twitter_handle" id="" class="form-control">
                                                            </div>
                                                                <div class="form-group">
                                                                <label for="instagram">Instagram handle</label>
                                                                        <input type="text" value="<?php echo e($profile->instagram_handle); ?>" name="instagram_handle" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Brief Bio </label>
                                                                <textarea name="bio" class="form-control ckeditor" cols="30" rows="10">
                                                                    <?php echo substr($profile->bio,0, 50); ?>

                                                                </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                            <?php echo e(Form::label('resume', 'Resume` file')); ?>

                                                            <?php echo e(Form::file('resume', ['class' => 'form-control', 'required'])); ?>

                                                            </div>  
                                                            <div class="form-group">
                                                            <?php echo e(Form::label('profile_image', 'Profile image')); ?>

                                                            <?php echo e(Form::file('profile_image', ['class' => 'form-control', 'required'])); ?>

                                                            </div>      
                                                            
                                                            <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary'])); ?>

                                                                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <?php echo e(Form::open(['action' => ['ProfileController@destroy', $profile->id], 'method' => 'POST', 'class' => 'float-right'])); ?>

                                            <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                                <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                                </button> 
                                            <?php echo e(Form::close()); ?> 
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($profiles->links()); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/admin/profile.blade.php ENDPATH**/ ?>