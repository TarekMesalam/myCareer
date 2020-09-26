<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->getFromJson('app.name'); ?></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(ucwords($user->name)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email"><?php echo app('translator')->getFromJson('app.email'); ?></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="company_phone"><?php echo app('translator')->getFromJson('app.password'); ?></label>
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="help-block"> <?php echo app('translator')->getFromJson('messages.passwordNote'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('app.image'); ?></label>
                            <div class="card">
                                <div class="card-body">
                                    <input type="file" id="input-file-now" name="image" accept=".png,.jpg,.jpeg" class="dropify" data-default-file="<?php echo e($user->profile_image_url); ?>"/>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="save-form" class="btn btn-success waves-effect waves-light m-r-10"><?php echo app('translator')->getFromJson('app.save'); ?></button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->getFromJson('app.reset'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        "use strict";

        $('#save-form').on('click', function(){
            $.easyAjax({
                url: '<?php echo e(route('admin.profile.update', $user->id)); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/profile/index.blade.php ENDPATH**/ ?>