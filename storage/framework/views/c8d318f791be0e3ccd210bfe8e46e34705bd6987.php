<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo app('translator')->getFromJson('app.edit'); ?></h4>
                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="company_name"><?php echo app('translator')->getFromJson('modules.accountSettings.companyName'); ?></label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo e($company->company_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="company_email"><?php echo app('translator')->getFromJson('modules.accountSettings.companyEmail'); ?></label>
                            <input type="email" class="form-control" id="company_email" name="company_email" value="<?php echo e($company->company_email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="company_phone"><?php echo app('translator')->getFromJson('modules.accountSettings.companyPhone'); ?></label>
                            <input type="tel" class="form-control" id="company_phone" name="company_phone" value="<?php echo e($company->company_phone); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('modules.accountSettings.companyWebsite'); ?></label>
                            <input type="text" class="form-control" id="website" name="website" value="<?php echo e($company->website); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('modules.accountSettings.companyLogo'); ?></label>
                            <div class="card">
                                <div class="card-body">
                                    <input type="file" id="input-file-now" name="logo" class="dropify" <?php if(is_null($company->logo)): ?>
                                    data-default-file="<?php echo e(asset('logo-not-found.png')); ?>" <?php else: ?> data-default-file="<?php echo e(asset('user-uploads/company-logo/'.$company->logo)); ?>" <?php endif; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.companyAddress'); ?></label>
                            <textarea class="form-control" id="address" rows="5" name="address"><?php echo e($company->address); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->getFromJson('app.status'); ?></label>
                            <select name="status" id="status" class="form-control">
                                <option <?php if($company->status == 'active'): ?> selected <?php endif; ?>>active</option>
                                <option <?php if($company->status == 'inactive'): ?> selected <?php endif; ?>>inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->getFromJson('modules.company.showFrontend'); ?></label>
                            <select name="show_in_frontend" id="show_in_frontend" class="form-control">
                                <option <?php if($company->show_in_frontend == 'true'): ?> selected <?php endif; ?> value="true"><?php echo app('translator')->getFromJson('app.yes'); ?></option>
                                <option <?php if($company->show_in_frontend == 'false'): ?> selected <?php endif; ?> value="false"><?php echo app('translator')->getFromJson('app.no'); ?></option>
                            </select>
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
                url: '<?php echo e(route("admin.company.update", $company->id)); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/admin/company/edit.blade.php ENDPATH**/ ?>