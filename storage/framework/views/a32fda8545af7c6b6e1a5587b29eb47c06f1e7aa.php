<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo app('translator')->getFromJson('app.edit'); ?></h4>
                    <form class="ajax-form" method="POST" id="createForm">
                        <?php echo csrf_field(); ?>
                        <input name="_method" type="hidden" value="PUT">
                    <div id="education_fields"></div>
                    <div class="row">
                        <div class="col-sm-9 nopadding">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="name" value="<?php echo e($category->name); ?>" class="form-control" placeholder="<?php echo app('translator')->getFromJson('menu.jobCategories'); ?> <?php echo app('translator')->getFromJson('app.name'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <h6><?php echo app('translator')->getFromJson('modules.front.photo'); ?></h6>
                                <input class="select-file" accept=".png,.jpg,.jpeg" type="file" name="photo"><br>
                                <span class="help-block"><?php echo app('translator')->getFromJson('modules.front.photoFileType'); ?></span>
                            </div>
                            <?php if(!is_null($category->photo)): ?>
                                <p>
                                    <a target="_blank" href="<?php echo e(asset('user-uploads/category-photos/'.$category->photo)); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->getFromJson('app.view'); ?></a>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="button" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
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
                url: '<?php echo e(route('admin.job-categories.update', $category->id)); ?>',
                container: '#createForm',
                type: "POST",
                redirect: true,
                file: true,
                data: $('#createForm').serialize()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/job-category/edit.blade.php ENDPATH**/ ?>