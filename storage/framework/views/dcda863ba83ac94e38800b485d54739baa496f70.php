<?php $__env->startSection('content'); ?>
    <?php if(!$progress['progress_completed']): ?>
        <?php echo $__env->make('admin.dashboard.get_started', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="row ">

        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white"><?php echo e($totalOpenings); ?></h1>
                    <h6 class="text-white"><?php echo app('translator')->getFromJson('modules.dashboard.totalOpenings'); ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white"><?php echo e($totalApplications); ?></h1>
                    <h6 class="text-white"><?php echo app('translator')->getFromJson('modules.dashboard.totalApplications'); ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white"><?php echo e($totalHired); ?></h1>
                    <h6 class="text-white"><?php echo app('translator')->getFromJson('modules.dashboard.totalHired'); ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white"><?php echo e($totalRejected); ?></h1>
                    <h6 class="text-white"><?php echo app('translator')->getFromJson('modules.dashboard.totalRejected'); ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white"><?php echo e($newApplications); ?></h1>
                    <h6 class="text-white"><?php echo app('translator')->getFromJson('modules.dashboard.newApplications'); ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white"><?php echo e($shortlisted); ?></h1>
                    <h6 class="text-white"><?php echo app('translator')->getFromJson('modules.dashboard.shortlistedCandidates'); ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white"><?php echo e($totalTodayInterview); ?></h1>
                    <h6 class="text-white"><?php echo app('translator')->getFromJson('modules.dashboard.todayInterview'); ?></h6>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>