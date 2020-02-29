<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .body p{
        word-wrap: break-word !important;
        overflow: hidden;
        text-overflow: ellipsis !important;
    }
    .btn, .btn-large {
        background-color:  #222; 
    }
     .btn:hover, .btn-large:hover {
         background-color: #ffb400;
     }

     
.main-picture.woman {
  background-image: url("<?php echo asset('storage/profile_images') ?><?php echo '/'. $profile->profile_image ?>") !important;
  padding: 0 !important;
  margin-top: 24px !important;
  margin-left: 24px !important;
  height: calc(100vh - 48px) !important;
  background-size: cover !important;
  background-position: center center !important;
  width: calc(33.3333333333% - 48px) !important;
}
 
</style>
    <div class="main-picture woman hide-on-med-and-down"></div>
    <div id="bl-main" class="bl-main">
        <!-- Top Left Section Starts -->
        <section class="topleft">
            <div class="bl-box row valign-wrapper">
                <div class="row valign-wrapper mb-0">
                    <div class="title-heading">
                        <div class="selector uppercase" id="selector">
                            <h3 class="ah-headline p-none m-none">
                                <span class="font-weight-400">Hi There ! I'm</span>
                                <span class="my-name"><?php echo e($profile->firstname); ?> &nbsp; <?php echo e($profile->lastname); ?></span>
                                <span class="ah-words-wrapper">
                                    <b class="is-visible">Creative designer</b>
                                    <b>Online Media Consultant</b>
                                    <b>Educator</b>
                                    <b>blogger</b>
                                </span>
                            </h3>
                            <br><br>
                            <a href="<?php echo e(url('/blog')); ?>" class="btn btn-blog font-weight-700">
                                My Blog <i class="fa fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Left Section Ends -->
        <!-- About Section Starts -->
        <section>
            <!-- About Title Starts -->
            <div class="bl-box valign-wrapper">
                <div class="page-title center-align">
                    <h2 class="center-align">
                        <span data-hover="About">About </span>
                        <span data-hover="Me">Me</span>
                    </h2>
                
                </div>
            </div>
            <!-- About Title Ends -->
            <!-- About Expanded Starts -->
            <div class="bl-content">
                <!-- Main Heading Starts -->
                <div class="container page-title custom-page-title">
                    <h2 class="center-align">
                        <span>About</span>
                        <span>Me</span>
                    </h2>
                </div>
                <!-- Main Heading Ends -->
                <div class="container infos">
                    <!-- Divider Starts -->
                    <div class="divider center-align">
                        <span class="outer-line"></span>
                        <span class="fa fa-vcard" aria-hidden="true"></span>
                        <span class="outer-line"></span>
                    </div>
                    <!-- Divider Ends -->
                    <!-- Personal Informations Starts -->
                    <div class="row">
                        <!-- Picture Starts -->
                        <div class="col s12 m4 profile-picture show-on-medium-and-down section-padding">
                            <img src="images/woman.jpg" class="responsive-img my-picture" alt="My Photo">
                        </div>
                        <!-- Picture Ends -->
                        <div class="col s12 m8 l12 xl12 personal-info section-padding">
                            <h6 class="uppercase"><i class="fa fa-user"></i> Personal Info</h6>
                            <div class="col m12 l12 xl9 p-none second-font body" >
                            
                                <?php echo $profile->bio; ?>

                            </div>
                            <div class="col s12 m12 l6 p-none">
                                <ul class="second-font list-1">
                                    <li><span class="font-weight-700">First Name: </span><?php echo e($profile->firstname); ?></li>
                                    <li><span class="font-weight-700">Last Name: </span><?php echo e($profile->lastname); ?></li>
                                    <li><span class="font-weight-700">Nationality: </span><?php echo e($profile->nationality); ?></li>
                                    <li><span class="font-weight-700">State: </span><?php echo e($profile->state); ?> </li>
                                    <li><span class="font-weight-700">City: </span><?php echo e($profile->city); ?></li>
                                </ul>
                            </div>
                            <div class="col s12 m12 l6 p-none">
                                <ul class="second-font list-2">
                                    <li><span class="font-weight-700">Phone: &nbsp;</span><?php echo e($profile->phone); ?></li>
                                    <li><span class="font-weight-700">Address: &nbsp;</span><?php echo e($profile->address); ?></li>
                                    <li><span class="font-weight-700">Email: &nbsp;</span><?php echo e($profile->email); ?></li>
                                    <li><span class="font-weight-700">Spoken Langages: &nbsp;</span><?php echo e($profile->language); ?></li>
                                    <li><span class="font-weight-700">Twitter: &nbsp;</span> <?php echo e($profile->twitter_handle); ?></li>
                                </ul>
                            </div>
                            <a href="<?php echo e(asset('storage/resume')); ?>/<?php echo e($profile->resume); ?>" download class="btn font-weight-700">
                                Download Resume <i class="fa fa-file-pdf-o"></i>
                            </a>
                            <a href="<?php echo e(url('/blog')); ?>" class="btn btn-blog font-weight-700">
                                My Blog <i class="fa fa-edit"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Personal Informations Ends -->
                </div>
                <!-- Resume Starts -->
                <div class="resume-container">
                    <div class="container">
                        <div class="valign-wrapper row">
                            <!-- Resume Menu Starts -->
                            <div class="resume-list col l4 section-padding">
                                <div class="resume-list-item is-active" data-index="0" id="resume-list-item-0">
                                    <div class="resume-list-item-inner">
                                        <h6 class="resume-list-item-title uppercase"><i class="fa fa-briefcase"></i> Experience</h6>
                                    </div>
                                </div>
                                <div class="resume-list-item" data-index="1" id="resume-list-item-1">
                                    <div class="resume-list-item-inner">
                                        <h6 class="resume-list-item-title uppercase"><i class="fa fa-graduation-cap"></i> Education</h6>
                                    </div>
                                </div>
                                <div class="resume-list-item" data-index="2" id="resume-list-item-2">
                                    <div class="resume-list-item-inner">
                                        <h6 class="resume-list-item-title uppercase"><i class="fa fa-star"></i> Skills</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Resume Menu Ends -->
                            <!-- Resume Content Starts -->
                            <div class="col s12 m12 l8 resume-cards-container section-padding">
                                <div class="resume-cards">
                                    <!-- Experience Starts -->
                                    <div class="resume-card resume-card-0" data-index="0">
                                        <!-- Experience Header Title Starts -->
                                        <div class="resume-card-header">
                                            <div class="resume-card-name"><i class="fa fa-briefcase"></i> Experience</div>
                                        </div>
                                        <!-- Experience Header Title Ends -->
                                        <!-- Experience Content Starts -->
                                        <div class="resume-card-body experience">
                                            <div class="resume-card-body-container second-font">
                                                <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- Single Experience Starts -->
                                                <div class="resume-content">
                                                    <h6 class="uppercase"><?php echo e($experience->title); ?></h6>
                                                    <span class="date"><i class="fa fa-map-marker"></i><?php echo e($experience->company); ?></span>
                                                    <br>
                                                    <span class="date"><i class="fa fa-calendar-o"></i><?php echo e($experience->duration); ?></span>
                                                    <p><?php echo $experience->description; ?></p>
                                                </div>
                                                <!-- Single Experience Ends -->
                                                <span class="separator"></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                            </div>
                                        </div>
                                        <!-- Experience Content Starts -->
                                    </div>
                                    <!-- Experience Ends -->
                                    <!-- Education Starts -->
                                    <div class="resume-card resume-card-1" data-index="1">
                                        <!-- Education Header Title Starts -->
                                        <div class="resume-card-header">
                                            <div class="resume-card-name"><i class="fa fa-graduation-cap"></i> Education</div>
                                        </div>
                                        <!-- Education Header Title Starts -->
                                        <div class="resume-card-body education">
                                            <div class="resume-card-body-container second-font">
                                            <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- Single Education Starts -->
                                                <div class="resume-content">
                                                    <h6 class="uppercase"><?php echo e($education->title); ?></h6>
                                                    <span class="date"><?php echo e($education->course); ?></span>
                                                    <br>
                                                    <span class="date"><i class="fa fa-calendar-o"></i><?php echo e($education->school); ?></span>
                                                    <br>
                                                    <span class="date"><i class="fa fa-calendar-o"></i><?php echo e($education->duration); ?></span>
                                                    <p><?php echo e($education->description); ?></p>
                                                </div>
                                                <!-- Single Education Ends -->
                                                <span class="separator"></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Education Ends -->
                                    <!-- Skills Starts -->
                                    <div class="resume-card resume-card-2" data-index="2">
                                        <!-- Skills Header Title Starts -->
                                        <div class="resume-card-header">
                                            <div class="resume-card-name"><i class="fa fa-star"></i> Skills</div>
                                        </div>
                                        <!-- Skills Header Title Starts -->
                                        <div class="resume-card-body skills">
                                            <div class="resume-card-body-container second-font">
                                                <div class="row">
                                                    <!-- Skills Row Starts -->
                                                    <div class="col s6">
                                                        <!-- Single Skills Starts -->
                                                        <?php $__currentLoopData = $skills->slice(0, 6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="resume-content">
                                                                <h6 class="uppercase"><?php echo e($skill->skill); ?></h6>
                                                                <p>
                                                                <?php switch($skill):
                                                                    case ($skill->rating == 5): ?>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <?php break; ?>

                                                                    <?php case ($skill->rating == 4): ?>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <?php break; ?>
                                                                    <?php case ($skill->rating == 3): ?>   
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <?php break; ?>
                                                                    <?php case ($skill->rating == 2): ?>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <?php break; ?>
                                                                    <?php case ($skill->rating == 1): ?>
                                                                        <i class="fa fa-star"></i>
                                                                    <?php default: ?>
                                                                        Default case...
                                                                <?php endswitch; ?>
                                                                </p>
                                                            </div>
                                                            <!-- Single Skills Ends -->
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <!-- Skills Row Ends -->
                                                    <!-- Skills Row Starts -->
                                                    <div class="col s6">
                                                        <?php $__currentLoopData = $skills->slice(6, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="resume-content">
                                                                <h6 class="uppercase"><?php echo e($skill->skill); ?></h6>
                                                                <p>
                                                                    <?php switch($skill):
                                                                        case ($skill->rating == 5): ?>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <?php break; ?>

                                                                        <?php case ($skill->rating == 4): ?>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <?php break; ?>
                                                                        <?php case ($skill->rating == 3): ?>   
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <?php break; ?>
                                                                        <?php case ($skill->rating == 2): ?>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <?php break; ?>
                                                                        <?php case ($skill->rating == 1): ?>
                                                                            <i class="fa fa-star"></i>
                                                                        <?php default: ?>
                                                                            Default case...
                                                                    <?php endswitch; ?>
                                                                </p>
                                                            </div>
                                                            <!-- Single Skills Ends -->
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <!-- Skills Row Ends -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Skills Ends -->
                                </div>
                            </div>
                            <!-- Resume Content Ends -->
                        </div>
                    </div>
                </div>
                <!-- Resume Ends -->
                <!-- Fun Facts Starts -->
                <div class="container badges">
                    <div class="row">
                        <!-- Fact Badge Item Starts -->
                        <div class="col s12 m4 l4 center-align">
                            <h3>
                                <i class="fa fa-briefcase"></i>
                                <span class="font-weight-900">4+</span>
                            </h3>
                            <h6 class="uppercase font-weight-700">Years Experience</h6>
                        </div>
                        <!-- Fact Badge Item Ends -->
                        <!-- Fact Badge Item Starts -->
                        <div class="col s12 m4 l4 center-align">
                            <h3>
                                <i class="fa fa-handshake-o"></i>
                                <span class="font-weight-900">89+</span>
                            </h3>
                            <h6 class="uppercase font-weight-700">Done Projects</h6>
                        </div>
                        <!-- Fact Badge Item Ends -->
                        <!-- Fact Badge Item Starts -->
                            <div class="col s12 m4 l4 center-align">
                                <h3>
                                <i class="fa fa-heart-o"></i>
                                <span class="font-weight-900">77+</span>
                            </h3>
                            <h6 class="uppercase font-weight-700">Happy customers</h6>
                        </div> 
                    
                        <!-- Fact Badge Item Ends -->
                    </div>
                </div>
                <!-- Fun Facts Ends -->
            </div>
            <!-- End Expanded About -->
            <img alt="close" src="<?php echo e(asset('asset/images/close-button.png')); ?>" class="bl-icon-close" />
        </section>
        <!-- About Ends -->
        <!-- Portfolio Starts -->
        <section id="bl-work-section">
            <!-- Portfolio Title Starts -->
            <div class="bl-box valign-wrapper">
                <div class="page-title center-align">
                    <h2 class="center-align">
                        <span data-hover="my">my </span>
                        <span data-hover="portfolio">portfolio</span>
                    </h2>
                </div>
            </div>
            <!-- Portfolio Title Ends -->
            <!-- Portfolio Expanded Starts -->
            <div class="bl-content">
                <!-- Main Heading Starts -->
                <div class="container page-title center-align">
                    <h2 class="center-align">
                        <span data-hover="my">my </span>
                        <span data-hover="portfolio">portfolio</span>
                    </h2>
                </div>
                <!-- Main Heading Ends -->
                <div class="container">
                    <!-- Divider Starts -->
                    <div class="divider center-align">
                        <span class="outer-line"></span>
                        <span class="fa fa-suitcase" aria-hidden="true"></span>
                        <span class="outer-line"></span>
                    </div>
                    <!-- Divider Ends -->
                    <div class="row center-align da-thumbs" id="bl-work-items">
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Project Starts -->
                            <div class="col s12 m6 l6 xl4" data-panel="<?php echo e($project->id); ?>">
                                <a href="#">
                                    <img class="responsive-img" src="<?php echo e(asset('storage/project_images')); ?>/<?php echo e($project->project_image); ?>" alt="Project" />
                                    <div class="valign-wrapper"><span class="font-weight-700 uppercase"><?php echo e($project->project_name); ?></span></div>
                                </a>
                            </div>
                            <!-- Project Ends -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <!-- Portfolio Expanded Ends -->
                <img alt="close" src="<?php echo e(asset('asset/images/close-button.png')); ?>" class="bl-icon-close" />
        </section>
        <!-- Portfolio Section Ends -->
        <!-- Contact Section Starts -->
        <section>
            <!-- Contact Title Starts -->
            <div class="bl-box valign-wrapper">
                <div class="page-title center-align">
                    <h2 class="center-align">
                        <span data-hover="get">get </span>
                        <span data-hover="in touch">in touch</span>
                    </h2>
                </div>
            </div>
            <!-- Contact Title Ends -->
            <!-- Expanded Contact Starts -->
            <div class="bl-content">
                <!-- Main Heading Starts -->
                <div class="container page-title center-align">
                    <h2 class="center-align">
                        <span data-hover="get">get </span>
                        <span data-hover="in touch">in touch</span>
                    </h2>
                </div>
                <!-- Main Heading Ends -->
                <div class="container">
                    <!-- Divider Starts -->
                    <div class="divider center-align">
                        <span class="outer-line"></span>
                        <span class="fa fa-envelope-open" aria-hidden="true"></span>
                        <span class="outer-line"></span>
                    </div>
                    <!-- Divider Ends -->
                    <div class="row contact section-padding">
                        <!-- Contact Infos Starts -->
                        <div class="col s12 m5 l5 xl4 leftside">
                            <!-- Contacts Starts -->
                            <h6 class="font-weight-700 uppercase">Phone</h6>
                            <span class="font-weight-400 second-font"><i class="fa fa-phone"></i> <?php echo e($profile->phone); ?></span>
                            <h6 class="font-weight-700 uppercase">Email</h6>
                            <span class="font-weight-400 second-font"><i class="fa fa-envelope"></i><?php echo e($profile->email); ?></span>
                            <h6 class="font-weight-700 uppercase">Address</h6>
                            <span class="font-weight-400 second-font"><i class="fa fa-home"></i>  <?php echo e($profile->address); ?></span><br>
                            <!-- Contacts Ends -->
                            <!-- Social Media Profiles Starts -->
                            <h6 class="font-weight-700 uppercase">Social Profiles</h6>
                            <div class="social">
                                <ul class="list-inline social social-intro center-align p-none">
                                    <li class="facebook"><a href="<?php echo e($profile->facebook_handle); ?>"  target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li class="google-plus"><a href="<?php echo e($profile->instagram_handle); ?>"  target="_blank"><i class="fa fa-instagram"></i></a></li> 
                                    <li class="twitter"><a href="<?php echo e($profile->twitter_handle); ?>"><i class="fa fa-twitter"  target="_blank"></i></a></li>
                                    <li class="linkedin"><a href="<?php echo e($profile->linkedin_handle); ?>"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <!-- Social Media Profiles Ends -->
                        </div>
                        <!-- Contact Infos Ends -->
                        <!-- Contact Form Starts -->
                        <div class="col s12 m7 l7 xl8 rightside">
                            <h6 class="uppercase m-none font-weight-700">Feel free to drop me a line</h6>
                            <div class="row">
                                <p class="col s12 m12 l12 xl10 second-font">
                                    If you have any suggestion, project or even you want to say Hello.. Please fill out the form below and I will reply you shortly.
                                </p>
                            </div>
                            <form class="contactform" method="post" action="<?php echo e(route('contactmail')); ?>">
                                <!-- Name Field Starts -->
                                <div class="input-field second-font">
                                    <i class="fa fa-user prefix"></i>
                                    <input id="name" name="name" type="text" class="validate" required>
                                    <label class="font-weight-400" for="name">Your Name</label>
                                </div>
                                <!-- Name Field Ends -->
                                <!-- Email Field Starts -->
                                <div class="input-field second-font">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input id="email" type="email" name="email" class="validate" required>
                                    <label for="email">Your Email</label>
                                </div>
                                <div class="input-field second-font">
                                    <i class="fa fa-edit prefix"></i>
                                    <input id="subject" name="subject" type="text" class="validate" required>
                                    <label class="font-weight-400" for="name">Your Subject</label>
                                </div>
                                <!-- Email Field Ends -->
                                <!-- Comment Textarea Starts -->
                                <div class="input-field second-font">
                                    <i class="fa fa-comments prefix"></i>
                                    <textarea id="comment" name="message" class="materialize-textarea" required></textarea>
                                    <label for="message">Your Comment</label>
                                </div>
                                <!-- Comment Textarea Ends -->
                                <!-- Submit Form Button Starts -->
                                <div class="col s12 m12 l9 xl8 submit-form">
                                    <button class="btn font-weight-700" type="submit" name="send">
                                        Send Message <i class="fa fa-send"></i>
                                    </button>
                                </div>
                                <!-- Submit Form Button Ends -->
                                <div class="col s12 m12 l8 xl8 form-message">
                                    <span class="output_message center-align font-weight-700 uppercase"></span>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form Ends -->
                    </div>
                </div>
            </div>
            <!-- Expanded Contact Ends -->
                <img alt="close" src="<?php echo e(asset('asset/images/close-button.png')); ?>" class="bl-icon-close" />
        </section>
        <!-- Contact Section Ends -->
        <!-- Portfolio Panel Items Starts -->
        <div class="bl-panel-items" id="bl-panel-work-items">
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Project Starts -->
            <div data-panel="<?php echo e($project->id); ?>">
                <div class="row">
                    <!-- Project Main Content Starts -->
                    <div class="col s12 l6 xl6 section-padding section-padding-right-none">
                        <img class="responsive-img" src="<?php echo e(asset('storage/project_images')); ?>/<?php echo e($project->project_image); ?>" alt="project" />
                    </div>
                    <!-- Project Main Content Ends -->
                    <!-- Project Details Starts -->
                    <div class="col s12 l6 xl6 section-padding">
                        <h3 class="font-weight-700 uppercase"><?php echo e($project->project_name); ?></h3>
                        <ul class="project-details second-font">
                            <li><i class="fa fa-user"></i><span class="font-weight-700"> Client </span>: <span class="font-weight-400 uppercase"><?php echo e($project->designated_client); ?></span></li>
                            <li><i class="fa fa-calendar-o"></i><span class="font-weight-700"> Start Date </span>: <span class="font-weight-400 uppercase"><?php echo e($project->start_date); ?></span></li>
                            <li><i class="fa fa-calendar-check-o"></i><span class="font-weight-700"> End Date </span>: <span class="font-weight-400 uppercase"><?php echo e($project->finish_date); ?></span></li>
                            <li><i class="fa fa-cogs"></i> <span class="font-weight-700">Description</span> : <span class="font-weight-400 uppercase body"><?php echo $project->description; ?></span></li>
                        </ul>
                        <hr>
                        <a href="<?php echo e($project->project_link); ?>" target="_blank"class="waves-effect waves-light btn font-weight-700">Preview <i class="fa fa-external-link"></i></a>
                    </div>
                
                </div>
            </div>
            <!-- Project Ends -->
    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- Portfolio Navigation Starts -->
            <nav>
                <!-- Previous Work Icon Starts -->
                <span class="control-button bl-previous-work"><i class="fa fa-angle-left"></i></span>
                <!-- Previous Work Icon Ends -->
                <!-- Close Work Icon Starts -->
                <img alt="close" src="<?php echo e(asset('asset/images/close-button.png')); ?>" class="control-button bl-icon-close" />
                <!-- Close Work Icon Ends -->
                <!-- Next Work Icon Starts -->
                <span class="control-button bl-next-work"><i class="fa fa-angle-right"></i></span>
                <!-- Previous Work Icon Ends -->
            </nav>
            <!-- Portfolio Navigation Ends -->
        </div>
        <!-- Portfolio Panel Items Ends -->
    </div>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views//index.blade.php ENDPATH**/ ?>