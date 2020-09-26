<?php if (\Entrust::can('add_jobs')) : ?> 
<?php $__env->startSection('create-button'); ?>
    <a href="<?php echo e(route('admin.jobs.create')); ?>" class="btn btn-dark btn-sm m-l-15"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->getFromJson('app.createNew'); ?></a>
<?php $__env->stopSection(); ?>
<?php endif; // Entrust::can ?> 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="icon-badge"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->getFromJson('modules.dashboard.totalJobs'); ?></span>
                    <span class="info-box-number"><?php echo e(number_format($totalJobs)); ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="icon-badge"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->getFromJson('modules.dashboard.activeJobs'); ?></span>
                    <span class="info-box-number"><?php echo e(number_format($activeJobs)); ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="icon-badge"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->getFromJson('modules.dashboard.inactiveJobs'); ?></span>
                    <span class="info-box-number"><?php echo e(number_format($inactiveJobs)); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <select name="" id="filter-status" class="form-control">
                    <option value=""><?php echo app('translator')->getFromJson('app.filter'); ?> <?php echo app('translator')->getFromJson('app.status'); ?>: <?php echo app('translator')->getFromJson('app.viewAll'); ?></option>
                    <option value="active"><?php echo app('translator')->getFromJson('app.active'); ?></option>
                    <option value="inactive"><?php echo app('translator')->getFromJson('app.inactive'); ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-md-12 mb-20">
                            <?php if (\Entrust::can('view_question')) : ?>
                                <a href="<?php echo e(route('admin.questions.index')); ?>"><button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->getFromJson('menu.customQuestion'); ?></button></a>
                            <?php endif; // Entrust::can ?>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->getFromJson('modules.jobs.jobTitle'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('menu.locations'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('app.startDate'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('app.endDate'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('app.status'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('app.action'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        "use strict";

        var table = $('#myTable').dataTable({
            responsive: true,
            serverSide: true,
            ajax: {'url' : '<?php echo route('admin.jobs.data'); ?>',
                "data": function ( d ) {
                    return $.extend( {}, d, {
                        "filter_company": $('#filter-company').val(),
                        "filter_status": $('#filter-status').val(),
                    });
                }
            },
            language: {
                "url": "<?php echo __("app.datatable") ?>"
            },
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [
                { data: 'DT_Row_Index', name: 'DT_Row_Index' , orderable: false, searchable: false},
                { data: 'title', name: 'title' },
                { data: 'location_id', name: 'location_id' },
                { data: 'start_date', name: 'start_date' },
                { data: 'end_date', name: 'end_date' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', width: '20%' }
            ]
        });

        new $.fn.dataTable.FixedHeader( table );

        $('#filter-company, #filter-status').change(function () {
            table._fnDraw();
        });

        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('row-id');
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
            }, function(isConfirm){
                if (isConfirm) {
                    var url = "<?php echo e(route('admin.jobs.destroy',':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                table._fnDraw();
                            }
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/admin/jobs/index.blade.php ENDPATH**/ ?>