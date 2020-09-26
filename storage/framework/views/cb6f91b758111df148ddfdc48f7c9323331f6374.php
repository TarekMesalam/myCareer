<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->getFromJson('app.createNew'); ?></h4>
                    <form class="ajax-form" method="POST" id="createForm">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="address"><?php echo app('translator')->getFromJson('app.country'); ?></label>
                                    <select name="country_id" id="country_id" class="form-control select2 custom-select">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"><?php echo e(ucfirst($country->country_name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="education_fields"></div>
                        <div class="row">
                            <div class="col-sm-9 nopadding">
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" placeholder="<?php echo app('translator')->getFromJson('menu.locations'); ?> <?php echo app('translator')->getFromJson('app.name'); ?>">
                                </div>
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
                url: '<?php echo e(route('admin.locations.store')); ?>',
                container: '#createForm',
                type: "POST",
                redirect: true,
                data: $('#createForm').serialize()
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/locations/create.blade.php ENDPATH**/ ?>