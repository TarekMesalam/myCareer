<?php if (\Entrust::can('add_skills')) : ?>
<?php $__env->startSection('create-button'); ?>
    <a href="<?php echo e(route('admin.skills.create')); ?>" class="btn btn-dark btn-sm m-l-15"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->getFromJson('app.createNew'); ?></a>
<?php $__env->stopSection(); ?>
<?php endif; // Entrust::can ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->getFromJson('app.name'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('menu.jobCategories'); ?></th>
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
            ajax: '<?php echo route('admin.skills.data'); ?>',
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
                { data: 'name', name: 'name' },
                { data: 'category_id', name: 'category_id' },
                { data: 'action', name: 'action' }
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
                    var url = "<?php echo e(route('admin.skills.destroy',':id')); ?>";
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/skills/index.blade.php ENDPATH**/ ?>