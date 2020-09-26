<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 mb-2">
            <?php if (\Entrust::can('view_schedule')) : ?>
                <a href="<?php echo e(route('admin.interview-schedule.table-view')); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->getFromJson('app.tableView'); ?> <i class="fa fa-table"></i></a>
            <?php endif; // Entrust::can ?>
            <?php if (\Entrust::can('add_schedule')) : ?>
                <a href="#" data-toggle="modal" onclick="createSchedule()" class="btn btn-sm btn-success waves-effect waves-light"><i class="ti-plus"></i> <?php echo app('translator')->getFromJson('modules.interviewSchedule.addInterviewSchedule'); ?></a>
            <?php endif; // Entrust::can ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex p-0 ui-sortable-handle">
                    <h3 class="card-title p-3">
                        <i class="fa fa-file"></i> <?php echo app('translator')->getFromJson('modules.interviewSchedule.interviewSchedule'); ?>
                    </h3>
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $upComingSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $upComingSchedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div>
                            <?php
                                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $key);
                            ?>
                            <h4><?php echo e($date->format('M d, Y')); ?></h4>
                            <ul class="scheduleul">
                                <?php $__empty_2 = true; $__currentLoopData = $upComingSchedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dtData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <li class="deco" id="schedule-<?php echo e($dtData->id); ?>" onclick="getScheduleDetail(event, <?php echo e($dtData->id); ?>) ">
                                        <h5 class="text-muted"><?php echo e(ucfirst($dtData->title)); ?> </h5>
                                        <div class="pull-right">
                                            <?php if($user->can('edit_schedule')): ?>
                                                <span id="edit-interview-schedule">
                                                    <button onclick="editUpcomingSchedule(event, '<?php echo e($dtData->id); ?>')" class="btn btn-sm btn-info notify-button editSchedule" title="Edit"> <i class="fa fa-pencil"></i></button>
                                                </span>
                                            <?php endif; ?>
                                            <?php if($user->can('delete_schedule')): ?>
                                                <span id="delete-interview-schedule">
                                                    <button data-schedule-id="<?php echo e($dtData->id); ?>" class="btn btn-sm btn-danger notify-button deleteSchedule" title="Delete"> <i class="fa fa-trash"></i></button>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="direct-chat-name"><?php echo e(ucfirst($dtData->full_name)); ?></div>
                                        <span class="direct-chat-timestamp"><?php echo e($dtData->schedule_date->format('h:i a')); ?></span>
                                        <?php if(in_array($user->id, $dtData->employee->pluck('user_id')->toArray())): ?>
                                            <?php
                                                $empData = $dtData->employeeData($user->id);
                                            ?>
                                            <?php if($empData->user_accept_status == 'accept'): ?>
                                                <label class="badge badge-success float-right"><?php echo app('translator')->getFromJson('app.accepted'); ?></label>
                                            <?php elseif($empData->user_accept_status == 'refuse'): ?>
                                                <label class="badge badge-danger float-right"><?php echo app('translator')->getFromJson('app.refused'); ?></label>
                                            <?php else: ?>
                                                <span class="float-right">
                                                    <button onclick="employeeResponse(<?php echo e($empData->id); ?>, 'accept')" class="btn btn-sm btn-success notify-button responseButton"><?php echo app('translator')->getFromJson('app.accept'); ?></button>
                                                    <button onclick="employeeResponse(<?php echo e($empData->id); ?>, 'refuse')" class="btn btn-sm btn-danger notify-button responseButton"><?php echo app('translator')->getFromJson('app.refuse'); ?></button>
                                                </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                    <?php if($key != (count($upComingSchedule)-1)): ?>
                                        <hr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div>
                            <p><?php echo app('translator')->getFromJson('messages.noUpcomingScheduleFund'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade bs-modal-md in" id="scheduleDetailModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    <?php echo app('translator')->getFromJson('messages.loading'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
                    <button type="button" class="btn blue"><?php echo app('translator')->getFromJson('app.save'); ?></button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade bs-modal-md in" id="scheduleEditModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    <?php echo app('translator')->getFromJson('messages.loading'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
                    <button type="button" class="btn blue"><?php echo app('translator')->getFromJson('app.save'); ?></button>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        "use strict";

        var userCanAdd = false;
        var userCanEdit = false;
        <?php if($user->can('add_schedule')): ?>
            userCanAdd = true;
        <?php endif; ?>
        <?php if($user->can('edit_schedule')): ?>
            userCanEdit = true;
        <?php endif; ?>
        var taskEvents = [
            <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                id: '<?php echo e(ucfirst($schedule->id)); ?>',
                title: '<?php echo e($schedule->title); ?> on <?php echo e($schedule->full_name); ?>',
                start: '<?php echo e($schedule->schedule_date); ?>',
                end: '<?php echo e($schedule->schedule_date); ?>',
            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        <?php if($user->can('edit_schedule')): ?>
            function editUpcomingSchedule(event, id) {
                if (!$(event.target).closest('.editSchedule').length) {
                    return false;
                }
                var url = "<?php echo e(route('admin.interview-schedule.edit',':id')); ?>";
                url = url.replace(':id', id);
                $('#modelHeading').html('Schedule');
                $('#scheduleEditModal').modal('hide');
                $.ajaxModal('#scheduleEditModal', url);
            }
        <?php endif; ?>

        function reloadSchedule() {
            $.easyAjax({
                url: '<?php echo e(route('admin.interview-schedule.index')); ?>',
                container: '#updateSchedule',
                type: "GET",
                success: function (response) {
                    $('.upcomingdata').html(response.data);
                    taskEvents = [];
                    response.scheduleData.forEach(function(schedule){
                        const taskEvent = {
                            id: schedule.id,
                            title: schedule.title +' on '+  schedule.full_name ,
                            start: schedule.schedule_date ,
                            end: schedule.schedule_date,
                        };
                        taskEvents.push(taskEvent);
                    });
                    $.CalendarApp.reInit();
                }
            })
        }

        <?php if($user->can('delete_schedule')): ?>
            $('body').on('click', '.deleteSchedule', function (event) {
                var id = $(this).data('schedule-id');
                if (!$(event.target).closest('.deleteSchedule').length) {
                    return false;
                }
                swal({
                    title: "<?php echo app('translator')->getFromJson('errors.areYouSure'); ?>",
                    text: "<?php echo app('translator')->getFromJson('errors.deleteWarning'); ?>",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "<?php echo app('translator')->getFromJson('app.delete'); ?>",
                    cancelButtonText: "<?php echo app('translator')->getFromJson('app.cancel'); ?>",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        var url = "<?php echo e(route('admin.interview-schedule.destroy',':id')); ?>";
                        url = url.replace(':id', id);

                        var token = "<?php echo e(csrf_token()); ?>";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.unblockUI();
                                    $('#schedule-'+id).remove();
                                    reloadSchedule();
                                }
                            }
                        });
                    }
                });
            });
        <?php endif; ?>

        function employeeResponse(id, type) {
            var msg;
            if (type == 'accept') {
                msg = "<?php echo app('translator')->getFromJson('errors.acceptSchedule'); ?>";
            } else {
                msg = "<?php echo app('translator')->getFromJson('errors.refuseSchedule'); ?>";
            }
            swal({
                title: "<?php echo app('translator')->getFromJson('errors.areYouSure'); ?>",
                text: msg,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "<?php echo app('translator')->getFromJson('app.yes'); ?>",
                cancelButtonText: "<?php echo app('translator')->getFromJson('app.cancel'); ?>",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    var url = "<?php echo e(route('admin.interview-schedule.response',[':id',':type'])); ?>";
                    url = url.replace(':id', id);
                    url = url.replace(':type', type);

                    $.easyAjax({
                        url: url,
                        type: 'GET',
                        success: function (response) {
                            if (response.status == 'success') {
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        }

        var getScheduleDetail = function (event, id) {
            if ($(event.target).closest('.editSchedule, .deleteSchedule, .responseButton').length) {
                return false;
            }
            var url = '<?php echo e(route('admin.interview-schedule.show', ':id')); ?>';
            url = url.replace(':id', id);

            $('#modelHeading').html('Schedule');
            $.ajaxModal('#scheduleDetailModal', url);
        }

        <?php if($user->can('add_schedule')): ?>
            function createSchedule(scheduleDate) {
                if (typeof scheduleDate === "undefined") {
                    scheduleDate = '';
                }
                var url = '<?php echo e(route('admin.interview-schedule.create')); ?>?date=' + scheduleDate;
                $('#modelHeading').html('Schedule');
                $.ajaxModal('#scheduleDetailModal', url);
            }
        <?php endif; ?>

        <?php if($user->can('add_schedule')): ?>
            function addScheduleModal(start, end, allDay) {
                var scheduleDate;
                if (start) {
                    var sd = new Date(start);
                    var curr_date = sd.getDate();
                    if (curr_date < 10) {
                        curr_date = '0' + curr_date;
                    }
                    var curr_month = sd.getMonth();
                    curr_month = curr_month + 1;
                    if (curr_month < 10) {
                        curr_month = '0' + curr_month;
                    }
                    var curr_year = sd.getFullYear();
                    scheduleDate = curr_year + '-' + curr_month + '-' + curr_date;
                }

                createSchedule(scheduleDate);
            }
        <?php endif; ?>
    </script>
    <script src="<?php echo e(asset('js/schedule-calendar.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/admin/interview-schedule/index.blade.php ENDPATH**/ ?>