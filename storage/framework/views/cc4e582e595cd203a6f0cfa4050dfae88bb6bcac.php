<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-bar-rating-master/dist/themes/fontawesome-stars.css')); ?>">
<div class="rpanel-title"> <?php echo app('translator')->getFromJson('menu.jobApplications'); ?> <span><i class="ti-close right-side-toggle"></i></span></div>
<div class="r-panel-body p-3">
    <div class="row font-12">
        <div class="col-4">
            <img src="<?php echo e($application->photo_url); ?>" class="img-circle img-fluid" width="150">
            
            <p class="text-muted resume-button">
                <a target="_blank" href="<?php echo e($application->resume_url); ?>"
                   class="btn btn-sm btn-primary"><?php echo app('translator')->getFromJson('app.view'); ?> <?php echo app('translator')->getFromJson('modules.jobApplication.resume'); ?></a>
            </p>
            
            <?php if($user->can('edit_job_applications')): ?>
                <div class="stars stars-example-fontawesome">
                    <select id="example-fontawesome" name="rating" autocomplete="off">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-8 right-panel-box">
            <div class="col-sm-12">
                <strong><?php echo app('translator')->getFromJson('app.name'); ?></strong><br>
                <p class="text-muted"><?php echo e(ucwords($application->full_name)); ?></p>
            </div>
            <div class="col-sm-12">
                <strong><?php echo app('translator')->getFromJson('modules.jobApplication.appliedFor'); ?></strong><br>
                <p class="text-muted"><?php echo e(ucwords($application->job->title).' ('.ucwords($application->job->location->location).')'); ?></p>
            </div>
            <div class="col-sm-12">
                <strong><?php echo app('translator')->getFromJson('app.email'); ?></strong><br>
                <p class="text-muted"><?php echo e($application->email); ?></p>
            </div>
            <div class="col-sm-12">
                <strong><?php echo app('translator')->getFromJson('app.phone'); ?></strong><br>
                <p class="text-muted"><?php echo e($application->phone); ?></p>
            </div>
            <div class="col-sm-12">
                <strong><?php echo app('translator')->getFromJson('modules.jobApplication.appliedAt'); ?></strong><br>
                <p class="text-muted"><?php echo e($application->created_at->format('d M, Y H:i')); ?></p>
            </div>
            <?php $__empty_1 = true; $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-sm-12">
                    <strong><?php echo e($answer->question->question); ?> ? </strong><br>
                    <p class="text-muted"><?php echo e(ucfirst($answer->answer)); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
            <?php if(!is_null($application->schedule)): ?>
                <hr>
                <h5><?php echo app('translator')->getFromJson('modules.interviewSchedule.scheduleDetail'); ?></h5>
                <div class="col-sm-12">
                    <strong><?php echo app('translator')->getFromJson('modules.interviewSchedule.scheduleDate'); ?></strong><br>
                    <p class="text-muted"><?php echo e($application->schedule->schedule_date->format('d M, Y H:i')); ?></p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <strong><?php echo app('translator')->getFromJson('modules.interviewSchedule.assignedEmployee'); ?></strong><br>
                    </div>
                    <div class="col-sm-6">
                        <strong><?php echo app('translator')->getFromJson('modules.interviewSchedule.employeeResponse'); ?></strong><br>
                    </div>
                    <?php $__empty_1 = true; $__currentLoopData = $application->schedule->employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-sm-6">
                            <p class="text-muted"><?php echo e(ucwords($emp->user->name)); ?></p>
                        </div>

                        <div class="col-sm-6">
                            <?php if($emp->user_accept_status == 'accept'): ?>
                                <label class="badge badge-success"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php elseif($emp->user_accept_status == 'refuse'): ?>
                                <label class="badge badge-danger"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php else: ?>
                                <label class="badge badge-warning"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if(isset($application->schedule->comments) == 'interview' && count($application->schedule->comments) > 0): ?>
                <hr>
                <h5><?php echo app('translator')->getFromJson('modules.interviewSchedule.comments'); ?></h5>
                <?php $__empty_1 = true; $__currentLoopData = $application->schedule->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-12">
                        <p class="text-muted"><b><?php echo e($comment->user->name); ?>:</b> <?php echo e($comment->comment); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            <?php endif; ?>
            <div class="col-sm-12">
                <p class="text-muted">
                    <?php if(!is_null($application->skype_id)): ?>
                        <span class="skype-button rounded" data-contact-id="live:<?php echo e($application->skype_id); ?>"
                              data-text="Call"></span>
                    <?php endif; ?>
                </p>
            </div>
            <div class="row">
                <?php if($user->can('add_schedule') && $application->status->status == 'interview' && is_null($application->schedule)): ?>
                    <div class="col-sm-6">
                        <p class="text-muted">
                            <a onclick="createSchedule('<?php echo e($application->id); ?>')" href="javascript:;" class="btn btn-sm btn-info"><?php echo app('translator')->getFromJson('modules.interviewSchedule.scheduleInterview'); ?></a>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php if($user->can('edit_job_applications')): ?>
    <script src="<?php echo e(asset('assets/plugins/jquery-bar-rating-master/dist/jquery.barrating.min.js')); ?>" type="text/javascript"></script>
    <script>
        "use strict";
        
        $('#example-fontawesome').barrating({
            theme: 'fontawesome-stars',
            showSelectedRating: false,
            onSelect: function (value, text, event) {
                if (event !== undefined && value !== '') {
                    var url = "<?php echo e(route('admin.job-applications.rating-save',':id')); ?>";
                    url = url.replace(':id', <?php echo e($application->id); ?>);
                    var token = '<?php echo e(csrf_token()); ?>';
                    var id = <?php echo e($application->id); ?>;
                    $.easyAjax({
                        type: 'Post',
                        url: url,
                        container: '#example-fontawesome',
                        data: {'rating': value, '_token': token},
                        success: function (response) {
                            $('#example-fontawesome_' + id).barrating('set', value);
                        }
                    });
                }
            }
        });
        <?php if($application->rating !== null): ?>
            $('#example-fontawesome').barrating('set', <?php echo e($application->rating); ?>);
        <?php endif; ?>
    </script>
<?php endif; ?>
<?php if(!is_null($application->skype_id)): ?>
    <script src="<?php echo e(asset('assets/skype/sdk.min.js')); ?>"></script>
<?php endif; ?>
<?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/admin/job-applications/show.blade.php ENDPATH**/ ?>