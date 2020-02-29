 <aside class="menu-sidebar2">
    <div class="logo">
        <a href="#">
        <img src="<?php echo e(asset('assets/images/icon/logo-white.png')); ?>" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <h3 class="name"><a href="<?php echo e(url('/admin/profile')); ?>" class="text-black"><?php echo e(Auth::user()->name); ?> </a></h3>
            <a class="btn btn-warning" href="">Admin</a>
          
        </div>

        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="" href="<?php echo e(url('/admin/dashboard')); ?>">
                    <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="has-sub">
                    <a  class="js-arrow" href="#">
                        <i class="fas fa-shopping-basket"></i>Manage Portfolio
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?php echo e(url('/admin/project')); ?>">
                                <i class="fas fa-shopping-basket"></i>Add Projects
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Manage Blog
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?php echo e(url('admin/posts/create')); ?>">
                                <i class="fab fa-flickr"></i>Add Post</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/posts/')); ?>">
                                <i class="fas fa-align-justify"></i>All Post
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/posts/draft')); ?>">
                                <i class="fas fa-align-justify"></i>Draft
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/admin/category')); ?>">
                                <i class="far fa-window-maximize"></i>Category
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/admin/tags')); ?>">
                                <i class="far fa-id-card"></i>Tags
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                    <i class="fas fa-user"></i>Profile settings
                    <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                    </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?php echo e(url('/admin/profile')); ?>">
                                <i class="fas fa-cogs"></i> Personal Data
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo e(url('/admin/education')); ?>">
                                <i class="fas fa-cogs"></i> Education
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo e(url('/admin/experience')); ?>">
                                <i class="fas fa-cogs"></i> Experience
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo e(url('/admin/skills')); ?>">
                                <i class="fas fa-cogs"></i> Skills
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                    <i class="fas fa-cog"></i>Settings
                    <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                    </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?php echo e(url('/admin/settings')); ?>">
                            <i class="fas fa-cogs"></i>Site Settings</a>
                        </li>
                     
                    </ul>
                </li> -->
                <li>
                    <a href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault();
                    document.getElementById('logout-id').submit();">
                        <i class="fas fa-user-times"></i>   <?php echo e(__('Logout')); ?></a>
                    <form id="logout-id" action="<?php echo e(route('logout')); ?>" method="POST"
                        style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            
            </ul>
        </nav>
    </div>
</aside><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/inc/sideNav.blade.php ENDPATH**/ ?>