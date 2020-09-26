<?php $__env->startSection('header-text'); ?>
    <h1 class="hidden-sm-down"><i class="icon-ribbon"></i> <?php echo app('translator')->getFromJson('modules.front.homeHeader'); ?> </h1>
    <h4 class="hidden-sm-up"><i class="icon-ribbon"></i> <?php echo app('translator')->getFromJson('modules.front.homeHeader'); ?> </h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="container">
            <div data-provide="shuffle">
                <div class="text-center gap-multiline-items-2 job-filters" data-shuffle="filter">
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                            <h2 class="mb-5"><?php echo app('translator')->getFromJson('modules.front.jobCategoriesTitle'); ?></h2>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div class="row">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-6 col-lg-4 portfolio-2">
                                <div id="jobCategories" data-shuffle="button" data-group="<?php echo e($category->name); ?>" class="job-opening-card">
                                    <div class="card card-bordered">
                                        <?php if($category->photo == null): ?>
                                            <img class="card-img-top" src="logo-not-found.png" alt="<?php echo e($category->name); ?>">
                                        <?php else: ?>
                                            <img class="card-img-top" src="user-uploads/category-photos/<?php echo e($category->photo); ?>" alt="<?php echo e($category->name); ?>">
                                        <?php endif; ?>
                                        <div class="card-block">
                                            <h5 class="card-title"><?php echo e(ucwords($category->name)); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if(count($categories) == 0): ?>
                    <h3><?php echo app('translator')->getFromJson('modules.front.noCategories'); ?></h3>
                <?php endif; ?>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                        <h2 class="mb-5"><?php echo app('translator')->getFromJson('modules.front.jobs'); ?></h2>
                    </div>
                </div>
                <p>&nbsp;</p>
                <?php if(count($locations) == 0): ?>
                    <h3><?php echo app('translator')->getFromJson('modules.front.noLocations'); ?></h3>
                <?php endif; ?>
                <?php if(count($locations) > 0): ?>
                    <div class="text-center gap-multiline-items-2 job-filters" data-shuffle="filter">
                        <button class="btn btn-w-md btn-outline btn-round btn-primary active" data-shuffle="button"><?php echo app('translator')->getFromJson('modules.front.locationAllTitle'); ?></button>
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button class="btn btn-w-md btn-outline btn-round btn-primary" data-shuffle="button" data-group="<?php echo e($location->location); ?>"><?php echo e(ucwords($location->location)); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <p>&nbsp;</p>
                <?php if(count($jobs) == 0): ?>
                    <h3><?php echo app('translator')->getFromJson('modules.front.noJobs'); ?></h3>
                <?php endif; ?>
                <div class="row gap-y" data-shuffle="list">
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-8 mb-5 mb-md-0" data-shuffle="item" data-groups="<?php echo e($job->location->location.','.$job->category->name); ?>">
                            <div id="jobs" class="rounded border jobs-wrap">
                                <a href="<?php echo e(route('jobs.jobDetail', [$job->slug])); ?>" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                                    <div class="company-logo blank-logo text-center text-md-left pl-3">
                                        <?php if($job->company->logo == null): ?>
                                            <img src="logo-not-found.png" alt="<?php echo e($job->title); ?>" class="img-fluid mx-auto">
                                        <?php else: ?>
                                            <img src="<?php echo e($job->company->logo); ?>" alt="<?php echo e($job->title); ?>" class="img-fluid mx-auto">
                                        <?php endif; ?>
                                    </div>
                                    <div class="job-details">
                                        <div class="p-3 align-self-center">
                                            <h3><?php echo e(ucwords($job->title)); ?></h3>
                                            <div class="d-block d-lg-flex">
                                                <div class="mr-3"><?php echo e(ucwords($job->category->name)); ?></div>
                                                <div class="mr-3"><i class="fa fa-map-marker"></i> <?php echo e(ucwords($job->location->location).', '.ucwords($job->location->country->country_name)); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="jobLeftDays" class="job-category align-self-center">
                                        <div class="p-3">
                                            <span class="text-info p-2 rounded border border-info"><?php echo e(\Carbon\Carbon::parse( $job->end_date )->diffInDays( date('Y-m-d') )); ?> days left</span>
                                        </div>
                                    </div>  
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/front/job-openings.blade.php ENDPATH**/ ?>