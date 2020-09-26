<aside class="main-sidebar sidebar-dark-primary">
    <a href="<?php echo e(route('admin.dashboard')); ?>" style="text-align: center; font-size: 1.35rem;
    font-weight: bold;" class="brand-link">
      <span class="brand-text font-weight-light" >NCMS</span>
    </a>    
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" id="sidebarnav" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php echo e(request()->is('admin/dashboard*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-speedometer"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.dashboard'); ?>
                        </p>
                    </a>
                </li>
                <?php if (\Entrust::can('view_category')) : ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.job-categories.index')); ?>" class="nav-link <?php echo e(request()->is('admin/job-categories*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-grid"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.jobCategories'); ?>
                        </p>
                    </a>
                </li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('view_skills')) : ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.skills.index')); ?>" class="nav-link <?php echo e(request()->is('admin/skills*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-star"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.skills'); ?>
                        </p>
                    </a>
                </li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('view_company')) : ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.company.edit',1)); ?>" class="nav-link <?php echo e(request()->is('admin/company*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-film"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.company_profile'); ?>
                        </p>
                    </a>
                </li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('view_locations')) : ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.locations.index')); ?>" class="nav-link <?php echo e(request()->is('admin/locations*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-location-pin"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.locations'); ?>
                        </p>
                    </a>
                </li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('view_jobs')) : ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.jobs.index')); ?>" class="nav-link <?php echo e(request()->is('admin/jobs*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-credit-card"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.jobs'); ?>
                        </p>
                    </a>
                </li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('view_job_applications')) : ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.job-applications.index')); ?>" class="nav-link <?php echo e(request()->is('admin/job-applications*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-user"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.jobApplications'); ?>
                        </p>
                    </a>
                </li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('view_schedule')) : ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.interview-schedule.index')); ?>" class="nav-link <?php echo e(request()->is('admin/interview-schedule*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-calendar"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.interviewSchedule'); ?>
                        </p>
                    </a>
                </li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('view_team')) : ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.team.index')); ?>" class="nav-link <?php echo e(request()->is('admin/team*') ? 'active' : ''); ?>">
                        <i class="nav-icon icon-people"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.team'); ?>
                        </p>
                    </a>
                </li>
                <?php endif; // Entrust::can ?>
                <li class="nav-item has-treeview <?php if(\Request()->is('admin/settings/*') || \Request()->is('admin/profile')): ?>active menu-open <?php endif; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon-settings"></i>
                        <p>
                            <?php echo app('translator')->getFromJson('menu.settings'); ?>
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.profile.index')); ?>" class="nav-link <?php echo e(request()->is('admin/profile*') ? 'active' : ''); ?>">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p> <?php echo app('translator')->getFromJson('menu.myProfile'); ?></p>
                            </a>
                        </li>
                        <?php if (\Entrust::can('manage_settings')) : ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.settings.index')); ?>" class="nav-link <?php echo e(request()->is('admin/settings/settings') ? 'active' : ''); ?>">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p><?php echo app('translator')->getFromJson('menu.businessSettings'); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.role-permission.index')); ?>" class="nav-link <?php echo e(request()->is('admin/settings/role-permission') ? 'active' : ''); ?>">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p><?php echo app('translator')->getFromJson('menu.rolesPermission'); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.language-settings.index')); ?>" class="nav-link <?php echo e(request()->is('admin/settings/language-settings') ? 'active' : ''); ?>">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p><?php echo app('translator')->getFromJson('app.language'); ?> <?php echo app('translator')->getFromJson('menu.settings'); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.theme-settings.index')); ?>" class="nav-link <?php echo e(request()->is('admin/settings/theme-settings') ? 'active' : ''); ?>">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p><?php echo app('translator')->getFromJson('menu.themeSettings'); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.smtp-settings.index')); ?>" class="nav-link <?php echo e(request()->is('admin/settings/smtp-settings') ? 'active' : ''); ?>">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p><?php echo app('translator')->getFromJson('menu.mailSetting'); ?></p>
                            </a>
                        </li>
                        <?php endif; // Entrust::can ?>
                    </ul>
                </li>
                <li class="nav-header"></li>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/sections/left-sidebar.blade.php ENDPATH**/ ?>