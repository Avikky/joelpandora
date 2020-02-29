<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Joel Pandora - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/font-awesome.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo e(asset('asset/css/jquery.animatedheadline.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/materialize.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/style.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/skins/yellow.css')); ?>" />

    <!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="blue" href="<?php echo e(asset('asset/css/skins/blue.css')); ?>" />
    <link rel="alternate stylesheet" type="text/css" title="blueviolet" href="<?php echo e(asset('asset/css/skins/blueviolet.css')); ?>" />
    <link rel="alternate stylesheet" type="text/css" title="goldenrod" href="<?php echo e(asset('asset/css/skins/goldrenrod.css')); ?>" />
    <link rel="alternate stylesheet" type="text/css" title="green" href="<?php echo e(asset('asset/css/skins/green.css')); ?>" />
    <link rel="alternate stylesheet" type="text/css" title="magenta" href="<?php echo e(asset('asset/css/skins/magenta.css')); ?>" />
    <link rel="alternate stylesheet" type="text/css" title="orange" href="<?php echo e(asset('asset/css/skins/orange.css')); ?>" />
    <link rel="alternate stylesheet" type="text/css" title="purple" href="<?php echo e(asset('asset/css/skins/purple.css')); ?>" />
    <link rel="alternate stylesheet" type="text/css" title="red" href="<?php echo e(asset('asset/css/skins/red.css')); ?>" />
	<link rel="alternate stylesheet" type="text/css" title="yellow" href="<?php echo e(asset('asset/css/skins/yellow.css')); ?>" />
	<link rel="alternate stylesheet" type="text/css" title="yellowgreen" href="<?php echo e(asset('asset/css/skins/yellowgreen.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/styleswitcher.css')); ?>" />

    <!-- Template JS Files -->

    <script src="<?php echo e(asset('asset/js/modernizr.custom.js')); ?>"></script>

</head>

<body class="dark">
 
    <!-- Preloader Ends -->
    <!-- Live Style Switcher Starts - demo only -->
    <!-- <div id="switcher" class="">
        <div class="content-switcher">
            <h4>STYLE SWITCHER</h4>
            <ul>
                <li>
                    <a href="#" onclick="setActiveStyleSheet('purple');" title="purple" class="color"><img src="images/styleswitcher/purple.png" alt="purple"/></a>
                </li>
                <li>
                    <a href="#" onclick="setActiveStyleSheet('red');" title="red" class="color"><img src="images/styleswitcher/red.png" alt="red"/></a>
                </li>
                <li>
                    <a href="#" onclick="setActiveStyleSheet('blueviolet');" title="blueviolet" class="color"><img src="images/styleswitcher/blueviolet.png" alt="blueviolet"/></a>
                </li>
                <li>
                    <a href="#" onclick="setActiveStyleSheet('blue');" title="blue" class="color"><img src="images/styleswitcher/blue.png" alt="blue"/></a>
                </li>
                <li>
                    <a href="#" onclick="setActiveStyleSheet('goldenrod');" title="goldenrod" class="color"><img src="images/styleswitcher/goldenrod.png" alt="goldenrod"/></a>
                </li>
                <li>
                    <a href="#" onclick="setActiveStyleSheet('magenta');" title="magenta" class="color"><img src="images/styleswitcher/magenta.png" alt="magenta"/></a>
                </li>
                <li>
                    <a href="#" onclick="setActiveStyleSheet('yellowgreen');" title="yellowgreen" class="color"><img src="images/styleswitcher/yellowgreen.png" alt="yellowgreen"/></a>
                </li>
                <li>
                    <a href="#" onclick="setActiveStyleSheet('orange');" title="orange" class="color"><img src="images/styleswitcher/orange.png" alt="orange"/></a>
                </li>
				<li>
                    <a href="#" onclick="setActiveStyleSheet('green');" title="green" class="color"><img src="images/styleswitcher/green.png" alt="green"/></a>
                </li>
				<li>
                    <a href="#" onclick="setActiveStyleSheet('yellow');" title="yellow" class="color"><img src="images/styleswitcher/yellow.png" alt="yellow"/></a>
                </li>
            </ul>
			<h4>BODY SKIN</h4>

           <label> <input class="dark_switch" type="radio" name="color_style" id="is_light" value="light" /> Light</label>
		<label> <input class="dark_switch" type="radio" name="color_style" id="is_dark" value="dark"  checked="checked" />  Dark</label><br>
			
            <div id="hideSwitcher">&times;</div>
        </div>
    </div>
    <div id="showSwitcher" class="styleSecondColor"><i class="fa fa-cog fa-spin"></i></div> -->
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- Wrapper Ends -->

    <script src="<?php echo e(asset('asset/js/jquery-2.2.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/jquery.animatedheadline.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/boxlayout.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/materialize.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/jquery.hoverdir.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/custom.js')); ?>"></script>

    <!-- Live Style Switcher JS File - only demo -->
    <script src="<?php echo e(asset('asset/js/styleswitcher.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/layouts/app2.blade.php ENDPATH**/ ?>