<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">
<div class="modal-header">
    <h4 class="modal-title"><?php echo app('translator')->getFromJson('modules.interviewSchedule.interviewSchedule'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <div class="row font-12">
            <div class="col-6">
                <div class="row">
                    <div class="col-md-5">
                        <h4><?php echo app('translator')->getFromJson('modules.interviewSchedule.scheduleEditDetail'); ?></h4>
                    </div>
                    <div class="col-md-5">
                        <?php if($currentDateTimestamp <= $schedule->schedule_date->timestamp && $user->can('edit_schedule')): ?>
                            <button onclick="editSchedule()" class="btn btn-sm btn-info notify-button-show" title="Edit"> <i class="fa fa-pencil"></i> <?php echo app('translator')->getFromJson('app.edit'); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <strong><?php echo app('translator')->getFromJson('modules.interviewSchedule.job'); ?></strong><br>
                    <p class="text-muted"><?php echo e(ucwords($schedule->jobApplication->job->title).' ('.ucwords($schedule->jobApplication->job->location->location).')'); ?></p>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <strong><?php echo app('translator')->getFromJson('modules.interviewSchedule.assignedEmployee'); ?></strong><br>
                    </div>
                    <div class="col-sm-6">
                        <strong><?php echo app('translator')->getFromJson('modules.interviewSchedule.employeeResponse'); ?></strong><br>
                    </div>
                    <?php $__empty_1 = true; $__currentLoopData = $schedule->employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                        <div class="col-sm-12 text-center text-muted">
                            <strong><?php echo app('translator')->getFromJson('modules.interviewSchedule.noEmployeeAssigned'); ?></strong><br>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?php echo app('translator')->getFromJson('modules.interviewSchedule.candidateDetail'); ?></h4>
                    </div>
                </div>
                <div class="col-sm-12">
                    <strong><?php echo app('translator')->getFromJson('app.name'); ?></strong><br>
                    <p class="text-muted"><?php echo e(ucwords($schedule->jobApplication->full_name)); ?></p>
                </div>
                <div class="col-sm-12">
                    <strong><?php echo app('translator')->getFromJson('app.email'); ?></strong><br>
                    <p class="text-muted"><?php echo e($schedule->jobApplication->email); ?></p>
                </div>
                <div class="col-sm-12">
                    <strong><?php echo app('translator')->getFromJson('app.phone'); ?></strong><br>
                    <p class="text-muted"><?php echo e($schedule->jobApplication->phone); ?></p>
                </div>
                <div class="col-sm-12">
                    <p class="text-muted">
                        <a target="_blank" href="<?php echo e(asset('user-uploads/resumes/'.$schedule->jobApplication->resume)); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->getFromJson('app.view'); ?> <?php echo app('translator')->getFromJson('modules.jobApplication.resume'); ?></a>
                    </p>
                </div>
            </div>
            <?php if($schedule->jobApplication->schedule->comments == 'interview' && count($application->schedule->comments) > 0): ?>
                <hr>
                <h5><?php echo app('translator')->getFromJson('modules.interviewSchedule.comments'); ?></h5>
                <?php $__empty_1 = true; $__currentLoopData = $schedule->jobApplication->schedule->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted"><?php echo e($comment->user->name); ?></p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <p class="text-muted"><?php echo e($comment->comment); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            <?php endif; ?>
            <div class="col-6">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="">
                            <div id="div-interview-schedule-rejected" class="iradio_minimal-blue " onclick="statusChange('rejected')"  aria-checked="" aria-disabled="false"><input type="radio" <?php if($schedule->status == 'rejected'): ?> checked <?php endif; ?>  name="r1" class="minimal"><ins class="iCheck-helper"></ins></div>
                            <?php echo app('translator')->getFromJson('app.rejected'); ?>
                        </label><label class="">
                            <div id="div-interview-schedule-hired" class="iradio_minimal-blue" onclick="statusChange('hired')"   aria-checked="" aria-disabled="false"><input type="radio" <?php if($schedule->status == 'hired'): ?> checked <?php endif; ?>  name="r1" class="minimal"><ins class="iCheck-helper"></ins></div>
                            <?php echo app('translator')->getFromJson('app.hired'); ?>
                        </label>
                        <label class="">
                            <div id="div-interview-schedule-pending" class="iradio_minimal-blue" onclick="statusChange('pending')"   aria-checked="" aria-disabled="false"><input type="radio" <?php if($schedule->status == 'pending'): ?> checked <?php endif; ?>  name="r1" class="minimal"><ins class="iCheck-helper"></ins></div>
                            <?php echo app('translator')->getFromJson('app.pending'); ?>
                        </label>
                        <label class="">
                            <div id="div-interview-schedule-canceled" class="iradio_minimal-blue" onclick="statusChange('canceled')"   aria-checked="" aria-disabled="false"><input type="radio" <?php if($schedule->status == 'canceled'): ?> checked <?php endif; ?>  name="r1" class="minimal"><ins class="iCheck-helper"></ins></div>
                            <?php echo app('translator')->getFromJson('app.canceled'); ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
</div>
<script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
    "use strict";

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    })

    function statusChange(status) {
        var msg;
        swal({
            title: "<?php echo app('translator')->getFromJson('errors.askForCandidateEmail'); ?>",
            text: msg,
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#0c19dd",
            confirmButtonText: "<?php echo app('translator')->getFromJson('app.yes'); ?>",
            cancelButtonText: "<?php echo app('translator')->getFromJson('app.no'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                statusChangeConfirm(status , 'yes')
            }
            else{
                statusChangeConfirm(status , 'no')
            }
        });
    }

    function statusChangeConfirm(status, mailToCandidate) {
        var token = "<?php echo e(csrf_token()); ?>";
        var id = "<?php echo e($schedule->id); ?>";
        $.easyAjax({
            url: '<?php echo e(route('admin.interview-schedule.change-status')); ?>',
            container: '.modal-body',
            type: "POST",
            data: {'_token': token,'status': status,'id': id,'mailToCandidate': mailToCandidate},
            success: function (response) {
                <?php if($tableData): ?>
                    table._fnDraw();
                <?php else: ?>
                    reloadSchedule();
                <?php endif; ?>
                $('#scheduleDetailModal').modal('hide');
            }
        })
    }

    function editSchedule() {
        var url = "<?php echo e(route('admin.interview-schedule.edit', $schedule->id)); ?>";
        $('#modelHeading').html('Schedule');
        $('#scheduleEditModal').modal('hide');
        $.ajaxModal('#scheduleEditModal', url);
    }
</script>
<?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/interview-schedule/show.blade.php ENDPATH**/ ?>