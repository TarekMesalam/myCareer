<?php if (\Entrust::can('add_job_applications')) : ?>
<?php $__env->startSection('create-button'); ?>
    <a href="<?php echo e(route('admin.job-applications.create')); ?>" class="btn btn-dark btn-sm m-l-15"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->getFromJson('app.createNew'); ?></a>
<?php $__env->stopSection(); ?>
<?php endif; // Entrust::can ?>
<?php $__env->startSection('content'); ?>
    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="<?php echo e(route('admin.job-applications.table')); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->getFromJson('app.tableView'); ?> <i class="fa fa-table"></i></a>
        </div>
    </div>
    <div class="container-scroll">
        <div class="row">        
            <div class="col-md-4">
                <div class="input-daterange input-group">
                    <input type="text" class="form-control" id="date-start" value="<?php echo e($startDate); ?>" name="start_date">
                    <span class="input-group-addon bg-info b-0 text-white p-1"><?php echo app('translator')->getFromJson('app.to'); ?></span>
                    <input type="text" class="form-control" id="date-end" name="end_date" value="<?php echo e($endDate); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select class="select2" name="jobs" id="jobs" data-style="form-control">
                        <option value="all"><?php echo app('translator')->getFromJson('modules.jobApplication.allJobs'); ?></option>
                        <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option title="<?php echo e(ucfirst($job->title)); ?>" value="<?php echo e($job->id); ?>"><?php echo e(ucfirst($job->title)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button type="button" id="apply-filters" class="btn btn-success btn-sm col-md-6"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.apply'); ?></button>
                    <button type="button" id="reset-filters" class="btn btn-info btn-sm col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> <?php echo app('translator')->getFromJson('app.reset'); ?></button>
                </div>
            </div>
        </div>
        <div class="row container-row"></div>
    </div>
    
    <div class="modal fade bs-modal-md in" id="scheduleDetailModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
                    <button type="button" class="btn blue"><?php echo app('translator')->getFromJson('app.close'); ?></button>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        "use strict";

        loadData();

        $('#apply-filters').on('click', function(){
            loadData();
        });

        $('#reset-filters').on('click', function(){
            $('#date-start').val('<?php echo e($startDate); ?>');
            $('#date-end').val('<?php echo e($endDate); ?>');
            $('#jobs').val('all').trigger('change');

            loadData();
        })

        $('#date-end').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

        $('#date-start').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
        {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
        });

        function createSchedule (id) {
            var url = "<?php echo e(route('admin.job-applications.create-schedule',':id')); ?>";
            url = url.replace(':id', id);
            $('#modelHeading').html('Schedule');
            $.ajaxModal('#scheduleDetailModal', url);
        }

        function loadData () {
            var startDate = $('#date-start').val();
            var jobs = $('#jobs').val();

            if (startDate == '') {
                startDate = null;
            }

            var endDate = $('#date-end').val();

            if (endDate == '') {
                endDate = null;
            }

            var url = '<?php echo e(route('admin.job-applications.index')); ?>?startDate=' + startDate + '&endDate=' + endDate + '&jobs=' + jobs;

            $.easyAjax({
                url: url,
                container: '.container-row',
                type: "GET",
                success: function (response) {
                    $('.container-row').html(response.view);
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                }

            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/admin/job-applications/board.blade.php ENDPATH**/ ?>