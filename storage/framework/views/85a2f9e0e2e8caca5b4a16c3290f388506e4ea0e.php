<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon/favicon-16x16.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link rel="manifest" href="<?php echo e(asset('favicon/manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">
    <title><?php echo e($setting->company_name); ?></title>
    <style>
        :root {
            --main-color: <?php echo e($frontTheme->primary_color); ?>;
        }
    </style>
    <!-- page css -->
    <link href="<?php echo e(asset('assets/dist/css/adminlte.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/plugins/iCheck/square/blue.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
</head>
<body class="hold-transition login-page" style='background-image: url("<?php echo e(asset('assets/images/login_image.jpg')); ?>");background-repeat:repeat-x'>
    <div class="login-box" >
        <div class="login-logo" style="background: #243362 !important">
            <h4><?php echo e(strtoupper(__('app.loginTitle'))); ?></h4>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <?php echo $__env->yieldContent('content'); ?>
                <div class="form-actions  pt-3">
                    <a href="<?php echo e(route('jobs.jobOpenings')); ?>" class="btn btn-sm btn-block btn-rounded btn-outline-success text-uppercase"><?php echo e(__('messages.VisitJobOpening')); ?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('assets/node_modules/jquery/jquery-3.2.1.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('assets/node_modules/popper/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        "use strict";

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/layouts/auth.blade.php ENDPATH**/ ?>