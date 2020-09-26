<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->getFromJson('app.createNew'); ?></h4>
                    <?php if(count($locations) == 0): ?>
                        <div id="no-locations" class="alert alert-danger alert-dismissible fade show">
                            <h4 class="alert-heading"><i class="fa fa-warning"></i> <?php echo app('translator')->getFromJson('messages.jobLocationEmpty'); ?></h4>
                            <p><?php echo app('translator')->getFromJson('messages.noLocations'); ?>
                                <a href="<?php echo e(route('admin.locations.create')); ?>" class="btn btn-info btn-sm m-l-15"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->getFromJson('app.createNew'); ?> <?php echo app('translator')->getFromJson('menu.locations'); ?></a>
                            </p>
                        </div>
                    <?php elseif(count($categories) == 0): ?>
                        <div id="no-categories" class="alert alert-danger alert-dismissible fade show">
                            <h4 class="alert-heading"><i class="fa fa-warning"></i> <?php echo app('translator')->getFromJson('messages.jobCategoryEmpty'); ?></h4>
                            <p>
                            <?php echo app('translator')->getFromJson('messages.noJobCategory'); ?>
                                <a href="<?php echo e(route('admin.job-categories.create')); ?>" class="btn btn-info btn-sm m-l-15"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->getFromJson('app.createNew'); ?> <?php echo app('translator')->getFromJson('menu.jobCategories'); ?></a>
                            </p>
                        </div>
                    <?php else: ?>
                        <form class="ajax-form" method="POST" id="createForm">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.jobs.jobTitle'); ?></label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.jobs.jobDescription'); ?></label>
                                        <textarea class="form-control" id="job_description" name="job_description" rows="15" placeholder="Enter text ..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.jobs.jobRequirement'); ?></label>
                                        <textarea class="form-control" id="job_requirement" name="job_requirement" rows="15" placeholder="Enter text ..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('menu.locations'); ?></label>
                                        <select name="location_id" id="location_id" class="form-control select2 custom-select">
                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($location->id); ?>"><?php echo e(ucfirst($location->location). ' ('.$location->country->country_code.')'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('menu.jobCategories'); ?></label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value=""><?php echo app('translator')->getFromJson('app.choose'); ?> <?php echo app('translator')->getFromJson('menu.jobCategories'); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e(ucfirst($category->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('menu.skills'); ?></label>
                                        <select class="select2 m-b-10 select2-multiple" id="job_skills" multiple="multiple" data-placeholder="<?php echo app('translator')->getFromJson('app.add'); ?> <?php echo app('translator')->getFromJson('menu.skills'); ?>" name="skill_id[]"></select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.jobs.totalPositions'); ?></label>
                                        <input type="number" class="form-control" name="total_positions" id="total_positions">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('app.startDate'); ?></label>
                                        <input type="text" class="form-control" id="date-start" value="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>" name="start_date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('app.endDate'); ?></label>
                                        <input type="text" class="form-control" id="date-end" name="end_date" value="<?php echo e(\Carbon\Carbon::now()->addMonth(1)->format('Y-m-d')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('app.status'); ?></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="active"><?php echo app('translator')->getFromJson('app.active'); ?></option>
                                            <option value="inactive"><?php echo app('translator')->getFromJson('app.inactive'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <h4 class="m-b-0 m-l-10 box-title">Questions</h4>
                                    <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="form-group col-md-6">
                                            <label class="">
                                                <div id="job-questions" class="icheckbox_flat-green" aria-checked="false" aria-disabled="false">
                                                    <input type="checkbox" value="<?php echo e($question->id); ?>" name="question[]" class="flat-red">
                                                    <ins class="iCheck-helper"></ins>
                                                </div>
                                                <?php echo e(ucfirst($question->question)); ?> <?php if($question->required == 'yes'): ?> (<?php echo app('translator')->getFromJson('app.required'); ?>)<?php endif; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <button type="button" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        "use strict";

        $('input[type="checkbox"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
        });

        $('#date-end').bootstrapMaterialDatePicker({weekStart: 0, time: false});

        $('#date-start').bootstrapMaterialDatePicker({weekStart: 0, time: false}).on('change', function (e, date) {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
        });

        var jobDescription = $('#job_description').wysihtml5({
            "font-styles": true,
            "emphasis": true,
            "lists": true,
            "html": true,
            "link": true,
            "image": true,
            "color": true,
            stylesheets: ["<?php echo e(asset('assets/node_modules/html5-editor/wysiwyg-color.css')); ?>"],
        });

        $('#job_requirement').wysihtml5({
            "font-styles": true,
            "emphasis": true,
            "lists": true,
            "html": true,
            "link": true,
            "image": true,
            "color": true,
            stylesheets: ["<?php echo e(asset('assets/node_modules/html5-editor/wysiwyg-color.css')); ?>"],
        });

        $('#category_id').on('change', function(){
            var id = $(this).val();

            var url = "<?php echo e(route('admin.job-categories.getSkills', ':id')); ?>";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                success: function (response) {
                    $('#job_skills').html(response.data);
                    $(".select2").select2();
                }
            })
        });

        $('#save-form').on('click', function(){
            $.easyAjax({
                url: '<?php echo e(route('admin.jobs.store')); ?>',
                container: '#createForm',
                type: "POST",
                redirect: true,
                data: $('#createForm').serialize()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/admin/jobs/create.blade.php ENDPATH**/ ?>