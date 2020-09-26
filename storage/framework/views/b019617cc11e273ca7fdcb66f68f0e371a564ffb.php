<div class="card">
    <div class="card-header bg-secondary" style="background: #1b274a !important">
        <?php echo app('translator')->getFromJson('messages.installationWelcome'); ?>
        <div class="row">
            <div class="col-md-12 col-sm-10">
                <div class="progress progress-striped m-t-20 progress-lg">
                    <div id="dbprogressbar" role="progressbar" aria-valuenow="<?php echo e($progressPercent); ?>" aria-valuemin="0"
                        aria-valuemax="100"
                        class="progress-bar progress-bar-success progress-bar-striped"
                        style="width: <?php echo e($progressPercent); ?>%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 c-white m-t-10">
                <strong><?php echo app('translator')->getFromJson('messages.installationProgress'); ?> : </strong> 
                <?php echo e($progressPercent); ?>%
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div id="db-info-box" class="info-box">
                <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <div class="info-box-content">
                    <div class="info-box-number"><a href="#"><?php echo app('translator')->getFromJson('messages.installationStep1'); ?></a></div>
                    <h6 class="info-box-text"><?php echo app('translator')->getFromJson('messages.installationCongratulation'); ?></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="db-info-box1" class="info-box">
                <?php if(isset($progress['smtp_setting_completed'])): ?>
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <?php else: ?>
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                <?php endif; ?>
                <div class="info-box-content">
                    <div class="info-box-number">
                        <a href="<?php echo e(route('admin.smtp-settings.index')); ?>" class=""><?php echo app('translator')->getFromJson('messages.installationStep2'); ?></a>
                    </div>
                    <h6 class="info-box-text"><?php echo app('translator')->getFromJson('messages.installationSmtp'); ?></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="db-info-box2" class="info-box">
                <?php if(isset($progress['company_setting_completed'])): ?>
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <?php else: ?>
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                <?php endif; ?>
                <div class="info-box-content">
                    <div class="info-box-number">
                        <a href="<?php echo e(route('admin.settings.index')); ?>"><?php echo app('translator')->getFromJson('messages.installationStep3'); ?></a>
                    </div>
                    <h6 class="info-box-text"><?php echo app('translator')->getFromJson('messages.installationCompanySetting'); ?></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="db-info-box3" class="info-box">
                <?php if(isset($progress['profile_setting_completed'])): ?>
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <?php else: ?>
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                <?php endif; ?>
                <div class="info-box-content">
                    <div class="info-box-number">
                        <a href="<?php echo e(route('admin.profile.index')); ?>" class=""><?php echo app('translator')->getFromJson('messages.installationStep4'); ?></a>
                    </div>
                    <h6 class="info-box-text"><?php echo app('translator')->getFromJson('messages.installationProfileSetting'); ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/dashboard/get_started.blade.php ENDPATH**/ ?>