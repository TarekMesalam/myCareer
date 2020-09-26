<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <form action="" class="ajax-form" id="createForm" method="POST">
                <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="example">
                                    <h5 class="box-title"><?php echo app('translator')->getFromJson('modules.themeSettings.themePrimaryColor'); ?></h5>
                                    <input type="text" name="primary_color" class="gradient-colorpicker form-control" autocomplete="off" value="<?php echo e($adminTheme->primary_color); ?>" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <h5 class="box-title"><?php echo app('translator')->getFromJson('modules.themeSettings.adminPanelCustomCss'); ?></h5>
                                <textarea name="admin_custom_css" class="my-code-area" rows="20"><?php if(is_null($adminTheme->admin_custom_css)): ?>/*Enter your custom css after this line*/<?php else: ?> <?php echo $adminTheme->admin_custom_css; ?> <?php endif; ?></textarea>
                            </div>
                            <div class="col-md-12 mb-4">
                                <h5 class="box-title"><?php echo app('translator')->getFromJson('modules.themeSettings.frontSiteCustomCss'); ?></h5>
                                <textarea name="front_custom_css" class="my-code-area" rows="20"><?php if(is_null($adminTheme->front_custom_css)): ?>/*Enter your custom css after this line*/<?php else: ?> <?php echo $adminTheme->front_custom_css; ?> <?php endif; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('app.background'); ?> <?php echo app('translator')->getFromJson('app.image'); ?></label>
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" id="input-file-now" name="image" accept=".png,.jpg,.jpeg" class="dropify" data-default-file="<?php echo e($adminTheme->background_image_url); ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="welcome_title"><?php echo app('translator')->getFromJson('app.welcomeTitle'); ?></label>
                                    <input type="text"  name="welcome_title"  id="welcome_title"  class="form-control" value="<?php echo e($adminTheme->welcome_title); ?>"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="welcome_sub_title"><?php echo app('translator')->getFromJson('app.welcomeSubTitle'); ?></label>
                                    <textarea type="text"  name="welcome_sub_title" id="welcome_sub_title" class="form-control">
                                        <?php echo htmlspecialchars($adminTheme->welcome_sub_title); ?>

                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button class="btn btn-success" id="save-form" type="button"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        "use strict";

        $('#welcome_sub_title').summernote({
            height: 150,
            minHeight: null,
            maxHeight: null,
            focus: false
        });

        $('.my-code-area').ace({ theme: 'twilight', lang: 'css' })

        $(".colorpicker").asColorPicker();

        $(".complex-colorpicker").asColorPicker({
            mode: 'complex'
        });

        $('#save-form').on('click', function(){
            $.easyAjax({
                url: '<?php echo e(route('admin.theme-settings.store')); ?>',
                container: '#createForm',
                type: "POST",
                file: true,
                redirect: true
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/admin/theme-settings/index.blade.php ENDPATH**/ ?>