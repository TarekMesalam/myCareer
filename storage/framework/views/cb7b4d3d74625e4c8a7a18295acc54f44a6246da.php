<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCMS | <?php echo e($job->title); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(url('/')); ?>/front/new_assets/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/front/new_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/front/new_assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/front/new_assets/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/front/new_assets/css/style.css">
</head>
<body>
<!-- Navbar -->
<?php echo $__env->make('sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /Navbar -->
<main class="page-wrapper single-job">
    <div class="page-breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb" class="m-0 p-0">
                <ol class="breadcrumb m-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"><?php echo e($job->category->name); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('jobs.jobDetail', [$job->slug])); ?>"><?php echo e($job->title); ?></a></li>
                    <li class="breadcrumb-item active">Apply Form</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row pt-5">
            <form id="createForm" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">
                <div class="container">
                    <div class="row gap-y">

                        <div class="col-md-4 px-20 pb-30 bb-1">
                            <h5><?php echo app('translator')->getFromJson('modules.front.personalInformation'); ?></h5>
                        </div>
                        <div class="col-md-8 pb-30 bb-1">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="full_name" placeholder="<?php echo app('translator')->getFromJson('modules.front.fullName'); ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="email" name="email" placeholder="<?php echo app('translator')->getFromJson('modules.front.email'); ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="tel" name="phone" placeholder="<?php echo app('translator')->getFromJson('modules.front.phone'); ?>">
                            </div>
                            <div class="form-group">
                                <h6><?php echo app('translator')->getFromJson('modules.front.photo'); ?></h6>
                                <input class="select-file" accept=".png,.jpg,.jpeg" type="file" name="photo"><br>
                                <span class="help-block"><?php echo app('translator')->getFromJson('modules.front.photoFileType'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 px-20 py-30 bb-1">
                            <h5><?php echo app('translator')->getFromJson('modules.front.resume'); ?></h5>
                        </div>
                        <div class="col-md-8 py-30 bb-1">
                            <div class="form-group">
                                <input class="select-file" type="file" name="resume"><br>
                            </div>
                        </div>
                        <?php if(count($jobQuestion) > 0): ?>
                            <div class="col-md-4 px-20 pb-30 bb-1">
                                <h5><?php echo app('translator')->getFromJson('modules.front.additionalDetails'); ?></h5>
                            </div>
                            <div class="col-md-8 pb-30 bb-1">
                                <?php $__empty_1 = true; $__currentLoopData = $jobQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" id="answer[<?php echo e($question->question->id); ?>]" name="answer[<?php echo e($question->question->id); ?>]" placeholder="<?php echo e($question->question->question); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-4 px-20 pt-30 mb-50">
                            <h5><?php echo app('translator')->getFromJson('modules.front.coverLetter'); ?></h5>
                        </div>
                        <div class="col-md-8 pt-30 mb-50">
                            <div class="form-group">
                                <textarea class="form-control form-control-lg" name="cover_letter" rows="4"></textarea>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block theme-background" style="
    background: #3a325e;" id="save-form" type="button"><?php echo app('translator')->getFromJson('modules.front.submitApplication'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Footer -->
<?php echo $__env->make('sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /Footer -->

<script src="<?php echo e(url('/')); ?>/front/new_assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo e(url('/')); ?>/front/new_assets/js/bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/front/new_assets/js/slick.min.js"></script>
<script src="<?php echo e(url('/')); ?>/front/new_assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo e(url('/')); ?>/front/new_assets/js/main.js"></script>
<script src="<?php echo e(asset('mycareer-helper/helper.js')); ?>"></script>
<script>
    "use strict";

    $('#save-form').on('click', function(){
        $.easyAjax({
            url: '<?php echo e(route('jobs.saveApplication')); ?>',
            container: '#createForm',
            type: "POST",
            file:true,
            redirect: true,
            success: function (response) {
                if(response.status == 'success'){
                    var successMsg = '<div class="alert alert-success my-100" role="alert">' +
                        response.msg + ' <a class="" href="<?php echo e(route('jobs.jobOpenings')); ?>"><?php echo app('translator')->getFromJson("app.view"); ?> <?php echo app('translator')->getFromJson("modules.front.jobOpenings"); ?> <i class="fa fa-arrow-right"></i></a>'
                    '</div>';
                    $('.main-content .container').html(successMsg);
                }
            },
            error: function (response) {
                handleFails(response);
            }
        })
    });

    function handleFails(response) {
        if (typeof response.responseJSON.errors != "undefined") {
            var keys = Object.keys(response.responseJSON.errors);

            $('#createForm').find(".has-error").find(".help-block").remove();
            $('#createForm').find(".has-error").removeClass("has-error");

            for (var i = 0; i < keys.length; i++) {
                var key = keys[i].replace(".", '\\.');
                var formarray = keys[i];

                if(formarray.indexOf('.') >0){
                    var array = formarray.split('.');
                    response.responseJSON.errors[keys[i]] = response.responseJSON.errors[keys[i]];
                    key = array[0]+'['+array[1]+']';
                }

                var ele = $('#createForm').find("[name='" + key + "']");

                var grp = ele.closest(".form-group");
                $(grp).find(".help-block").remove();

                var wys = $(grp).find(".wysihtml5-toolbar").length;

                if(wys > 0){
                    var helpBlockContainer = $(grp);
                }
                else{
                    var helpBlockContainer = $(grp).find("div:first");
                }

                if($(ele).is(':radio')){
                    helpBlockContainer = $(grp).find("div:eq(2)");
                }

                if (helpBlockContainer.length == 0) {
                    helpBlockContainer = $(grp);
                }

                helpBlockContainer.append('<div class="help-block">' + response.responseJSON.errors[keys[i]] + '</div>');
                $(grp).addClass("has-error");
            }

            if (keys.length > 0) {
                var element = $("[name='" + keys[0] + "']");
                if (element.length > 0) {
                    $("html, body").animate({scrollTop: element.offset().top - 150}, 200);
                }
            }
        }
    }
</script>
</body>
</html>
<?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/front/job-apply.blade.php ENDPATH**/ ?>