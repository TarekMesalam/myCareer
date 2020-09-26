<?php $__currentLoopData = $boardColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="board-column p-0" data-column-id="<?php echo e($column->id); ?>">
        <div id="job-applications" class="card">
            <div class="card-body">
                <h4 class="card-title pt-1 pb-1"><?php echo e(ucwords($column->status)); ?> <span class="badge badge-pill badge-primary text-white ml-auto" id="columnCount_<?php echo e($column->id); ?>"> <?php echo e(count($column->applications)); ?></span></h4>
                <div class="card-text">
                    <div class="panel-body ">
                        <div class="row">
                            <div class="custom-column panel-scroll">
                                <?php $__currentLoopData = $column->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="panel panel-default lobipanel show-detail " data-widget="control-sidebar" data-slide="true" data-row-id="<?php echo e($application->id); ?>" data-application-id="<?php echo e($application->id); ?>" data-sortable="true">
                                        <div class="panel-body ">
                                            <h5>
                                                <img src="<?php echo e($application->photo_url); ?>" alt="user" class="img-circle" width="25"> <?php echo e(ucwords($application->full_name)); ?>

                                            </h5>
                                            <div class="stars stars-example-fontawesome">
                                                <select id="example-fontawesome_<?php echo e($application->id); ?>" data-value="<?php echo e($application->rating); ?>" data-id="<?php echo e($application->id); ?>" class="example-fontawesome bar-rating" name="rating" autocomplete="off">
                                                    <option value=""></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <h6 class="text-muted"><?php echo e(ucwords($application->job->title)); ?></h6>
                                            <div class="pt-2 pb-2 mt-3">
                                                <span class="text-dark font-14">
                                                    <?php if(!is_null($application->schedule)  && $column->id == 3): ?>
                                                        <?php echo e($application->schedule->schedule_date->format('d M, Y')); ?>

                                                    <?php else: ?>
                                                        <?php echo e($application->created_at->format('d M, Y')); ?>

                                                    <?php endif; ?>
                                                </span>
                                                <?php if (\Entrust::can('add_schedule')) : ?>
                                                <span id="buttonBox<?php echo e($column->id); ?><?php echo e($application->id); ?>" data-timestamp="<?php if(!is_null($application->schedule)): ?><?php echo e($application->schedule->schedule_date->timestamp); ?><?php endif; ?>">
                                                    <?php if(!is_null($application->schedule) && $column->id == 3 && $currentDate < $application->schedule->schedule_date->timestamp): ?>
                                                        <button onclick="sendReminder(<?php echo e($application->id); ?>, 'reminder')" type="button" class="btn btn-sm btn-info notify-button"><?php echo app('translator')->getFromJson('app.reminder'); ?></button>
                                                    <?php endif; ?>
                                                    <?php if($column->id == 4): ?>
                                                        <button onclick="sendReminder(<?php echo e($application->id); ?>, 'notify')" type="button" class="btn btn-sm btn-info notify-button"><?php echo app('translator')->getFromJson('app.notify'); ?></button>
                                                    <?php endif; ?>
                                                </span>
                                                <?php endif; // Entrust::can ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="panel panel-default lobipanel" data-sortable="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>
    "use strict";

    $('.example-fontawesome').barrating({
        theme: 'fontawesome-stars',
        showSelectedRating: false,
        readonly: true,
    });

    $(function () {
        $('.bar-rating').each(function () {
            const val = $(this).data('value');
            $(this).barrating('set', val ? val : '');
        });
    });

    $('.example-fontawesome').barrating('set', '');

    function sendReminder(id, type) {
        var msg;
        if (type == 'notify') {
            msg = "<?php echo app('translator')->getFromJson('errors.sendHiredNotification'); ?>";
        } else {
            msg = "<?php echo app('translator')->getFromJson('errors.sendInterviewReminder'); ?>";
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
                var url = "<?php echo e(route('admin.interview-schedule.notify',[':id',':type'])); ?>";
                url = url.replace(':id', id);
                url = url.replace(':type', type);

                $.easyAjax({
                    url: url,
                    type: 'GET',
                    success: function (response) {
                    }
                });
            }
        });
    }

    $(function () {
        var boardStracture = JSON.parse('<?php echo $boardStracture; ?>');

        var oldParentId, oldElementIds = [], i = 1;

        $('.lobipanel').on('dragged.lobiPanel', function (e, a) {
            var $parent = $(this).parent(),
                $children = $parent.children();
            var pr = $(this).closest('.board-column'),
                c = pr.find('.custom-column');

            if (i++ % 2) {
                oldParentId = pr.data('column-id');
                $children.each(function (ind, el) {
                    oldElementIds.push($(el).data('application-id'));
                });
                return true;
            }

            var currentParentId = pr.data('column-id');
            var currentElementIds = [];
            $children.each(function (ind, el) {
                currentElementIds.push($(el).data('application-id'));
            });

            var oldOriginalIds = boardStracture[oldParentId];

            var range = oldOriginalIds.length;
            var missingElementId;

            for (var j = 0; j < range; j++) {
                if (oldOriginalIds[j] !== oldElementIds[j]) {
                    missingElementId = oldOriginalIds[j];
                    break;
                }
            }

            boardStracture[oldParentId] = oldElementIds.slice(0, -1);
            boardStracture[currentParentId] = currentElementIds.slice(0, -1);

            var boardColumnIds = [];
            var applicationIds = [];
            var prioritys = [];

            $children.each(function (ind, el) {
                boardColumnIds.push($(el).closest('.board-column').data('column-id'));
                applicationIds.push($(el).data('application-id'));
                prioritys.push($(el).index());
            });

            if (oldParentId == 3 && currentParentId == 4) {
                $('#buttonBox' + oldParentId + missingElementId).show();
                var button = '<button onclick="sendReminder(' + missingElementId + ', \'notify\')" type="button" class="btn btn-sm btn-info notify-button"><?php echo app('translator')->getFromJson('app.notify'); ?></button>';
                $('#buttonBox' + oldParentId + missingElementId).html(button);
                $('#buttonBox' + oldParentId + missingElementId).attr('id', 'buttonBox' + currentParentId + missingElementId);
            } else if (oldParentId == 4 && currentParentId == 3) {
                var timeStamp = $('#buttonBox' + oldParentId + missingElementId).data('timestamp');
                var currentDate = <?php echo e($currentDate); ?>;
                if (currentDate < timeStamp) {
                    $('#buttonBox' + oldParentId + missingElementId).show();
                    var button = '<button onclick="sendReminder(' + missingElementId + ', \'reminder\')" type="button" class="btn btn-sm btn-info notify-button"><?php echo app('translator')->getFromJson('app.reminder'); ?></button>';
                    $('#buttonBox' + oldParentId + missingElementId).html(button);
                    $('#buttonBox' + oldParentId + missingElementId).attr('id', 'buttonBox' + currentParentId + missingElementId);
                }
            } else {
                $('#buttonBox' + oldParentId + missingElementId).attr('id', 'buttonBox' + currentParentId + missingElementId);
                $('#buttonBox' + currentParentId + missingElementId).hide();
            }

            var oldVal = parseInt($('#columnCount_' + oldParentId).html());
            $('#columnCount_' + oldParentId).html((oldVal - 1));

            var newVal = parseInt($('#columnCount_' + currentParentId).html());
            $('#columnCount_' + currentParentId).html((newVal + 1));

            $.easyAjax({
                url: '<?php echo e(route("admin.job-applications.updateIndex")); ?>',
                type: 'POST',
                data: {
                    boardColumnIds: boardColumnIds,
                    applicationIds: applicationIds,
                    prioritys: prioritys,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function (response) {
                    //
                }
            });
            oldParentId = null;
            oldElementIds = [];
            currentParentId = null;
            currentElementIds = [];
        }).lobiPanel({
            sortable: true,
            reload: false,
            editTitle: false,
            close: false,
            minimize: false,
            unpin: false,
            expand: false
        });
    });

    $('body').on('click', '.show-detail', function (event) {
        if ($(event.target).hasClass('notify-button')) {
            return false;
        }
        $(".right-sidebar").slideDown(50).addClass("shw-rside");

        var id = $(this).data('row-id');
        var url = "<?php echo e(route('admin.job-applications.show',':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            type: 'GET',
            url: url,
            success: function (response) {
                if (response.status == "success") {
                    $('#right-sidebar-content').html(response.view);
                }
            }
        });
    })
</script>
<?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/admin/job-applications/board-data.blade.php ENDPATH**/ ?>