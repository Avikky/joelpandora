<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>
	<style>
		/* article {
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
		} */
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
					<article>
						<a href="blog-post-dark.html"><h4><?php echo e($post->title); ?></h4></a>
						<!-- Figure Starts -->
						<figure class="blog-figure">
						<img class="responsive-img" src="<?php echo e(asset('storage/cover_images')); ?>/<?php echo e($post->cover_image); ?>" alt="">
						</figure>
						<!-- Figure Ends -->
							<div class="body second-font">
								<?php echo substr($post->body, 0, 300); ?>

							</div>
						<!-- Excerpt Starts -->
						<div class="blog-excerpt second-font">
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
						<br><br>
						<!-- Excerpt Ends -->
						<!-- Comments Starts -->
						<div class="comments">
							<h3 class="comments-heading uppercase">17 Comments</h3>
							<ul class="comments-list">
								<li>
									<!-- Comment Starts -->
									<div class="comment">
									<img class="comment-avatar pull-left" alt="" src="<?php echo e(asset('asset/images/blog/user1.jpg')); ?>">
										<div class="comment-body">
											<div class="meta-data">
												<span class="comment-author">Dalel Boubaker</span>
												<span class="comment-date pull-right second-font">January 17, 2017</span>
											</div>
											<div class="comment-content">
											<p class="second-font">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehen.</p></div>
											<div>
												<a class="comment-reply" href="#">Reply</a>
											</div>	
										</div>
									</div>
									<!-- Comment Ends -->
									<ul class="comments-reply">
										<li>
											<!-- Comment Starts -->
											<div class="comment">
											<img class="comment-avatar pull-left" alt="" src="<?php echo e(asset('asset/images/blog/user2.jpg')); ?>">
												<div class="comment-body">
													<div class="meta-data">
														<span class="comment-author">Lina Marzouki</span>
														<span class="comment-date pull-right second-font">January 17, 2017</span>
													</div>
													<div class="comment-content">
													<p class="second-font">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehen.</p></div>
													<div>
														<a class="comment-reply" href="#">Reply</a>
													</div>	
												</div>
											</div>
											<!-- Comment Ends -->
										</li>
									</ul>
									<!-- Comment Starts -->
									<div class="comment last">
									<img class="comment-avatar pull-left" alt="" src="<?php echo e(asset('asset/images/blog/user3.jpg')); ?>">
										<div class="comment-body">
											<div class="meta-data">
												<span class="comment-author">Slim Hamdi</span>
												<span class="comment-date pull-right second-font">January 17, 2017</span>
											</div>
											<div class="comment-content">
											<p class="second-font">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehen.</p></div>
											<div>
												<a class="comment-reply" href="#">Reply</a>
											</div>	
										</div>
									</div>
									<!-- Comment Ends -->
								</li>
							</ul>
							<h3 class="comments-heading uppercase add-comment">Add a comment</h3>
							<!-- Comments Form Starts -->
							<div class="comments-form">
								<form role="form">
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
                                    <!-- Email Field Ends -->
                                    <!-- Comment Textarea Starts -->
                                    <div class="input-field second-font">
                                        <i class="fa fa-comments prefix"></i>
                                        <textarea id="comment" name="comment" class="materialize-textarea" required></textarea>
                                        <label for="comment">Your comment</label>
                                    </div>
                                    <!-- Comment Textarea Ends -->
									<!-- Submit Form Button Starts -->
                                    <div class="col s12 m12 l6 xl6 submit-form">
                                        <button class="btn font-weight-700" type="submit" name="send">
											Add comment <i class="fa fa-comment"></i>
										</button>
                                    </div>
                                    <!-- Submit Form Button Ends -->
								</form>
							</div>
							<!-- Comments Form Ends -->
						</div>
					</article>
					<!-- Article Ends -->
				</div>
				<!-- Sidebar Starts -->
				<div class="sidebar col s12 m4 l4 xl4">
					<div class="row">
						<div class="col s6 m6 l6 xl6">
							<a href="<?php echo e(url('blog')); ?>" class="btn back"><i class="fa fa-arrow-left"></i> Blog</a>
						</div>
						<div class="col s6 m6 l6 xl6">
						<a href="<?php echo e(url('/')); ?>" class="btn back"><i class="fa fa-home"></i> Home</a>
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
										<a href="<?php echo e(url('blogpost')); ?>/<?php echo e($post->slug); ?>">
										<?php echo e($post->title); ?></a>
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
				<!-- Tags Widget Starts -->
					<div class="widget widget-tags">
						<h3 class="widget-title">Popular Tags </h3>
						<ul class="unstyled clearfix">
							<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/blogpost.blade.php ENDPATH**/ ?>