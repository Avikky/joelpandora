<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>
	<style>
		article {
			border: 1px solid #ffb400 !important;
			padding: 1rem;
			margin: 1rem;
		}
		.blog-meta-content {
			margin-top: 1rem !important;
			margin-bottom: 20px !important;
		}
		.blog-meta-btn {
			margin-bottom: 1rem;
			border-radius: 10px;
		}
		.meta {
			display: flex !important;
			justify-content: space-around !important;
			align-items: center !important;
		}
		a h4 {
			color: #f4f4f4 !important;
		}
		.body p{
			word-wrap: break-word !important;
			overflow: hidden;
			text-overflow: ellipsis !important;
		}
	.btn, .btn-large {
        background-color: #ffb400; 
    }
     .btn:hover, .btn-large:hover {
         background-color: #222;
     }

	</style>
   <!-- Wrapper Starts -->
    <div class="wrapper">
		<div class="container page-title center-align">
			<h2 class="center-align">
				<span>My </span>
				<span>blog</span>
			</h2>
		</div>
		<!-- Divider Starts -->
		<div class="divider center-align">
			<span class="outer-line"></span>
			<span class="fa fa-vcard" aria-hidden="true"></span>
			<span class="outer-line"></span>
		</div>
		<!-- Divider Ends -->
		<div class="container">
			<div class="row">
				<div class="content col s12 m8 l8 xl8">
					<!-- Article Starts -->
					<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<article>
							<a href="<?php echo e(url('blogpost')); ?>/<?php echo e($post->slug); ?>"><h4><?php echo e($post->title); ?></h4></a>
							<!-- Figure Starts -->
							<figure class="blog-figure">
								<a href="<?php echo e(url('blogpost')); ?>/<?php echo e($post->slug); ?>">
								<img class="responsive-img" src="<?php echo e(asset('storage/cover_images')); ?>/<?php echo e($post->cover_image); ?>" alt="">
								</a>
							</figure>
							<!-- Figure Ends -->
							<!-- Body text starts-->
								<div class="body second-font">
									<?php echo substr($post->body, 0, 300); ?>

								</div>
							<!-- Excerpt Starts -->
							<div class="blog-meta-content">
								<a href="<?php echo e(url('blogpost')); ?>/<?php echo e($post->slug); ?>"  class="blog-meta-btn waves-effect waves-light btn readmore font-weight-500">
									Read more 
								</a>
								
								<!-- Meta Starts -->
								<div class="meta second-font">
									<p style="margin-left: -4rem;"><i class="fa fa-user"></i> <a href="#">&nbsp;Admin</a></p>
									<p style="margin-left: -4rem;" class="date"><i class="fa fa-calendar"></i>&nbsp; <?php echo e(date_format($post->created_at, ' M-d-Y')); ?></p>
									<p style="margin-left: -4rem;"><i class="fa fa-tags"></i>&nbsp;
										<?php echo e($post->category->name); ?>

									</p>
								</div>
								<!-- Meta Ends -->
							</div>
							<!-- Excerpt Ends -->
						</article>
					<!-- Article Ends -->
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<ul class="pagination center-align">
						<?php echo e($posts->links()); ?>

					</ul>
				</div>
				<!-- Sidebar Starts -->
				<div class="sidebar col s12 m4 l4 xl4">
					<div class="row">
						<div class="col s12 m12 l12 xl12">
							<a href="<?php echo e(url('/')); ?>" class="btn back">
								<i class="fa fa-home"></i> Home
							</a>
						</div>
					</div>
					<!-- Search Widget Starts -->
					<div class="widget widget-search">
						<div>
							<input placeholder="Search in my blog ..." type="search">
						</div>
					</div>
					<!-- Search Widget Ends -->
					<!-- Latest Posts Widget Ends -->
					<div class="widget recent-posts">
						<h3 class="widget-title">Recent Posts</h3>
						<ul class="unstyled clearfix">
						<?php $__currentLoopData = $posts->slice(0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<!-- Recent Post Widget Starts -->
							<li>
								<div class="posts-thumb pull-left"> 
									<a href="<?php echo e(url('blogpost')); ?>/<?php echo e($post->slug); ?>">
										<img alt="img" src="<?php echo e(asset('storage/cover_images')); ?>/<?php echo e($post->cover_image); ?>">
									</a>
								</div>
								<div class="post-info">
									<h4 class="entry-title">
										<a href="<?php echo e(url('blogpost')); ?>/<?php echo e($post->slug); ?>"><?php echo e($post->title); ?></a>
									</h4>
									<p class="post-meta second-font">
										<span class="post-date"> <?php echo e(date_format($post->created_at, ' M-d-Y')); ?></span>
									</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<!-- Recent Post Widget Ends -->
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
						</ul>
					</div>
					<!-- Latest Posts Widget Ends -->
					<!-- Categories Widget Starts -->
					<div class="widget">
						<h3 class="widget-title">Categories</h3>

						<ul class="arrow nav nav-tabs second-font uppercase">
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<a href="<?php echo e(url('blogcategory')); ?>/<?php echo e($category->id); ?>/<?php echo e(preg_replace('/\s+/', '-', strtolower($category->name))); ?>"><?php echo e($category->name); ?></a>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<!-- Categories Widget Ends -->
	
					<!-- Tags Widget Starts -->
					<div class="widget widget-tags">
						<h3 class="widget-title">Popular Tags </h3>
						<ul class="unstyled clearfix">
							<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><a href="#"><?php echo e($tag->name); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			            </ul>
					</div>
					<!-- Tags Widget Ends -->
				</div>
				<!-- Sidebar Ends -->
			</div>
		</div>
    </div>
    <!-- Wrapper Ends -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/blog.blade.php ENDPATH**/ ?>