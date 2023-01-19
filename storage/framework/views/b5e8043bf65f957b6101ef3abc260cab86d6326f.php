

<?php $__env->startSection('content'); ?>
<body class="bg-brown overflow-hidden">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="row rounded-2 text-dark" style="width: 500px;">
                <div class="col-sm-12 px-5 py-3 bg-light shadow-lg rounded-2">
                    <img src="<?php echo e(asset('asset/img/logo.png')); ?>" alt="logo" class="d-block mx-auto" style="width: 280px;">
                    <form method="POST" action="<?php echo e(route('login')); ?>" class="form-group">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <!-- <h2 class="text-center fw-bold mb-3"><?php echo e(__('Masuk')); ?></h2> -->
                            <div class="col-sm-12 mt-3">
                                <div class="input-group input-group-md w-100 ">
                                    <input id="email" type="email"
                                        class="form-control border-0 border-bottom <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                        value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus
                                        placeholder="<?php echo e(__('Email Address')); ?>">

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="input-group input-group-md w-100">
                                    <input id="password" type="password"
                                        class="form-control password <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="password" required autocomplete="current-password"
                                        placeholder="<?php echo e(__('Password')); ?>">
                                    <span class="input-group-text togglePassword bg-transparent" id="">
                                        <i data-feather="eye" style="cursor: pointer"></i>
                                    </span>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-labell" for="remember">
                                        <?php echo e(__('Ingat saya')); ?>

                                    </label>

                                </div>
                                <p class="text-center mb-0 mt-3">Belum Memiliki Akun?<a
                                        class="text-green text-decoration-none" href="<?php echo e(route('register')); ?>">
                                        <?php echo e(__('Daftar')); ?>

                                    </a><br>
                                    <a class="text-green text-decoration-none" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Lupa sandi?')); ?>

                                    </a></p>
                                <?php if(Route::has('password.request')): ?>


                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-sm-12 text-center pb-4">
                                <button type="submit" class="css-button-rounded--green w-75">
                                    <?php echo e(__('Masuk')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/auth/login.blade.php ENDPATH**/ ?>