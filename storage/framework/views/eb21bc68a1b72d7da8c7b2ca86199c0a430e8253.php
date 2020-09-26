<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="<?php echo e(url('/translations')); ?>" target="_blank" class="btn btn-sm mb-3 btn-primary"><i class="ti-settings"></i> <?php echo app('translator')->getFromJson('messages.manageLanguageTranslations'); ?></a>
                    <form class="ajax-form" method="POST" id="createForm">
                        <?php echo method_field('PUT'); ?>
                        <div class="form-body">
                            <div class="row">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-6 col-md-4 m-t-10">
                                        <div class="form-group">
                                            <label class="control-label col-sm-8"><?php echo e($language->language_name); ?></label>
                                            <div class="col-sm-4">
                                                <div class="switchery-demo">
                                                    <input type="checkbox"
                                                        <?php if($language->status == 'enabled'): ?> checked
                                                        <?php endif; ?> class="js-switch change-language-setting"
                                                        data-color="#99d683" data-size="small"
                                                        data-setting-id="<?php echo e($language->id); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        "use strict";

        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });

        $('.change-language-setting').on('change', function(){
            var id = $(this).data('setting-id');

            if ($(this).is(':checked'))
                var status = 'enabled';
            else
                var status = 'disabled';

            var url = '<?php echo e(route('admin.language-settings.update', ':id')); ?>';

            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                type: "POST",
                data: {'id': id, 'status': status, '_method': 'PUT', '_token': '<?php echo e(csrf_token()); ?>'}
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/language-settings/index.blade.php ENDPATH**/ ?>