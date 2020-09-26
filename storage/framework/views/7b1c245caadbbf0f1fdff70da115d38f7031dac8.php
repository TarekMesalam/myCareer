<?php if (\Entrust::can('add_category')) : ?>
<?php $__env->startSection('create-button'); ?>
    <a href="<?php echo e(route('admin.questions.create')); ?>" class="btn btn-dark btn-sm m-l-15"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->getFromJson('app.createNew'); ?></a>
<?php $__env->stopSection(); ?>
<?php endif; // Entrust::can ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-md-12 mb-20">
                            <?php if (\Entrust::can('view_jobs')) : ?>
                                <a href="<?php echo e(route('admin.jobs.index')); ?>"><button class="btn btn-sm btn-primary" type="button"><i class="icon-badge"></i> <?php echo app('translator')->getFromJson('menu.jobs'); ?></button></a>
                            <?php endif; // Entrust::can ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table id="myTable" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->getFromJson('app.question'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('app.required'); ?></th>
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
            ajax: '<?php echo route('admin.questions.data'); ?>',
            language: {
                "url": "<?php echo __("app.datatable") ?>"
            },
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [
                { data: 'DT_Row_Index'},
                { data: 'question', name: 'question' },
                { data: 'required', name: 'required' },
                { data: 'action', name: 'action', width: '20%' }
            ]
        });

        new $.fn.dataTable.FixedHeader( table );

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
                    var url = "<?php echo e(route('admin.questions.destroy',':id')); ?>";
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/question/index.blade.php ENDPATH**/ ?>