<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('login')); ?>" id="loginform" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <input type="email" name="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo app('translator')->getFromJson('app.loginEmailAddress'); ?>" value="<?php echo e(old('email')); ?>" required autofocus>
            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group mb-3">
            <input id="password" type="password" placeholder="<?php echo app('translator')->getFromJson('app.password'); ?>" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
            <?php if($errors->has('password')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo app('translator')->getFromJson('app.loginRememberMe'); ?>
                    </label>
                </div>
            </div>
            <div class="col-sm-12 mt-4">
                <button type="submit" class="btn btn-primary btn-block" style="background: #243362"><?php echo app('translator')->getFromJson('app.loginTitle'); ?></button>
            </div>
        </div>
        <p class="mb-1 mt-4">
            <a href="#" id="to-recover"><?php echo app('translator')->getFromJson('app.forgotPassword'); ?></a>
        </p>
    </form>
    <form class="form-horizontal" method="post" id="recoverform" action="<?php echo e(route('password.email')); ?>">
        <?php echo e(csrf_field()); ?>

        <?php if(session('status')): ?>
            <div class="alert alert-success m-t-10">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <div class="form-group ">
            <div class="col-xs-12">
                <h3><?php echo app('translator')->getFromJson('app.recoverPassword'); ?></h3>
                <p class="text-muted"><?php echo app('translator')->getFromJson('app.enterEmailInstruction'); ?></p>
            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <div class="col-xs-12">
                <input class="form-control" type="email" id="email" name="email" required="" placeholder="<?php echo app('translator')->getFromJson('app.loginEmailAddress'); ?>" value="<?php echo e(old('email')); ?>">
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <?php echo e($errors->first('email')); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo app('translator')->getFromJson('app.sendPasswordLink'); ?></button>
            </div>
        </div>
        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <p><a href="<?php echo e(route('login')); ?>" class="text-primary m-l-5"><b><?php echo app('translator')->getFromJson('app.loginTitle'); ?></b></a></p>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\NCMS\resources\views/auth/login.blade.php ENDPATH**/ ?>